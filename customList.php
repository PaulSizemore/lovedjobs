<?php include 'preLoad.php'  ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name=viewport content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" sizes="57x57" href="assets/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="assets/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="assets/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/apple-touch-icon-114x114.png">
<link rel="icon" type="image/png" href="assets/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="assets/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="assets/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="assets/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<style>
body {font: normal normal normal 14px/14px "Trebuchet MS", Helvetica, sans-serif; background-color:#ffffff; color:#46494C;}
.small {font-size: 12px; /* 75% of the baseline */}
.large {font-size: 20px; /* 125% of the baseline */}
em {margin-left:20px; }
a {color:#92beed; }
h1 {font: normal normal normal 24px/24px "Trebuchet MS", Helvetica, sans-serif; background-color:#ffffff; color:#46494C; }
h2{height:30px;border: none; font: bold normal normal 14px/14px "Trebuchet MS", Helvetica, sans-serif; text-align: left; -o-text-overflow: ellipsis; text-overflow: ellipsis; }
img { z-index: 100; }

.mostLoved ul{ background-color:#fff;}
.mostLoved div.MostLoved{margin-left:30px; display: block; -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box; float: none; height: 12px; width:110px;cursor: pointer; margin: 0 13px 5px 0; padding: 5px 5px 5px 5px; overflow: hidden; border: 1px solid; -webkit-border-radius: 7px; border-radius: 7px; font: bold 12px/1 Tahoma, Geneva, sans-serif; text-align: center; -o-text-overflow: ellipsis; text-overflow: ellipsis; background: #bddbef; }
.mostLoved div.MostLoved:hover { background-color: #92beed;}

div.go{margin-left:30px; display: block; -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box; float: none; height: 12px; width:110px;cursor: pointer; margin: 0 13px 5px 0; padding: 5px 5px 5px 5px; overflow: hidden; border: 1px solid; -webkit-border-radius: 7px; border-radius: 7px; font: bold 12px/1 Tahoma, Geneva, sans-serif; text-align: center; -o-text-overflow: ellipsis; text-overflow: ellipsis; background: #bddbef; }
div.go:hover { background-color: #92beed;}


.mostLoved {width:200px;margin-right:10px;margin-left:40px; border: 1px solid; float:left; padding-right:20px;-webkit-box-sizing: content-box; -moz-box-sizing: content-box; border: 0 solid; /* border-right: 1px solid rgba(155,155,155,1);*/ }

ul.topcompany { list-style-type: none; margin: 0; padding: 0; width: 150px; background-color: #ffffff; }
li { text-align: left; padding-left:14px; }
ul { list-style-type: none;border: 0px solid #555; margin: 0; padding: 0;background-color: #ffffff; }
li a { display: block; padding: 5px 0 5px 5px; text-decoration: none; color:#46494C; }
.topCitiesLI:hover{ background-color: #92beed;   }

div li:hover { background-color: #92beed;}
.active { background-color: #92beed;}
.cityBox {float:left; display:block; margin-right:10px;background-image: url("assets/heart.png"); background-repeat: no-repeat; background-position: right top;}
.companyBox {width:270px;padding-left:0px; float:left; display:block; margin-right:10px; }
.leftContainer { float:left;border: 0px solid; width:270px;}
.rightContainer { float:left;border: 0px solid; }
.detailJobListing { display:block; float:left;}
.detailPostDate{display:inline;margin-left:10px;font: italic normal normal 10px/10px "Trebuchet MS", Helvetica, sans-serif; }
.detailBox{ padding: 5px 0 5px 5px; width: 550px; font: normal normal normal 13px/13px "Trebuchet MS", Helvetica, sans-serif;display:block; -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box; border: 0 solid; border-bottom-width: 1px; color: rgba(0,0,0,0.9); -o-text-overflow: clip; text-overflow: clip;}
.detailBox :hover{background-color: #92beed;}
.detailBoxa { text-decoration: none; color:#46494C;}
.detailCompany{display:inline;margin-left:10px;font: normal normal normal 10px/10px "Trebuchet MS", Helvetica, sans-serif; }
.cityBox { width:270px;float:left; border: 0px solid; }
.mapBox {width:640px;display:block; float:left; border: 0px solid;}
.topCitiesLI{ display: inline; -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box; float: left; height: 15px; cursor: pointer; margin: 0 15px 7px 0; padding: 5px 7px 3px 10px; overflow: hidden; border: 1px solid; -webkit-border-radius: 7px; border-radius: 7px; font: normal 12px/1 Tahoma, Geneva, sans-serif; text-align: center; -o-text-overflow: ellipsis; text-overflow: ellipsis; background: #bddbef;}
.mostLoved img { margin-left:20px; background-color:#fff;color:#fff; }

#keyword {
	width: 125px;
	font-size: .9em;
	margin-right:10px;
}

#results {
	width: 175px;
	position: absolute;
	border: 1px solid #c0c0c0;
	background-color:#ffffff; 
}

#results .item {
	padding: 3px;
	font-family: Helvetica;
	border-bottom: 1px solid #c0c0c0;
}

#results .item:last-child {
	border-bottom: 0px;
}

#results .item:hover {
	background-color: #f2f2f2;
	cursor: pointer;
}

</style>

<script src="jquery.min.js"  ></script>

<?php

$keyword = $_POST['keyword'];
$city = $_POST['city'];
if($city !=""){ $citySqlTest = "AND city = '".$city."'";  }
if($keyword !=""){ $argJob = "AND searchstring = '".$keyword."'";  }
?>

<meta name="author" content="Paul Sizemore">
<title>Where to get the skills you love</title></head><body>
<form name="search-form" 
      id="search-form" 
      action="customList.php" 
      class="form-search"  method="post">
      <input   type="text" value="" placeholder="<?php print $keyword ?>" id="keyword" name="keyword"  style="padding-right:30px; float:left; " > 

<input   type="text" value="" placeholder="<?php print $city ?>" id="city" style="padding-right:30px; float:left; " name="city">  
<div id="go" class="go" style="width:25px;  margin-left:20px; " onClick="document.forms['search-form'].submit();"  >GO</div><div style="clear:both;"></div>
<div id="results">
</div>
			</form>			
<?php

$keyword = $_POST['keyword'];
$city = $_POST['city'];
if($city !=""){ $citySqlTest = "AND city = '".$city."'";  }
if($keyword !=""){ $argJob = "AND searchstring = '".$keyword."'";  }


$ARGsql = ""; 
$sqlDetailJobList="SELECT 	description, Postdate,jobtitle, url, company, city, state, raw_Indeed.searchstring 	FROM raw_Indeed where 1=1  ".$citySqlTest ."  ".$argJob."   ORDER BY Postdate DESC LIMIT 1000";
//print $sqlDetailJobList."<BR>"; 
//var_dump($_POST); 
$result= $conn->query($sqlDetailJobList); 	
// OUTPUT OF THE MAIN QUERY RESULTLS
if ($result->num_rows > 0) {  	
print " <h2>Recently posted <B>".$topcity."</B>  <B><?php print $lovedLang ?></B> jobs    </h2> <ul>  ";
while($row = $result->fetch_assoc()) 
{    
echo  "<li class=\"detailBox\"><a target=\"_blank\" href=\"".$row[url]."&chnl=loveLang&userip=".$_SERVER['REMOTE_ADDR']."&useragent=".$_SERVER['HTTP_USER_AGENT']."\" >".substr($row[jobtitle],'0','50')."<div class=\"detailCompany\">".substr($row[company],'0','30')."</div><div class=\"detailPostDate\">".date('m-d-Y',$row[Postdate])."</div>   <img style=\"padding-left:10px\" src=\"assets\\web.png\" width=\"12\" heigth=\"12\">
<div style='padding-top:5px;' >".$row[description]."</div></li>"   ;
}
print "</ul>"; 
}		
//var_dump($sqlDetailJobList);
?> 
<div style='clear:both;'></div>			

</body>

<script src="kartograph/jquery-1.10.2.min.js"></script>
  <script src="auto-complete.js"></script>
</html>