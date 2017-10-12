<?php
    include("includes/connection.php");
	include("functions/functions.php");
    session_start();
	
	if(!isset($_SESSION['user_email'])){
	    header("location: index.php");
	}
	else
	{
?>
<html lang="en">
  <head>
    <title>Home</title>
	<link rel="shortcut icon" href="images/mnnit-logo.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="styles/home_style.css" rel="stylesheet"/>
    </head>
    <body>
	<!--contain starts-->
     <div class="contain">
	    <!--head_wrap starts-->
	    <div id="head_wrap">
		    <!--header starts-->
	        <div id="header">
			<img src="images/logo.png" style="float:left; height:88px;" />
			    <ul id="menu">
				    <li><a href="home.php">Home</a></li>
				    <li><a href="members.php">Members</a></li>
					<li><a href="about.php">About us</a></li>
					<strong name="post_sub">Topics</strong>
					<li><a href="maintain.php">maintan</a></li>
					<li><a href="education.php">Education</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="confession.php">Confess</a></li>
					<li><a href="other.php">Other</a></li>
				</ul>
			</div>
			<!--header ends-->
			<form method="get" action="results.php" id="form1">
				<div class="row">
				    <input type="text" name="user_query" placeholder="Search" style="width:200px;"/>
				    <button type="submit" class="btn-xs btn-primary" name="search">Search</button>
				</div>
				</form>
	        </div>
		</div>
		 <!--head_wrap ends-->
		 <!--user_timeline starts-->
		 <div class="container" style="padding:20px;">
		    <div class="jumbotron text-center" style="padding:20px;">
			<h2 style="padding:5px;"><strong>About MNNIT Social Media</strong><h2>
			<div id="#mycarousel" class="carousel slide" data-ride="carousel" data-interval="1000">
			<ol class="carousel-indicators">
			<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
			<li data-target="#mycarousel" data-slide-to="1" ></li>
			<li data-target="#mycarousel" data-slide-to="2" ></li>
			</ol>
			<div class="carousel-inner">
			<div class="item active">
			    <img src="social_images/1.jpg" style="height:200px; width:1100px;">
				<div class="carousel-caption">
				<h2>An Educational platfrom for deliver and receive knowledge</h2>
				</div>
			</div>
			<div class="item">
			    <img src="social_images/1.jpg" style="height:200px; width:1100px;">
			</div>
			<div class="item">
			    <img src="social_images/1.jpg" style="height:200px; width:1100px;">
			</div>
			</div>
			
			<a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			
			<a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
			</div><br>
			<p><strong>MNNIT Social Media is a platform where you can intract to seniors , ask your query about programming,
			placement,mentainance,formal questions and casual question throghout the MNNIT campus.
			As we know our college have many sociaty and Club (eg. CC Club) ,these club use facebook,whatsapp for 
			communication as ordinary people do.
			But we are engineers So we should try own for these tasks and try to develop it more and more.
			Almost All IITs used it's own site for communication, for sharing knowledge then why can't we use ...</strong></p>
			</div>
		    <div class="jumbotron" style="padding:20px;">
			<h2 style="padding:5px; margin-left:200px;"><strong>About Founder and Developer</strong><h2>
			<img src="social_images/suraj2.jpg" style="height:250px; width:250px; float:right;">
			<center style="padding:10px;"><h3><strong style="color:brown;">Suraj Kumar Mall</strong></h3></center>
		    <center style="padding:10px;"><h4><strong style="color:brown;">Basic Information</strong></h4></center>
			<p><strong>I am pursuing B.Tech in Computer Science and Technology in MNNIT Allahabad.
			A passionate programmer with particular interest in competitive programming and web designing.</strong></p>
			<center style="padding:10px;"><h4><strong style="color:brown;">Contacts</strong></h4></center>
			<p><strong>E-mail - </strong>surajmall874@gmail.com</p>
			<p><strong>Mobile - </strong>9161575960</p>
			<p><strong>Facebook - </strong>https://www.facebook.com/surajkumar.mall</p>
			<button class="btn-xs btn-primary">See my profile</button>
			<button class="btn-xs btn-primary" style="margin-left:10px;">Send me a message</button>
			</div>
		</div>	
			<!--content ends-->
    <!--contain ends-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="boot_js/bootstrap.min.js"></script>
  </body>
</html>
<?php } ?>