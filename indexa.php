<?php 
 $servername = "localhost"; $username = "lovedjobs_crud"; $password = "L4jrD?n2Mbz~'UV4"; $dbname = "lovedjobs"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {    die("Connection failed: " . $conn->connect_error); } 


$URLSkill=$_GET["skill"];
$URLCity=$_GET["city"];
print "\n<!--  Skill:"; print $URLSkill;  print " \nCity:"; print  $URLCity; print "-->"; 

// SQL STATMENTS 
$sqlCrossRef = "SELECT skillName,skillSearchTerm  FROM  skills  Where skillName = '".str_replace(' ',' ',$URLSkill)."'"; 
print "\n<!-- Cross Ref SQL: ".$sqlCrossRef."-->";

$result= $conn->query($sqlCrossRef); 	
					 if ($result->num_rows > 0) {  	while($row = $result->fetch_assoc())  
									{   print "\n<!-- Run -->"; $displayLanguageName = $row[skillName];
									$LanguageSearchName = $row[skillSearchTerm];  } print "\n<!-- Run -->"; 
					 } else {  print "\n<!-- NOT Run -->";   }
print "\n<!--  Display Name:"; print $displayLanguageName;  print "\n Search Name:  "; print  $LanguageSearchName; print "-->"; 



?>