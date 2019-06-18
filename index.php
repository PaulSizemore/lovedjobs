<?php
 include "preLoad.php" ;
 $populationSize = "1000000";  
$sqlTOP10Skills="SELECT DISTINCT  (skills.skillCategory) AS QskillCategory
FROM   companies, skills
WHERE   1 = 1 AND city =  '".$URLCity."'
AND skills.skillSearchTerm = companies.searchString
GROUP BY QskillCategory
ORDER BY QskillCategory DESC
LIMIT 8";																				
$selectedClass= "MostLoved";  
$htmlSkillsOut="<!-- START -->\n<div class=\"container\" style=\"width:80vw;\" ><ul class=\"nav nav-tabs\" role=\"tablist\"  >";	 
    
$resultsqlTOP10Skills= $conn->query($sqlTOP10Skills); 
if ($resultsqlTOP10Skills->num_rows > 0) {  	while($row = $resultsqlTOP10Skills->fetch_assoc()) 
{    $htmlSkillsOut=$htmlSkillsOut.'<li ';
if (strtolower($row[QskillCategory])=="languages") {  $htmlSkillsOut=$htmlSkillsOut." class=\"Active\" "; } 
$htmlSkillsOut=$htmlSkillsOut.'><a role="tab" data-toggle="tab" href="#'.strtolower($row[QskillCategory]).'">'.$row[QskillCategory].'</a></li>'; }	} 
$htmlSkillsOut=$htmlSkillsOut."</ul>";
$htmlSkillsOut=$htmlSkillsOut."<div class=\"tab-content\">  ";
$resultsqlTOP10Skills= $conn->query($sqlTOP10Skills); 
if ($resultsqlTOP10Skills->num_rows > 0) {  while($row = $resultsqlTOP10Skills->fetch_assoc())  {  
// HEADER -------------
$htmlSkillsOut=$htmlSkillsOut."<div class=\"tab-pane";
if (strtolower($row[QskillCategory])=="languages") {  $htmlSkillsOut=$htmlSkillsOut." active  "; } 
$htmlSkillsOut=$htmlSkillsOut." fade  in\" id=\"".strtolower($row[QskillCategory])."\" style=\"background-color:#ffffff\">  <h2> ".$row[QskillCategory]." </h2> ";
// SkillCat ----- 

$sqlJobsInCat = "SELECT `skills`.`idskills`, `skills`.`skillName`, `skills`.`skillCategory`, `skills`.`skillSearchTerm` 
FROM `skills` WHERE skillCategory = '".$row[QskillCategory]."' Order by skillName   "; 	
//$htmlSkillsOut=$htmlSkillsOut."<P>".$sqlJobsInCat."</p>";
$resultJobsInCat= $conn->query($sqlJobsInCat); 				
if ($resultJobsInCat->num_rows > 0) {  	
while($rowJobsInCat = $resultJobsInCat->fetch_assoc()) 
{     	
// - - - - - - - - - - - -
$htmlSkillsOut=$htmlSkillsOut."<span class=\"topCitiesLI\">
<a href='http://lovedjobs.com/".$rowJobsInCat[skillSearchTerm]."/'   style=\"cursor: pointer; text-decoration: none;color:#000000;   \">".$rowJobsInCat[skillName]."</a> </span>";
}  }

// ------------------
$htmlSkillsOut=$htmlSkillsOut." </div>   ";} }
$htmlSkillsOut=$htmlSkillsOut."</div><!-- END -->\n";
?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>Where to find the best<?php print $URLSkill ?> jobs in <?php print $URLCity ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<link rel="apple-touch-icon" sizes="57x57" href="http://lovedjobs.com/assets/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="http://lovedjobs.com/assets/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="http://lovedjobs.com/assets/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="http://lovedjobs.com/assets/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="http://lovedjobs.com/assets/apple-touch-icon-114x114.png">
<link rel="icon" type="image/png" href="http://lovedjobs.com/assets/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="http://lovedjobs.com/assets/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="http://lovedjobs.com/assets/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="http://lovedjobs.com/manifest.json">
<link rel="mask-icon" href="http://lovedjobs.com/assets/safari-pinned-tab.svg" color="#5bbad5">
<script src="http://lovedjobs.com/jquery.min.js"  ></script>
<script type="text/javascript" src="http://gdc.indeed.com/ads/apiresults.js"></script>
<script type="text/javascript">var switchTo5x=true;</script>
 <meta property="og:image"content="http://lovedjobs.com/assets/share-image.png" /> 
