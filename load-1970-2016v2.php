<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="author" content="Paul Sizemore">
<link href="custom.css" rel="stylesheet" type="text/css" /><title>Indeed Load of Companys that hire in certain jobs</title><style>body {  font: normal normal normal 12px/normal "droid-sans", Helvetica, sans-serif; background-color:#A9BCD0; }</style></head><body>
 <meta http-equiv="refresh" content="30; URL=http://lovedjobs.com/load-1970-2016v2.php">  


<?php 
require 'indeed.php'; require 'us_state_abbrevs_names.php'; require 'arrCleanse.php';
$client = new Indeed("6099130971792350");
$arrStates = $us_state_abbrevs_names;  $arrJobTitles = $arrJobTitlesmostLoved; 
$startCount = "0"; 

//$servername = "localhost"; $username = "root"; $password = "root"; $dbname = "leads"; 
$servername = "localhost"; $username = "lovedjobs_crud"; $password = "L4jrD?n2Mbz~'UV4"; $dbname = "lovedjobs"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {    die("Connection failed: " . $conn->connect_error); $errMessage="<HR>ERROR MESSAGE:  Database NOT Connected<BR>"; }  else { $errMessage="DATABASE CONNECTED<BR><BR><BR><BR>"; }

// Output the total number of rows in the table
$result = $conn->query("select count(*) AS TOTALCOUNT from raw_Indeed ;"); if ($result->num_rows > 0) {  while($row = $result->fetch_assoc()) { print "<BR><BR>ROWS in TABLE: ".$row[TOTALCOUNT]."<BR>"; }}

// 86400
// LOOP JOB TITLES --------------------------------- --------------------------------- --------------------------------- --------------------------------- 
$sqlJobSkills = "SELECT `skills`.`idskills`,    `skills`.`skillName`,    `skills`.`skillCategory`,    `skills`.`skillSearchTerm` FROM `skills` 
WHERE   lastRun < UNIX_TIMESTAMP(NOW()) - 86400  ORDER BY displayOrder ASC , lastRun ASC LIMIT 1 ;";
$resultJobSkills= $conn->query($sqlJobSkills); 	
if ($resultJobSkills->num_rows > 0) {  	
while($rowJobSkills = $resultJobSkills->fetch_assoc()) 
{   
			 $z = $rowJobSkills[skillSearchTerm]; 
	//	$z = "project+manager";
 
$sqlZ = "UPDATE `skills` SET `lastRun` = UNIX_TIMESTAMP(NOW()) WHERE `idskills` = ".$rowJobSkills[idskills].";";
echo "<hr>Started for:  ".$z.":<BR>";     

// LOOP EACH STATE --------------------------------- --------------------------------- --------------------------------- --------------------------------- 
foreach ($arrStates as &$y) {
echo "<BR> ".$y." - ";       
$startCount = "0"; 
														// LOOP X TIMES --------------------------------- --------------------------------- --------------------------------- --------------------------------- 
														for ($x = 0; $x <= 2; $x++) {
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

$LcompanyName = $subArray[company];  $Lcity = $subArray[city];  $Lstate_abbriviation = $subArray[state];  $LsearchString = $z;

// RUN THE CHECK TO SEE IF THE JOB IS A GOOD JOB
$goodJob = "1";
foreach ($arrCleansejobTitle as &$testString) { if (strlen(stripos($subArray[jobtitle], $testString))>0) { $goodJob = "0";   }  else {   } }
foreach ($arrCleanseCompany as &$testString) { if (strlen(stripos($subArray[company], $testString))>0) { $goodJob = "0";  }  }
foreach ($arrCleanseSnippet as &$testString) { if (strlen(stripos($subArray[snippet], $testString))>0) { $goodJob = "0";  }  }

if($goodJob == "1"){  
														$sql = "INSERT INTO `raw_Indeed`	(`jobTitle`,`company`,`city`,`state`,`source`,`postDate`,`description`,`url`,  `jobKey`,  `searchString`)
														VALUES ( '$subArray[jobtitle]' ,  '$subArray[company]' ,   '$subArray[city] ' ,  '$subArray[state]' ,  '$subArray[source]' , 	'$postedDate' ,   '$subArray[snippet]' ,  '$subArray[url]',  '$subArray[jobkey]','$z'   ) ;";
													$result = $conn->query($sql);  
														
														$sqlCompaniesCheck = "SELECT `companies`.`idcompanies`,	`companies`.`companyName`,
														`companies`.`city`,	`companies`.`state_abbriviation`,	`companies`.`searchString`,`companies`.`postingCount`
														FROM  `companies`	 WHERE companyName = '$subArray[company]'  AND searchString = '$z'  ; ";												
													$resultCompanyCheck = $conn->query($sqlCompaniesCheck);  
														
														if ($resultCompanyCheck->num_rows > 0) 																		{  	
														while($rowCompanyCheck = $resultCompanyCheck->fetch_assoc())             	{  
														$sqlCompanyLog = "UPDATE  `companies` SET  `postingCount` = `postingCount` +1  WHERE `idcompanies` =  '$rowCompanyCheck[idcompanies]';"; 
														} 
							
														}  else {
														$sqlCompanyLog = "INSERT INTO  `companies` ( `companyName`, `city`, `state_abbriviation`, `searchString`, `postingCount`)	VALUES ( '$LcompanyName', '$Lcity', '$Lstate_abbriviation', '$LsearchString', '1'  );";  
														 } 
														$resultCompanyCreate= $conn->query($sqlCompanyLog);  		
														//Print "<BR>GOOD JOB: ".$goodJob."<BR> GOOD JOB: ".strlen(strstr($subArray[jobtitle],'Sand'))."<BR>"; 
													//	print "<BR>Job Title: ".$subArray[jobtitle]." |	Company: ".$subArray[company]." | Snippet: ".$subArray[snippet]."<br>";
													//	 print "--";					
														}  else {  
													//	print "00 ";
//Print "<BR>NOT Good Job: ".$goodJob."<BR> NOT Good Job: ".strlen(strstr($subArray[jobtitle],'Sand'))."<BR>JOB TITLE: ".$subArray[jobtitle]."<hr>Company: ".$subArray[company]."<hr>Snippet: ".$subArray[snippet];
 } 


} 
 } }else{ } }
$startCount = $startCount+25; 
} // LOOP 5 TIMES
} 
 }// LOOP EACH STATE
 print "<BR>Update the Time of the Skill: ".$sqlZ."<BR>";
	$result = $conn->query($sqlZ);  
	}// LOOP JOB TITLES 

