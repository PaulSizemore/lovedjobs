<?php include 'preLoad.php'  ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="mask-icon" href="assets/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<style>
body {font: normal normal normal 12px/12px "Trebuchet MS", Helvetica, sans-serif;color:#46494C;}
.cityNameContainer {  float:left;font: normal normal normal 12px/12px "Trebuchet MS", Helvetica, sans-serif;  width:120px; } 
.cityContainer { font: normal normal normal 14px/14px "Trebuchet MS", Helvetica, sans-serif; background-color:#ffffff; color:#46494C; margin-bottom:0px;  } 
.skillContainer {  text-overflow:clip; float:left; border-left: 1px solid; border-bottom: 1px solid; width:30px; height: 25px; font: normal normal normal 8px/8px "Trebuchet MS", Helvetica, sans-serif;  background-color:#bfefff; } 
.skillLabel { 
-webkit-transform: rotate(90deg);
-moz-transform: rotate(90deg);
-o-transform: rotate(90deg);
writing-mode: lr-tb;
    
    width:30px; height: 30px;  border: 0px solid;  float:left; text-align: right; 
    font: normal normal normal 14px/14px "Trebuchet MS", Helvetica, sans-serif; 
}
.skillLabelContainer { text-overflow:clip;    }
.RotatedTextContainer { height: 100px; border-left: 1px solid;float:left; width:30px;  background-color:rgb(193,224,227);} 
.skillName {     font: normal normal normal 7px/7px "Trebuchet MS", Helvetica, sans-serif; color:rgb(150,150,150) ;text-overflow:clip;  } 
.skillCount {     padding-top:2px; padding-left:2px; font: normal normal normal 10px/10px "Trebuchet MS", Helvetica, sans-serif;
color:#fff;
  text-shadow:
   -1px -1px 0 #000,  
    1px -1px 0 #000,
    -1px 1px 0 #000,
     1px 1px 0 #000;
 
 }
  
</style>
</head>
<body>
<?php 
print "<div class=\"skillLabelContainer\" ><div  class=\"cityNameContainer\">City Name</div>";
								$sqlMarTech = "SELECT `skills`.`idskills`, `skills`.`skillName`, `skills`.`skillCategory`, `skills`.`skillSearchTerm` FROM `leads`.`skills` WHERE skillCategory = \"martech\""; 	
								$resultMarTech= $conn->query($sqlMarTech); 				
								if ($resultMarTech->num_rows > 0) {  	
								while($rowMarTech = $resultMarTech->fetch_assoc()) 
								{     	
							print "<div  class=\"RotatedTextContainer\"><div class=\"skillLabel\" style=\"\">".$rowMarTech[skillName]."</div></div>";

								}  }
									print "</div><div  style=\"clear:both; \"></div>";
$sqlTOPCities="SELECT     distinct(`cities`.`city`), `cities`.`locId`,   `cities`.`state_abbriviation`,   `cities`.`postalCode`,
`cities`.`latitude`,    `cities`.`longitude`,    `cities`.`metroCode`,    `cities`.`areaCode`,    `cities`.`state_name`,    `cities`.`population`
FROM `leads`.`cities`  WHERE  `cities`.`population`> 500000   GROUP BY `cities`.`city` ORDER BY `cities`.`state_abbriviation`  LIMIT 100 ";
$resultTOPCities= $conn->query($sqlTOPCities); 	
if ($resultTOPCities->num_rows > 0) {
while($row = $resultTOPCities->fetch_assoc()) 
{     $cityPopulation = $row[population]; 
								print "<div class=\"cityContainer\" >";
								print "<div class=\"cityNameContainer\" >".$row[city].", ".$row[state_abbriviation]."</div>";
								
								$sqlMarTech = "SELECT `skills`.`idskills`, `skills`.`skillName`, `skills`.`skillCategory`, `skills`.`skillSearchTerm` FROM `leads`.`skills` WHERE skillCategory = \"martech\" "; 	
								$resultMarTech= $conn->query($sqlMarTech); 				
								if ($resultMarTech->num_rows > 0) {  	
								while($rowMarTech = $resultMarTech->fetch_assoc()) 
								{     	
																			$sqlSkill = "SELECT SUM(`companies`.`postingCount`) AS SUMofJobs FROM `leads`.`companies`
																			WHERE     `companies`.`city` = \"".$row[city]."\"AND     `companies`.`state_abbriviation` = \"".$row[state_abbriviation]."\" 
																			AND    `companies`.`searchString` = \"".$rowMarTech[skillName]."\"  ;  ";
																			$resultSkillCount= $conn->query($sqlSkill); 	
																			$SkillCount  = ""; $colorValue  = "255";  $skillName =  "";
																			if ($resultSkillCount->num_rows > 0) {  	
																			while($rowSkillCount = $resultSkillCount->fetch_assoc()) 
																			{   
																			$SkillCount = $rowSkillCount[SUMofJobs];  	
																			
																			if ($SkillCount/$cityPopulation > 0) {			
																			$colorValue = 235-round(($SkillCount/$cityPopulation)*1000000); 
																			$RGBcolorValue =  $colorValue.",".$colorValue.",".$colorValue;
																			} else { $colorValue ="255";  $RGBcolorValue= "193,224,227";} 
																			
																			$SkillCount = round($SkillCount/$cityPopulation*10000,2);  	
																			$skillName = $rowMarTech[skillName]; 	
																			$skillClass = "skillCount" ; 
																			$SkillCount = "";  	
																			$skillName = ""; 	
																			}
									 }
								print "<div class=\"skillContainer\" style=\"background-color:rgb(".$RGBcolorValue.")\"><div class=\"".$skillClass."\">".$SkillCount."</DIV><div class=\"skillName\">".$skillName."</div></div>";
								}} print "<div style=\"clear:both;\"></div></div >";
}} else { }
  ?>
<div style='clear:both;'></div>			
</body>
</html>