<meta property="og:site_name"content="Loved Jobs: See what city has the jobs you love" />
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Update the link path to where your stylesheet file is located. For example: /path/to/your/assets/css/lib/uswds.min.css -->
      <link rel="stylesheet" href="http://lovedjobs.com/assets/css/uswds.css">
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
.cityBox {float:left; display:block; margin-right:10px;background-image: url("http://lovedjobs.com/assets/heart.png"); background-repeat: no-repeat; background-position: right top;}
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
    </head>
    <body class="layout-demo">
    <a class="usa-skipnav" href="#main-content">Skip to main content</a>
    <header class="usa-header usa-header-basic" role="banner">
      <!-- Gov banner BEGIN -->
      <div class="usa-banner">
        <div class="usa-accordion">
          <header class="usa-banner-header">
            <div class="usa-grid usa-banner-inner">
            <img src="http://lovedjobs.com/assets/apple-touch-icon-57x57.png" alt="Loved Jobs">
            <p>Created by Paul Sizemore<a href="http://paulsizemore.com"></a></p>
            <!--<button class="usa-accordion-button usa-banner-button"
              aria-expanded="false" aria-controls="gov-banner">
              <span class="usa-banner-button-text">Find out more about Paul and this site</span>
            </button>-->
            </div>
          </header>
          <div class="usa-banner-content usa-grid usa-accordion-content" id="gov-banner">
            <div class="usa-banner-guidance-gov usa-width-one-half">
              <img class="usa-banner-icon usa-media_block-img" src="/assets/img/icon-dot-gov.svg" alt="Dot gov">
              <div class="usa-media_block-body">
                <p>
                  <strong>Find a job you love</strong>
                  <br>See what cities have the jobs you want. This is a US map that indicates the largest job postings of the specified skill. Click the buttons below to toggle the results for each different skill. You can select the city to get a list of the postings in that city. 
                </p>
              </div>
            </div>
            <div class="usa-banner-guidance-ssl usa-width-one-half">
              <img class="usa-banner-icon usa-media_block-img" src="/assets/img/icon-https.svg" alt="SSL">
              <div class="usa-media_block-body"> <strong>Connect with Paul</strong> 
                <br>on the web at <a href="https://twitter.com/paulsizemore">Twitter</a>, <a href="https://linkedin.com/in/paulsizemore">LinkedIn</a>, <a href="https://instagram.com/paulsizemore">Instagram</a>, or <a href="https://paulsizemore.tumblr.com">Tumblr</a>. Paul knows about #MarTech, #Louisville, #StartUp #Ecosystem, and #Axure. He's a Marketing Technologist & New Product Developer
            
            <p>
													Mapping framework:<BR>
														 <a href="http://kartograph.org" target="_blank"><img src="http://lovedjobs.com/assets/kartograph.png"  width="98" heigth="26"></a>
														<p>
														<span id=indeed_at><a href="http://www.indeed.com/">jobs</a> by <a
href="http://www.indeed.com/" title="Job Search"><img
src="http://www.indeed.com/p/jobsearch.gif"  alt="Indeed job search"></a></span></p>

  </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Gov banner END -->
      <div class="usa-nav-container">
        <div class="usa-navbar">
          <button class="usa-menu-btn">Menu</button>
          
<?php
$sqlTOP10Skills=" SELECT  distinct(searchstring) as QSreachString, count(companies.postingCount) as QCount
FROM companies where 1=1 AND city = '".$URLCity."'
Group by QSreachString Order by QCount DESC LIMIT 10";																				
$selectedClass= "MostLoved";  $htmlOut="<div style=\"float:left;\" >Top Skills: ";	 $resultsqlTOP10Skills= $conn->query($sqlTOP10Skills); if ($resultsqlTOP10Skills->num_rows > 0) {  	while($row = $resultsqlTOP10Skills->fetch_assoc()) 
{    $htmlOut=$htmlOut.'<span class="usa-label label-alpha" style="background-color:#fff1d2; background-color; cursor:pointer; "><a style=" text-decoration: none; color:gray; font-size:12px;" href="http://lovedjobs.com/'.strtolower($row[QSreachString]).'/">'.$row[QSreachString].'</a></span>'; }	} 
$htmlOut=$htmlOut."</div >";
?>         

          <div class="usa-logo" id="logo"> <em class="usa-logo-text"> <a href="http://lovedjobs.com" accesskey="1" title="Home" aria-label="Home">Loved Jobs  </a> </em> 