$sqlDelete = "DELETE FROM `raw_Indeed` WHERE postDate > (UNIX_TIMESTAMP(NOW())-864000);    "; 
$result = $conn->query($sqlDelete);  


foreach ($arrCleansejobTitle as &$testString) { if (strlen(stripos($subArray[jobtitle], $testString))>0) { 
$sqlDelete = "DELETE FROM `raw_Indeed` WHERE jobTitle like '%".$testString."%';    ";  $result = $conn->query($sqlDelete);   print"D";}  }
foreach ($arrCleanseCompany as &$testString) { if (strlen(stripos($subArray[company], $testString))>0) {
$sqlDelete = "DELETE FROM `raw_Indeed` WHERE company like '%".$testString."%';    ";  $result = $conn->query($sqlDelete);    print"D"; }  }
foreach ($arrCleanseSnippet as &$testString) { if (strlen(stripos($subArray[snippet], $testString))>0) { 
$sqlDelete = "DELETE FROM `raw_Indeed` WHERE snippet like '%".$testString."%';    ";  $result = $conn->query($sqlDelete);    print"D";}  }

// UPDATE `lovedjobs`.`raw_Indeed` SET `city` = 'Denver' WHERE `city` = 'Louisville' AND `state` = 'CO'

// Output the total number of rows in the table
$result = $conn->query("select count(*) AS TOTALCOUNTEND from raw_Indeed ;"); if ($result->num_rows > 0) {  while($row = $result->fetch_assoc()) { print "<BR><BR>ROWS in TABLE: ".$row[TOTALCOUNTEND]."<BR>"; }}

echo "<HR>###<hr>";  
?>
</body></html>