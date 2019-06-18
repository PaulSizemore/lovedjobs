<?php 

$URLSkill=$_GET["skill"];
$URLCity=$_GET["city"];



include 'preLoad.php'  ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
a {color:#000000; }
h1 {font: normal normal normal 24px/24px "Trebuchet MS", Helvetica, sans-serif; background-color:#ffffff; color:#46494C; }
h2{height:30px;border: none; font: bold normal normal 14px/14px "Trebuchet MS", Helvetica, sans-serif; text-align: left; -o-text-overflow: ellipsis; text-overflow: ellipsis; }
img { z-index: 100; }
.mostLoved ul{ background-color:#fff;}
.mostLoved div.MostLoved{margin-left:30px; display: block; -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box; float: none; height: 12px; width:110px;cursor: pointer; margin: 0 13px 5px 0; padding: 5px 5px 5px 5px; overflow: hidden; border: 1px solid; -webkit-border-radius: 7px; border-radius: 7px; font: bold 12px/1 Tahoma, Geneva, sans-serif; text-align: center; -o-text-overflow: ellipsis; text-overflow: ellipsis; background: #bddbef; }
.mostLoved div.MostLoved:hover { background-color: #92beed;}
.mostLoved div.go{margin-left:30px; display: block; -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box; float: none; height: 12px; width:110px;cursor: pointer; margin: 0 13px 5px 0; padding: 5px 5px 5px 5px; overflow: hidden; border: 1px solid; -webkit-border-radius: 7px; border-radius: 7px; font: bold 12px/1 Tahoma, Geneva, sans-serif; text-align: center; -o-text-overflow: ellipsis; text-overflow: ellipsis; background: #bddbef; }
.mostLoved div.go:hover { background-color: #92beed;}
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
#keyword {	width: 125px;	font-size: .9em;	margin-right:10px;}
#results {	width: 175px;	position: absolute;	border: 1px solid #c0c0c0;	background-color:#ffffff; }
#results .item {	padding: 3px;	font-family: Helvetica;	border-bottom: 1px solid #c0c0c0;}
#results .item:last-child {	border-bottom: 0px;}
#results .item:hover {	background-color: #f2f2f2;	cursor: pointer;}
</style>

<script src="jquery.min.js"  ></script>
<script type="text/javascript" src="http://gdc.indeed.com/ads/apiresults.js"></script>
<script type="text/javascript">var switchTo5x=true;</script>

                <meta property="og:image"content="http://lovedjobs.com/assets/share-image.png" /> 
                <meta property="og:site_name"content="Loved Jobs: See what city has the jobs you love" />
                <script >
$(document).ready(function(){
    $("#go").click(function(){
    var serchString = document.getElementById('keyword').value;  
        $.ajax({url: "topCities.php", 
         type: "POST",
         data: { lovedLang : serchString },
        success: function(result){
         $("#cityBox").html(result);	}});   
        $.ajax({url: "mapBox.php", 
         type: "POST",
         data: { lovedLang : serchString },
        success: function(result){
         $("#mapBox").html(result);	}});     
        $.ajax({url: "detailJobListing.php", 
         type: "POST",
         data: { lovedLang : serchString },
        success: function(result){
         $("#detailJobListing").html(result);	}});
         
        $.ajax({url: "topCompanies.php", 
         type: "POST",
         data: { lovedLang : serchString },
        success: function(result){
         $("#companyBox").html(result);	}});
    });


    $("div.MostLoved").click(function(){
		var lovedLang = $(this).data('loved');
        $.ajax({url: "topCities.php",        type: "POST",       data: { lovedLang : lovedLang },      success: function(result){    $("#cityBox").html(result);	}});
        $.ajax({url: "mapBox.php",   type: "POST",  data: { lovedLang : lovedLang },  success: function(result){    $("#mapBox").html(result);	}});   
        $.ajax({url: "detailJobListing.php",          type: "POST",         data: { lovedLang : lovedLang },        success: function(result){      $("#detailJobListing").html(result);	}});
        $.ajax({url: "topCompanies.php",         type: "POST",         data: { lovedLang : lovedLang },        success: function(result){         $("#companyBox").html(result);	}});
         });
          });
</script>

<meta name="author" content="Paul Sizemore">
<meta name="description" content="A map of the USA with all the past week's <?php print $displayLanguageName ?> jobs mapped so you can see where the skills are needed.  ">

<title>Where to get the <?php print $displayLanguageName ?> jobs you love</title></head><body>

<div class="leftContainer">
														<div class='mostLoved'><h1>Find a Job You Love </h1>
														<p>
														<?php print "Find ".$displayLanguageName." jobs." ?><BR>See what cities have the jobs you want. Every year <a href="http://stackoverflow.com/research/developer-survey-2015" target="_blank">Stackoverflow</a> conducts a survey, and one question is 'what language do you love the most?' 
														This is a US map with the cities that have those jobs. Click the buttons below to toggle the results for each different development language.  
														</P><p>
														<h4>Find a job you love </h4>
														</P><p>Select your favorite language or <B>search </B> for a  <a href="http://lovedjobs.com/listing.php">different language</a>, and start to see how many jobs are out there and WHERE. </P>
														
<input   type="text" value="" placeholder="Search" id="keyword" style="float:left;" autocomplete="off"> 
<div id="go" class="go" style="width:25px; float:left;" data-loved='coldfusion'  >GO</div><div style="clear:both;"></div>
<div id="results">
</div>
														<h2><BR>Most Loved Language List</h2>
														
														<?php
														foreach($arrJobTitles as $word){ 
// 														 	if($_SESSION["lovedLang"] ==$word) { $selectedClass= "selectedMostLoved"; } else { 
														 	$selectedClass= "MostLoved";  
// 														 	} 
															echo'<a href="http://lovedjobs.com/'.$word.'"><div data-loved="'.$word.'" class="'.$selectedClass.'" id="'.$word.'">'.$word.'</div> </a>'; 
														} ?>
														<h2><BR>About this site / Me</h2>
														
																
<a href="http://www.linkedin.com/in/paulsizemore" rel="nofollow" target="_blank"><img width="16" height="16" src="assets/linkedin-small.png" 
				alt="Follow Me On LinkedIn" 
				title="Follow Me On LinkedIn"class="fade" /></a>
				
				<a href="http://twitter.com/paulsizemore" rel="nofollow" target="_blank"><img width="16" height="16" src="assets/twitter.png" 
				alt="Follow Me On Twitter" 
				title="Follow Me On Twitter"  class="fade" /></a>
				
<a href="https://github.com/PaulSizemore" rel="nofollow" target="_blank"><img width="16" height="16" src="assets/github.png" 
				alt="Follow Me On Github" 
				title="Follow Me On Github" class="fade" /></a>
				
				<a href="http://paulsizemore.tumblr.com" rel="nofollow" target="_blank"><img width="16" height="16" src="assets/tumblr.png" 
				alt="Follow Me On Tumblr" 
				title="Follow Me On Tumblr"  class="fade" /></a>
				
				
														<p>This site was created by <a href="http://paulsizemore.com" target="_blank">Paul Sizemore</a>. I currently live in Louisville, KY, and 
														am a marketing technologist. I've been gathering and analyzing job data in an effort to better understand my city.  For instance, I was surprised 
														that Louisville has the most C# job postings (at least at March 10, 2016). 
														</P><p  align="left">
													<!--	<a  href="http://stackoverflow.com/users/2917101/paul-sizemore">
<img src="http://stackoverflow.com/users/flair/2917101.png?theme=clean" width="208" height="58" alt="profile for Paul Sizemore at Stack Overflow, Q&amp;A for professional and enthusiast programmers" title="profile for Paul Sizemore at Stack Overflow, Q&amp;A for professional and enthusiast programmers">
</a>-->
														</P><p>
														

	


		
		<BR><BR>
														</P><p>
													Mapping framework:<BR>
														 <a href="http://kartograph.org" target="_blank"><img src="assets/kartograph.png"  width="98" heigth="26"></a>
														<p>
														<span id=indeed_at><a href="http://www.indeed.com/">jobs</a> by <a
href="http://www.indeed.com/" title="Job Search"><img
src="http://www.indeed.com/p/jobsearch.gif"  alt="Indeed job search"></a></span></p>
                                
														</P></div>

</div>

<div >
  <div class ='cityBox' id='cityBox'><?php include 'topCities.php' ?></div>
<div class="mapBox" id="mapBox"><?php include 'mapBox.php' ?></div>
</div>

<div >
 <div class ='companyBox' id='companyBox'><?php include 'topCompanies.php' ?></div> 
</div>

<div>
<div class="detailJobListing" id="detailJobListing"><?php include 'detailJobListing.php' ?> </div>
</div>

</body>
<script src="kartograph/jquery-1.10.2.min.js"></script>
<script src="kartograph/raphael-2.1.0.min.js"></script>
<script src="kartograph/kartograph.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1575209-57', 'auto');
  ga('require', 'linkid');
  ga('send', 'pageview');

</script>
  <script src="auto-complete.js"></script>
</html>