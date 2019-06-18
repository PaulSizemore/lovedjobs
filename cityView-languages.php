<?php include 'preLoad.php'  ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="mask-icon" href="assets/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<style>
body {font: normal normal normal 12px/12px "Trebuchet MS", Helvetica, sans-serif;color:#46494C;}
.cityNameContainer {  float:left;font: normal normal normal 12px/12px "Trebuchet MS", Helvetica, sans-serif;  width:120px; padding-top:3px; border-bottom: 1px solid;  } 
.cityContainer { font: normal normal normal 14px/14px "Trebuchet MS", Helvetica, sans-serif; background-color:#ffffff; color:#46494C; margin-bottom:0px;  } 
.skillContainer {  text-overflow:clip; float:left; border-left: 1px solid; border-bottom: 1px solid; width:15px; height: 15px; font: normal normal normal 8px/8px "Trebuchet MS", Helvetica, sans-serif;  background-color:#bfefff; } 
.skillLabel { 
-webkit-transform: rotate(90deg);
-moz-transform: rotate(90deg);
-o-transform: rotate(90deg);
writing-mode: lr-tb;
    
    width:15px; height: 15px;  border: 0px solid;  float:left; text-align: right; 
    font: normal normal normal 10px/10px "Trebuchet MS", Helvetica, sans-serif; text-overflow:clip;
}
.skillLabelContainer { text-overflow:clip;    }
.RotatedTextContainer { height: 90px; border-left: 1px solid;float:left; width:15px;  background-color:rgb(193,224,227); padding-top:5px; text-overflow:clip;	} 
.skillName {     font: normal normal normal 7px/7px "Trebuchet MS", Helvetica, sans-serif; color:rgb(150,150,150) ;text-overflow:clip;  } 
.skillCount {     padding-top:2px; padding-left:2px; font: normal normal normal 6px/6px "Trebuchet MS", Helvetica, sans-serif;
color:#fff;
/* 
  text-shadow:
   -1px -1px 0 #000,  
    1px -1px 0 #000,
    -1px 1px 0 #000,
     1px 1px 0 #000;
 */
 
 }
  
</style>
</head>
<body>
<?php 
$populationSize = "750000";

print "<H1>Cities with population over ".number_format($populationSize).".</H1><div class=\"skillLabelContainer\" ><div  class=\"cityNameContainer\">City Name</div>";
								$sqlMarTech = "SELECT `skills`.`idskills`, `skills`.`skillName`, `skills`.`skillCategory`, `skills`.`skillSearchTerm` 
								FROM `skills` WHERE skillCategory = \"language\"  AND displayOrder < '50' Order by displayOrder"; 	
								$resultMarTech= $conn->query($sqlMarTech); 				
								if ($resultMarTech->num_rows > 0) {  	
								while($rowMarTech = $resultMarTech->fetch_assoc()) 
								{     	
							print "<div  class=\"RotatedTextContainer\"><div class=\"skillLabel\" style=\"\">".$rowMarTech[skillName]."</div></div>";

								}  }
									print "</div><div  style=\"clear:both; \"></div>";
									


// GET CITY LIST --------------------------------------------------------
$sqlTOPCities="SELECT     distinct(`cities`.`city`), `cities`.`locId`,   `cities`.`state_abbriviation`,   `cities`.`postalCode`,
`cities`.`latitude`,    `cities`.`longitude`,    `cities`.`metroCode`,    `cities`.`areaCode`,    `cities`.`state_name`,    `cities`.`population`
FROM `cities`  WHERE  `cities`.`population`> ".$populationSize."   GROUP BY `cities`.`city` ORDER BY `cities`.`state_abbriviation` ";

// GET THE NATIONAL AVERAGE FOR THE CITY SIZE
$sqlAVERAGEofJobs="SELECT AVG(`companies`.`postingCount`) AS AVERAGEofJobs FROM `companies`
																			     WHERE  `cities`.`population`> ".$populationSize."  ; " ;
$resultAVERAGEofJobs= $conn->query($sqlAVERAGEofJobs); 	
if ($resultAVERAGEofJobs->num_rows > 0) {
while($row = $resultAVERAGEofJobs->fetch_assoc()) 
{ $AVERAGEofJobs=$row[AVERAGEofJobs];    }}






$resultTOPCities= $conn->query($sqlTOPCities); 	
if ($resultTOPCities->num_rows > 0) {
while($row = $resultTOPCities->fetch_assoc()) 
{     $cityPopulation = $row[population]; 
								print "<div class=\"cityContainer\" >";
								print "<div class=\"cityNameContainer\" >".$row[city].", ".$row[state_abbriviation]."</div>";
								// GET ALL SKILLS LIST FOR THE CITY --------------------------------------------------------
								$sqlMarTech = "SELECT `skills`.`idskills`, `skills`.`skillName`, `skills`.`skillCategory`, `skills`.`skillSearchTerm` FROM `skills` WHERE skillCategory = \"language\"  AND displayOrder < '50' Order by displayOrder"; 	
								$resultMarTech= $conn->query($sqlMarTech); 				
								if ($resultMarTech->num_rows > 0) {  	
																				// GET THE SUM FOR THE CITY   --------------------------------------------------------
																			$sqlMaxJobsl = "SELECT SUM(`companies`.`postingCount`) AS SUMofJobs FROM `companies`
																			WHERE     `companies`.`city` = \"".$row[city]."\"AND     `companies`.`state_abbriviation` = \"".$row[state_abbriviation]."\" 
																			  ;  ";
																			$resultMaxJobs= $conn->query($sqlMaxJobsl); 	
																			if ($resultMaxJobs->num_rows > 0) {  	
																			while($rowMaxJobs = $resultMaxJobs->fetch_assoc()) 
																			{   
																			$SkillMaxJobs = $rowMaxJobs[SUMofJobs]; 
																			
																			 	} } 																			
																		//	$SkillMaxJobs = $AVERAGEofJobs; 									
								while($rowMarTech = $resultMarTech->fetch_assoc()) 
								{     	
																			
																			
																			
																
																			// GET THE SUM FOR THE SKILL IN THE CITY   --------------------------------------------------------
																			$sqlSkill = "SELECT SUM(`companies`.`postingCount`) AS SUMofJobs FROM `companies`
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
																			$SkillCount = $rowSkillCount[SUMofJobs];  	
																			$skillName = ""; 	
																		//	$SkillMaxJobs = "1"; // //  //  /// //// 
																			$percentJobs = round($SkillCount/$SkillMaxJobs*100,'1') ; 
																			$colorValue = round(200-($percentJobs*$percentJobs*$percentJobs*2)); 
																			$RGBcolorValue =  $colorValue.",".$colorValue.",".$colorValue;
																			}
									 }
								//	 if($SkillCount = "0"){  print "<HR><HR><HR><HR>";}
								print  "<div class=\"skillContainer\" style=\"background-color:rgb(".$RGBcolorValue.")\"><div class=\"".$skillClass."\">".$percentJobs."%</DIV><div class=\"skillName\">".$skillName."</div></div>";
								}} print "<div style=\"clear:both;\"></div></div >";
}} else { }
  ?>
<div style='clear:both;'></div>			
</body>
</html>
