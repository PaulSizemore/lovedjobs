<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="author" content="Paul Sizemore">
<link href="custom.css" rel="stylesheet" type="text/css" /><title>Indeed Load of Companys that hire in certain jobs</title><style>body {  font: normal normal normal 12px/normal "droid-sans", Helvetica, sans-serif; background-color:#A9BCD0; }</style></head><body>


<!-- <meta http-equiv="refresh" content="20; URL=http://localhost:8888/stackOverflow/load-1970-2016.php"> -->

<?php 
require 'indeed.php';
require 'us_state_abbrevs_names.php';
require'arrJobTitlesAllSkills.php';
$client = new Indeed("6099130971792350");
$arrStates = $us_state_abbrevs_names; 
$arrJobTitles = $arrJobTitlesmostLoved; 
$startCount = "0"; 
$servername = "localhost"; $username = "root"; $password = "root"; $dbname = "leads"; 
//$servername = "localhost"; $username = "lovedjobs_crud"; $password = "L4jrD?n2Mbz~'UV4"; $dbname = "lovedjobs"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {    die("Connection failed: " . $conn->connect_error); $errMessage="<HR>ERROR MESSAGE:  Database NOT Connected<BR>"; }  else { $errMessage="DATABASE CONNECTED<BR><BR><BR><BR>"; }

// Output the total number of rows in the table
$result = $conn->query("select count(*) AS TOTALCOUNT from cities ;"); if ($result->num_rows > 0) {  while($row = $result->fetch_assoc()) { print "<BR><BR>ROWS in TABLE: ".$row[TOTALCOUNT]."<BR>"; }}




// LOOP JOB TITLES --------------------------------- --------------------------------- --------------------------------- --------------------------------- 
$sqlJobSkills = "SELECT `skills`.`idskills`,    `skills`.`skillName`,    `skills`.`skillCategory`,    `skills`.`skillSearchTerm` FROM `leads`.`skills` 
WHERE  lastRun < UNIX_TIMESTAMP(NOW()) - 86400 LIMIT 1;";
$resultJobSkills= $conn->query($sqlJobSkills); 	
if ($resultJobSkills->num_rows > 0) {  	
while($rowJobSkills = $resultJobSkills->fetch_assoc()) 
{    $z = $rowJobSkills[skillSearchTerm];
$sqlZ = "UPDATE `leads`.`skills` SET `lastRun` = UNIX_TIMESTAMP(NOW()) WHERE `idskills` = ".$rowJobSkills[idskills].";";
echo "<hr>Started for:  ".$z.":<BR>";     
//foreach ($arrJobTitles as &$z) {

// LOOP EACH STATE --------------------------------- --------------------------------- --------------------------------- --------------------------------- 
     foreach ($arrStates as &$y) {
echo "<BR> ".$y." - ";       
$startCount = "0"; 
														// LOOP X TIMES --------------------------------- --------------------------------- --------------------------------- --------------------------------- 
														for ($x = 0; $x <= 1; $x++) {
														echo "| : ".$x."  ";      
														$searchTerm = str_replace(' ','+',$z);
														// START THE API CALL --------------------------------- --------------------------------- 
														$params = array(	"q" => "$searchTerm","start"=>"$startCount",	"sort"=>"date",	"l" => "$y",	"userip" => "74.136.91.23",
															"useragent" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2)",
															 "highlight" => "0", 	" fromage"=>"1", "limit"=>"25" );
														$results = $client->search($params);
														// LOOP The API RESULT --------------------------------- --------------------------------- 
														//var_dump($results);
														foreach ($results as $innerArray) {   if (is_array($innerArray))									{
														foreach ($innerArray as $subArray)    { if (is_array($subArray))								{   
														 $postedDate = strtotime($subArray[date]);   
													//	echo "<HR>Company: ".$subArray[company]."  Start ROW: ".$startCount."  <HR> " ;      


$LcompanyName = $subArray[company];
$Lcity = $subArray[city];
$Lstate_abbriviation = $subArray[state];
$LsearchString = $z;

// RUN THE CHECK TO SEE IF THE JOB IS A GOOD JOB
$goodJob = "1";
if (strpos($subArray[jobtitle], 'Dishwasher') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Trucker') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Transportation') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Driver') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle],  'Truck') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], ' Farm ') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Restaurant') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Barback') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Construction') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Service Desk') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Dispatcher') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Teacher') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Catering') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'And Training') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Administrative Assistant') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Shop Manager') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Kids ') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Vocaational') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Claim Specialist') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Front Desk') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Dean of Student') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Kitchen') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Shift Commander') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Cook') !== false) {    $goodJob = "0";  }
if (strpos($subArray[jobtitle], 'Valet') !== false) {    $goodJob = "0";  }


if($goodJob == "1"){  
														$sql = "INSERT INTO `raw_Indeed`	(`jobTitle`,`company`,`city`,`state`,`source`,`postDate`,`description`,`url`,  `jobKey`,  `searchString`)
														VALUES ( '$subArray[jobtitle]' ,  '$subArray[company]' ,   '$subArray[city] ' ,  '$subArray[state]' ,  '$subArray[source]' , 	'$postedDate' ,   '$subArray[snippet]' ,  '$subArray[url]',  '$subArray[jobkey]','$z'   ) ;";
														$result = $conn->query($sql);  
														
														$sqlCompaniesCheck = "SELECT `companies`.`idcompanies`,	`companies`.`companyName`,
														`companies`.`city`,	`companies`.`state_abbriviation`,	`companies`.`searchString`,`companies`.`postingCount`
														FROM `leads`.`companies`	 WHERE companyName = '$subArray[company]'  AND searchString = '$z'  ; ";												
														$resultCompanyCheck = $conn->query($sqlCompaniesCheck);  
														
														if ($resultCompanyCheck->num_rows > 0) 																		{  	
														while($rowCompanyCheck = $resultCompanyCheck->fetch_assoc())             	{  
														$sqlCompanyLog = "UPDATE `leads`.`companies` SET  `postingCount` = `postingCount` +1  WHERE `idcompanies` =  '$rowCompanyCheck[idcompanies]';"; 
														} 
							
														}  else {
														$sqlCompanyLog = "INSERT INTO `leads`.`companies` ( `companyName`, `city`, `state_abbriviation`, `searchString`, `postingCount`)	VALUES ( '$LcompanyName', '$Lcity', '$Lstate_abbriviation', '$LsearchString', '1'  );";  
														 } 
														$resultCompanyCreate= $conn->query($sqlCompanyLog);  		
														}
// PRINT "<BR><BR><BR>".$sqlCompaniesCheck."<BR><BR><BR>"; 
}

 } }else{ } }
$startCount = $startCount+25; 
} // LOOP 5 TIMES
    
} 
     }// LOOP EACH STATE
	$result = $conn->query($sqlZ);  
	}// LOOP JOB TITLES 


$sqlDelete = "DELETE FROM `raw_Indeed` WHERE postDate > (UNIX_TIMESTAMP(NOW())-604800);    "; 
$result = $conn->query($sqlDelete);  
// Output the total number of rows in the table
$result = $conn->query("select count(*) AS TOTALCOUNT from cities ;"); if ($result->num_rows > 0) {  while($row = $result->fetch_assoc()) { print "<BR><BR>ROWS in TABLE: ".$row[TOTALCOUNT]."<BR>"; }}


echo "<HR>###<hr>";  
?>
</body></html>