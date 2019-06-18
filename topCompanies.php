<?php
require 'preLoad.php';  
$sqlTOP10Companies="SELECT 	 company, city, state, raw_Indeed.searchstring, count(jobTitle) AS CountofJobs 	FROM raw_Indeed where  1=1 ".$citySqlTest ."  ".$argJob." 
GROUP by company ORDER BY CountofJobs DESC  LIMIT 40";		
// var_dump($sqlTOP10Companies); 
$resultTOP10Companies= $conn->query($sqlTOP10Companies); 
$Counter = "1"; 
if ($resultTOP10Companies->num_rows > 0) {  	
print "<h2><B>".$topcity."</B> Companies<BR> with the  most <B>".$displayLanguageName."</B> jobs </h2> <ul> ";
while($row = $resultTOP10Companies->fetch_assoc()) 
{    
$urlString = str_replace(' ','+',$row[city])."+".$row[state]; 
print  "<li class='topcompany'  data-val='".$row[company]."'><a target='_blank' href='http://www.indeed.com/jobs?q=\"".$row[company]."\"&l=".$urlString."&userip=".$_SERVER['REMOTE_ADDR']."&useragent=".$_SERVER['HTTP_USER_AGENT']."&chnl=loveLang'>".$Counter.". ".substr($row[company],0,20)."<!-- (".$row[CountofJobs].") --> <img style='padding-left:11px' src='http://lovedjobs.com/assets/web.png' width='12' heigth='12' ></a></li>\n\n";  $Counter=$Counter+1;
}	
}
print "<ul>";
?> 