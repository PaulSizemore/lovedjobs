<?php include 'preLoad.php'  ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="mask-icon" href="assets/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<style>
body {font: normal normal normal 12px/12px "Trebuchet MS", Helvetica, sans-serif;color:#46494C;}
a { margin:5px; padding-bottom:5px; }
</style>
</head>
<body>
<?php 
$populationSize = "1000000";

print "<H1>Cities with population over ".number_format($populationSize).".</H1><div class=\"skillLabelContainer\" ><div  class=\"cityNameContainer\"> Name of Skill</div>";
								$sqlMarTech = "SELECT `skills`.`idskills`, `skills`.`skillName`, `skills`.`skillCategory`, `skills`.`skillSearchTerm` 
								FROM `skills` Order by skillName"; 	
								$resultMarTech= $conn->query($sqlMarTech); 				
								if ($resultMarTech->num_rows > 0) {  	
								while($rowMarTech = $resultMarTech->fetch_assoc()) 
								{     	
							print "<a href='http://lovedjobs.com/".$rowMarTech[skillSearchTerm]."'>".$rowMarTech[skillName]."</a><br>";

								}  }
									print "</div><div  style=\"clear:both; \"></div>";
									
  ?>
<div style='clear:both;'></div>			
</body>
</html>
