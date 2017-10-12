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
		 <div class="content">
		     <!--user_timeline starts-->
		    <div id="user_timeline">
			    <div id="user_detail">
				    <?php
					    $user = $_SESSION['user_email'];
					    $get_user = "SELECT * FROM users WHERE user_email='$user'";
						$run_user = mysqli_query($con,$get_user);
						$row = mysqli_fetch_array($run_user);
						$user_id = $row['user_id'];
						$user_name = $row['user_name'];
						$user_dob = $row['user_dob'];
						$user_year = $row['user_year'];
						$user_reg = $row['user_reg'];
						$user_image = $row['user_image'];
						$user_gender = $row['user_gender'];
						$user_branch = $row['user_branch'];
						$register_date = $row['register_date'];
						$last_login = $row['last_login'];
						$user_post = "SELECT * FROM posts WHERE user_id='$user_id'";
						$run = mysqli_query($con,$user_post);
						$count = mysqli_num_rows($run);
						echo "
						    <center><h2 style='padding-top:10px;'><strong>Your Profile</strong></h2></center>
						    <p><center><img src='user/user_images/$user_image' width='200px' height='200px'></center></p>  
						    <center><p><strong>Name-</strong> $user_name</p></center>
						    <center><p><strong>Registration No-</strong> $user_reg</p></center>
						    <center><p><strong>College Year-</strong> $user_year</p></center>
							<center><p><strong>Branch-</strong> $user_branch</p></center>
							<center><p><strong>Gender-</strong> $user_gender</p></center>
						    <center><p><strong>Birthday-</strong> $user_dob</p></center>
						    <center><p><strong>Register Date-</strong> $register_date</p></center>
						    <center><p><strong>Last Login-</strong> $last_login</p></center>
							<center><h2><strong>Your Account</h2></strong></center></b><br>
							<center><p><a href='my_messages.php?u_id=$user_id'>Messages</a></p></center>
							<center><p><a href='my_posts.php?u_id=$user_id'>My Posts($count)</a></p></center>
							<center><p><a href='edit_profile.php?u_id=$user_id'>Edit My Account</a></p></center>
							<center><p><a href='logout.php'>Log out</a></p>
						";
					?>
				</div>
			</div>
			 <!--user_timeline ends-->
			  <!--content_timeline starts-->
			<?php 
			   if(isset($_GET['u_id']))
			   {
			        global $con;
		            $us_id = $_GET['u_id'];
			        $get_user = "SELECT * FROM users WHERE user_id='$us_id'";
			        $run_user = mysqli_query($con,$get_user);
			        $row = mysqli_fetch_array($run_user);
			        $us_name = $row['user_name'];
			        $us_image = $row['user_image'];
			   }
			   
			?>
			<div id="content_timeline">
			</br><center><strong><h3><strong>See your Received messages</strong></h3></center></br>
				<?php
				
				    $sel_msg = "SELECT * FROM messages WHERE receiver = '$us_id' AND status='unread'";
					$run_msg = mysqli_query($con,$sel_msg);
					$msg_count = mysqli_num_rows($run_msg);
					if($msg_count)
					{
				    while($msg_row = mysqli_fetch_array($run_msg)){    
					$msg_id = $msg_row['msg_id'];
					$sender = $msg_row['sender'];
					$msg_content = $msg_row['msg_content'];
					$msg_date = $msg_row['msg_date'];
				    $get_sender = "SELECT * FROM users WHERE user_id = '$sender'";
				    $run_sender = mysqli_query($con,$get_sender);
				    $row_sender = mysqli_fetch_array($run_sender);
				    $u_name = $row_sender['user_name'];
				    $u_image = $row_sender['user_image'];
				   echo "
			       <div id='posts'>
				   <br><p><img src='user/user_images/$u_image' width='50' height='50'/></p>
				   <h4 style='margin-top:10px;'><a href='user_profile.php?user_id=$user_id'>$u_name</a></h4><br>
				   <div class=''container>
				   <h5 style='font-size:120%; font-family:verdana;'>$msg_content</h5><br>
				   <a href='read.php?m_id=$msg_id' style='float:right; margin-right:20px;'><button class='btn-xs btn-primary'>Read and Delete</button></a>
				   <a href='user_profile.php?user_id=$user_id' style='float:right; margin-right:20px;'><button class='btn-xs btn-primary'>See profile and Reply</button></a>
				   </div></br>
				   <p style='color:gray; font-weight:bolder;'>$msg_date</p>
				   
				   </div></br>";}
				   }
				   else
				   {
				        echo "<center><img src='images/oops.jpeg' style='width:300px; height:300px;'></center><br>
		                <center><h2 style='color:brown;'><strong>No Received messages yet</strong></h2></center><br><br>
		                "; 
				   }
		    ?>
			</div>
             <!--content_timeline ends-->
			</div>
			<!--content ends-->
	 </div>
    <!--contain ends-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php } ?>