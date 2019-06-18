<?php 
require 'preLoad.php';  
$ARGsql = ""; 
$sqlDetailJobList="SELECT 	Postdate,jobtitle, url, company, city, state, raw_Indeed.searchstring 	FROM raw_Indeed where 1=1  ".$citySqlTest ."  ".$argJob."   ORDER BY Postdate DESC LIMIT 200";
$result= $conn->query($sqlDetailJobList); 	
// OUTPUT OF THE MAIN QUERY RESULTLS
if ($result->num_rows > 0) {  	
print " <h2>Recently posted <B>".$topcity."</B>  <B>".$displayLanguageName."</B> jobs    </h2> <ul>  ";
while($row = $result->fetch_assoc()) 
{    
echo  "<li class=\"detailBox\"><a target=\"_blank\" href=\"".$row[url]."&chnl=loveLang&userip=".$_SERVER['REMOTE_ADDR']."&useragent=".$_SERVER['HTTP_USER_AGENT']."\" >".substr($row[jobtitle],'0','50')."<div class=\"detailCompany\">".substr($row[company],'0','30')."</div><div class=\"detailPostDate\">".date('M d-Y',$row[Postdate])."</div>   <img style=\"padding-left:10px\" src=\"http://lovedjobs.com/assets/web.png\" width=\"12\" heigth=\"12\"></a></li>"   ;
}
print "</ul>"; 
}		
// var_dump($sqlDetailJobList);
?> 
<!-- <div style='clear:both;'></div>			-->