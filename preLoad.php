<?php session_start(); 
$servername=$_SESSION["servername"] ; $username=$_SESSION["username"] ; $password=$_SESSION["password"] ; $dbname=$_SESSION["dbname"] ;
require 'us_state_abbrevs_names.php';    require 'arrJobTitlesmostLoved.php';    
$displayLanguageName = "";
 $servername = "localhost"; $username = "lovedjobs_crud"; $password = "L4jrD?n2Mbz~'UV4"; $dbname = "lovedjobs"; 
 //$servername = "localhost"; $username = "root"; $password = "root"; $dbname = "leads"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {    die("Connection failed: " . $conn->connect_error); } 

// New URL Paraneters 
$URLSkill=$_GET["skill"];
$URLCity=$_GET["city"];
// print "\n<!--  Display skill:"; print $URLSkill;  print " ----  City:  "; print  $URLCity; print "-->"; 

$sqlCrossRef = "SELECT skillName,skillSearchTerm  FROM  skills  Where skillName = '".str_replace(' ',' ',$URLSkill)."'"; 
// print "\n<!-- Cross Ref SQL: ".$sqlCrossRef."-->";
$result= $conn->query($sqlCrossRef); 	
					 if ($result->num_rows > 0) {  	while($row = $result->fetch_assoc())  
									{   $displayLanguageName = $row[skillName];
									$LanguageSearchName = $row[skillSearchTerm];  } 
					 } else {   }
// print "\n<!--  Display Name:"; print $displayLanguageName;  print " ---- Search Name:  "; print  $LanguageSearchName; print "-->"; 



// URL PARAMETER - INCLUDING CROSS REFF TO GET SEARCH TERM
//if(isset($_GET['lang']))  
if(isset($URLSkill))  
{  
//$_POST["lovedLang"] =$_GET['lang'];
$_POST["lovedLang"] =$URLSkill;
//$tempKeyword  =$_GET['lang'];
$tempKeyword  =$URLSkill;
//$_SESSION["lovedLang"]   =$_GET['lang'];
$_SESSION["lovedLang"]   =$URLSkill;
// print "\n<!--  URL: Session: ".$_SESSION["lovedLang"]."-->";
$sqlCrossRef = "SELECT skillName,skillSearchTerm  FROM  skills  Where skillName = '".str_replace(' ',' ',$tempKeyword)."'"; 
//$sqlCrossRef = "SELECT skillName  FROM  skills  Where skillSearchTerm = '".str_replace(' ','+',$tempKeyword)."'"; 
// print "\n<!-- Cross Ref: ".$sqlCrossRef."-->";
$result= $conn->query($sqlCrossRef); 	
					 if ($result->num_rows > 0) {  	while($row = $result->fetch_assoc())  
									{   $displayLanguageName = $row[skillName];
									$LanguageSearchName = $row[skillSearchTerm];  }
					 }
}
$arrJobTitles = $arrJobTitlesmostLoved;

// AJAX LANGUAGE CALL CROSS REFF 
if(isset($_POST['lovedLang']))  
{  
$tempKeyword  =$LanguageSearchName; 
//$tempKeyword  =$_POST['lovedLang'];
$sqlCrossRef = "SELECT skillSearchTerm, skillName  FROM lovedjobs.skills  Where skillName = '".$tempKeyword."'"; 
$result= $conn->query($sqlCrossRef); 	
if ($result->num_rows > 0) {  	while($row = $result->fetch_assoc()) 
{   $searchTermKeyword = $row[skillSearchTerm];$displayLanguageName = $row[skillName]; $_SESSION["lovedLang"] =  $row[skillSearchTerm]; }}   }  else {  }
//print "<!--  Second Setting :".$_SESSION["lovedLang"]."-->";

// LANGUAGE SQL SEARCH 
// $lovedLang = $_SESSION["lovedLang"] ; 
$lovedLang = $LanguageSearchName;
if($lovedLang != "") {  $argJob = "  AND  raw_Indeed.searchstring = '".$lovedLang."'  ";  }

// AJAX CITY CALLS 
if(isset($_POST['topcity']))  {   $_SESSION["topcity"] = $_POST['topcity'];   }  else {  }
//$topcity = $_SESSION["topcity"] ; 
$topcity = $URLCity; 
if($topcity != "") { $citySqlTest = " AND  raw_Indeed.city = '".$topcity."'  ";   }

// AJAX STATE CALLS 
if(isset($_POST['topstate']))  { $_SESSION["topstate"] = $_POST['topstate'];   
$topstate = $_SESSION["topstate"] ;  $stateSqlTest = " AND  raw_Indeed.state = '".$topstate."'  ";  }  else {  $stateSqlTest =  " AND 34 =34"; }
?>