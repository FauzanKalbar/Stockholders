<!doctype html>
<html><head>
<meta charset="utf-8">
<!--Plugin CSS-->
<link rel="stylesheet" type="text/css" href="plugins/watermark/watermark.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery-ui.css">
<!--Custom CSS-->
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/main-style.css" />
<link rel="stylesheet" type="text/css" href="css/main-menu.css" />


<!--Plugin JS-->
<script language="javascript" src="plugins/jquery-1.11.1.js"></script>
<script language="javascript" src="plugins/jquery-ui/jquery-ui.js"></script>
<script language="javascript" src="plugins/watermark/jquery.watermark.js"></script>

<!--Custom JS-->
<script language="javascript" src="js/main-js.js"></script>
<script language="javascript" src="js/main-menu.js"></script>

<title>Northeastern College</title>
</head>

<body>
	<?php session_start(); ?>


	<div id="top-part-wrap">
        <div id="logo"></div>
        <div id="login">
        	<div id="login_wrap">
				  <?php
                      include 'includes/login.php';	
                  
                  
                  ?>
            </div>
        </div>
    </div>
    
    <div id="page-title-bar"></div>
    <div id="side-wrap">
    
	<div id="use-profile"><p><img src="images/logo.PNG" width="150" height="150" /></p></div>
    <?php
	if(isset($_SESSION["is_login"])){
		
		include 'includes/main-menu.php';	
	}
	
	?>
    
    </div>
    
	<?php
	if(isset($_GET["page"])){
			if(file_exists("includes/".$_GET["page"].".php")){
				if(isset($_SESSION["is_login"])){
				include 'includes/'.$_GET["page"].".php";
				}
			}else{
				echo "Page not found!";	
			}	
		}else{
			
	
	?>
    
	<section id="section-1">
    	<article class="article-1">
        	<header>Welcome!</header>
            	<p>Good Day!, <br /><br />
                
                	Welcome to the E-Polling System!, please do report to us at support@northeasterncollege.com for any bugs or glitches you may encounter while using this system. 
                	
                
                <br /><br />Thank you!<br /><br /><br /><i>System Administrator</i>
                </p>
            <footer></footer>
        </article>
    </section>

	<?php }?>
</body>
</html>