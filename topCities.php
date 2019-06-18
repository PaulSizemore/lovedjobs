<?php  require 'preLoad.php';   ?>
<script>
$(document).ready(function(){
        $("div.topCitiesLI").click(function(){
		var topcity = $(this).data('topcity');
		var topstate = $(this).data('topstate');
        $.ajax({url: "http://lovedjobs.com/topCompanies.php", 
         type: "POST",
         data: { topcity : topcity , topstate : topstate },
        success: function(result){
         $("#companyBox").html(result);	}});
        $.ajax({url: "http://lovedjobs.com/detailJobListing.php", 
         type: "POST",
        success: function(result){
         $("#detailJobListing").html(result);	}}); 
         });

								});
</script>

 <!-- <ul> -->

<?php 
$sqlTOPCities="SELECT DISTINCT   cities.city AS TopCity,  cities.longitude,    cities.latitude,    cities.Population,
(COUNT(jobTitle)/cities.Population)*100 AS PERCAPITA,   cities.state_abbriviation AS TopState,
COUNT(jobTitle) AS CountofJobs FROM   cities      INNER JOIN
raw_Indeed ON (cities.city = raw_Indeed.city)   AND (cities.state_abbriviation  = raw_Indeed.state  )
where    raw_Indeed.city <>   ''   ".$argJob."    AND Population > \"100000\"
GROUP BY raw_Indeed.city , state ORDER BY PERCAPITA DESC LIMIT 20 ";
$resultTOPCities= $conn->query($sqlTOPCities); 	

//  print "<div class='topCities'><h2>Cities with the most </h2> <ul>";
  $Counter = "1";
//    $jsOUTPUT = "";
  $MaxJobinCity = "1";
  				if ($resultTOPCities->num_rows > 0) {  	print "<h2>Cities with the most ".$displayLanguageName." jobs posted.</h2>";
				while($row = $resultTOPCities->fetch_assoc()) 
				{    
				if(  $MaxJobinCity < $row[CountofJobs]) { $MaxJobinCity = $row[CountofJobs];  };
				if( $row[TopCity] =="Louisville") {  $thisCity = "". $row[TopCity].""; } else { $thisCity = "". $row[TopCity]."";  }
				
				// print "<li class=\"topCitiesLI\" data-topCity=\"".$row[TopCity]."\" data-topState=\"".$row[TopState]."\"><a href=\"#\">".$Counter.". ".$thisCity.", ".$row[TopState]."<!-- (".$row[CountofJobs].")--></a></li>";
				print "<div class=\"topCitiesLI\" data-topCity=\"".$row[TopCity]."\" data-topState=\"".$row[TopState]."\"><a href=\"http://lovedjobs.com/".str_replace(' ','+',strtolower($URLSkill))."/".str_replace(' ','+',strtolower($thisCity))."/\">".$thisCity.", ".$row[TopState]."</a></div>";
				$Counter=$Counter+1;
				}
				
				} else { print "<h1>Not a lot of ".$displayLanguageName." jobs have been posted</h1><img src='http://lovedjobs.com/assets/no-records-found.gif'><div style='clear:both;'></div>	"; }

  ?><!-- </ul> -->
<!-- <?php   var_dump($sqlTOPCities);?> -->
<div style='clear:both;'></div>			