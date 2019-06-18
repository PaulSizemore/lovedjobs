<?php  
require 'preLoad.php';  
if($lovedLang == ""){ $lovedLang="Loved "; }  ?>

<?php 
$sqlTOPCities="SELECT DISTINCT
    cities.city AS TopCity,
    cities.longitude,
    cities.latitude,
    cities.Population,
    (COUNT(jobTitle)/cities.Population)*100 AS PERCAPITA,
   cities.state_abbriviation AS TopState,
    COUNT(jobTitle) AS CountofJobs
FROM
    cities
        INNER JOIN
    raw_Indeed ON (cities.city = raw_Indeed.city)   AND (cities.state_abbriviation  = raw_Indeed.state  )
where    raw_Indeed.city <>   ''   ".$argJob."
        AND Population > \"100000\"

GROUP BY raw_Indeed.city , state
ORDER BY PERCAPITA DESC
LIMIT 20 ";
$resultTOPCities= $conn->query($sqlTOPCities); 	

  $Counter = "1";
    $jsOUTPUT = "";
  $MaxJobinCity = "1";
  $MaxPopinCity = "1";
  $MaxPerCapitainCity = "1";
  				if ($resultTOPCities->num_rows > 0) {  	
				while($row = $resultTOPCities->fetch_assoc()) 
				{    
				if(  $MaxJobinCity < $row[CountofJobs]) { $MaxJobinCity = $row[CountofJobs];  };
				if(  $MaxPopinCity < $row[Population]) { $MaxPopinCity = $row[Population];  };
				if(  $MaxPerCapitainCity < $row[PERCAPITA]) { $MaxPerCapitainCity = $row[PERCAPITA];  };
			//	if( $row[TopCity] =="Louisville") {  $thisCity = "<B style='text-decoration: underline; color:blue;' >". $row[TopCity]."</B>"; } else { $thisCity = "". $row[TopCity]."";  }
				
				//print "<li class=\"topCitiesLI\" data-topCity=\"".$row[TopCity]."\" data-topState=\"".$row[TopState]."\"><a href=\"#\">".$Counter.". ".$thisCity.", ".$row[TopState]." (".$row[CountofJobs].")</a></li>";
			
				$Counter=$Counter+1;
				// JSOUTPUT  -------------------------------------

				}
				}
				$resultTOPCities= $conn->query($sqlTOPCities); 	

if ($resultTOPCities->num_rows > 0) {  	
				while($row = $resultTOPCities->fetch_assoc()) 
				{    			
				$perCapitaOfCity =round($row[CountofJobs]/$row[Population]*1)+1 ;
				$percentPerCapita =$perCapitaOfCity/$MaxPerCapitainCity; 
				$cityRadius = round($row[PERCAPITA]/$MaxPerCapitainCity*10)+3;
			   // $cityRadius=round(1+($row[CountofJobs]/$MaxJobinCity*10));
								$jsOUTPUT =   $jsOUTPUT." //   City Per Capita: ".$row[PERCAPITA]."  Max Per Capita: ".$MaxPerCapitainCity."  \n"; 
								$jsOUTPUT =   $jsOUTPUT." { name: '".$row[TopCity] ."', lat: ".$row[latitude] .", lon:".$row[longitude] .", radius: ".$cityRadius." },\n\n";

}}			
				
				
print "<script type=\"text/javascript\">\n";
print "    $(function() {\n";
print "        var map = kartograph.map('#map', 640, 420);\n";
print "        map.loadMap('http://lovedjobs.com/kartograph/usa.svg', function() {\n";
print "            map.addLayer('layer0', {\n";
print "                styles: {\n";
print "                    stroke: '#aaa',\n";
print "                    fill: '#f6f4f2'\n";
print "                },\n";
print "                mouseenter: function(d, path) {\n";
print "                 //   path.attr('fill', Math.random() < 0.5 ? '#c04' : '#04c');\n";
print "                },\n";
print "                mouseleave: function(d, path) {\n";
print "                 //   path.animate({ fill: '#f6f4f2' }, 1000);\n";
print "                }\n";
print "            });\n";
print "            var points_of_interest = [\n";
print "\n";
  print $jsOUTPUT; 
// INSERT POINTS HERE
print "            ];\n";
print "function sumVisits(cities) {\n";
print "    var total = 0;\n";
print "    $.each(cities, function(i, city) {\n";
print "        total += city.visits;\n";
print "    });\n";
print "    return { visits: total };\n";
print "}";
print "            map.addSymbols({\n";
print "            type: kartograph.Bubble,\n                ";
//print "                type: kartograph.LabeledBubble,\n";
print "                data: points_of_interest,\n";
print "                location: function(d) { return [d.lon, d.lat] },\n";
//print "                title: function(d) { return d.name; },\n";
print "                 radius: function(d) { return d.radius; },\n";
print "                 style: 'fill:#92beed',   \n";
print "                center: false,\n";
print "                attrs: { fill: 'black' },\n";
print "                labelattrs: { 'font-size': 11 }, \n";
print "                buffer: true\n";
print "            });\n";
print "        }, { padding: 30 });\n";
print "    });\n";
print "</script>";   
  ?>
  
  
<?php
  				if ($resultTOPCities->num_rows > 0) {  	print "<div id=\"map\"></div>"; 
  				print "Per Capita on Cities above 100,000 population.<BR><BR>"; } 
//var_dump($sqlTOPCities);
?>