</div>
        </div>
        <nav role="navigation" class="usa-nav">
          <button class="usa-nav-close">
            <img src="http://lovedjobs.com/assets/img/close.svg" alt="close">
          </button>
          <ul class="usa-nav-primary usa-accordion">
            <li><a class="usa-nav-link" href="http://lovedjobs.com"><span>Home</span></a> </li>
            <li><a class="usa-nav-link" href="http://lovedjobs.com/wp/"><span>Blog</span></a> </li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="usa-overlay"></div>
    <main class="usa-grid usa-section usa-content usa-layout-docs" id="main-content">
      <aside class="usa-width-one-fourth usa-layout-docs-sidenav">
<ul class="usa-sidenav-list"><!-- <li><a href="javascript:void(0);">Page title</a></li>-->
        </ul>
      </aside>
      <div class="usa-width-three-fourths usa-layout-docs-main_content">
 <?php 
//  print "<div class=\"usa-grid\" style=\"margin-bottom:25px; \">   ";   print $htmlOut; print "</div>   "; 
 print "<div class=\"usa-grid\">   ";      
print$htmlSkillsOut; 
  print "</div>   "; 
     ?>
     
 
<div style="width:100vw; ">
<div class="mapBox" id="mapBox"><?php include 'mapBox.php' ?></div>
  <div class ='cityBox' id='cityBox'><?php include 'topCities.php' ?></div>
</div><!-- /usa-grid --> 
<div style="clear:both;"></div >

<div   style="  width: 100vw;">
<div style="float:left; margin-right:10px;"><?php include 'detailJobListing.php' ?> </div>
<div style="float:left;"><?php include 'topCompanies.php' ?></div> 
</div><div <div style="clear:both"></div>
 
 
    </main>
    <footer class="usa-footer usa-footer-medium" role="contentinfo">
      <div class="usa-grid usa-footer-return-to-top">
        <a href="#">Return to top</a>
      </div>
      <div class="usa-footer-primary-section">
        <div class="usa-grid-full">
          <nav class="usa-footer-nav">
            <ul class="usa-unstyled-list">
              <li class="usa-width-one-fourth usa-footer-primary-content">
                <a class="usa-footer-primary-link" href="http://lovedjobs.com/">Home</a>
              </li>
              <li class="usa-width-one-fourth usa-footer-primary-content">
                <a class="usa-footer-primary-link" href="http://lovedjobs.com/wp/">Blog</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="usa-footer-secondary_section">
        <div class="usa-grid">
          <div class="usa-footer-logo usa-width-one-half">
          <!--  <img class="usa-footer-logo-img" src="/assets/img/logo-img.png" alt="Logo image">-->
            <h3 class="usa-footer-logo-heading">Loved Jobs</h3>
          </div>
          <div class="usa-footer-contact-links usa-width-one-half">
            <a class="usa-link-twitter" href="https://twitter.com/paulsizemore">
              <span>Twitter</span>
            </a>
            <address>
              <h3 class="usa-footer-contact-heading"><a href="http://paulsizemore.com">Paul Sizemore</a></h3>
              <p><a href="http://octoprise.com">Octoprise.com</a></p>
              <a href="mailto:paul.sizemore@gmail.com">paul.sizemore@gmail.com</a>
            </address>
          </div>
        </div>
      </div>
    </footer>
<script src="http://lovedjobs.com/assets/js/uswds.js"></script>
<script src="http://lovedjobs.com/kartograph/jquery-1.10.2.min.js"></script>
<script src="http://lovedjobs.com/kartograph/raphael-2.1.0.min.js"></script>
<script src="http://lovedjobs.com/kartograph/kartograph.min.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-1575209-57', 'auto');
  ga('require', 'linkid');
  ga('send', 'pageview');
</script>
</body>
  </html>