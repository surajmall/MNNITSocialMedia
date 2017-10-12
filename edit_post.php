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
			<div id="content_timeline">
			<?php
			    if(isset($_GET['post_id'])){
				    $post_id = $_GET['post_id'];
				    
					$get_post = "SELECT * FROM posts WHERE post_id='$post_id'";
					$run_post = mysqli_query($con,$get_post);
					$row = mysqli_fetch_array($run_post);
					
					$post_title = $row['post_title'];
					$post_con = $row['post_content'];
				}
			
			?>
			    <form action="" method="post" id="f">
				<center style="padding:10px;"><h2><strong>Edit your post :</strong></h2></center>
				<input type="text" class="form-control" name="title" value="<?php echo $post_title;?>" style="width:350px; padding:10px; margin-left:15px; font-weight:bolder;"/></br>
				<textarea class="form-control" cols="70" rows="4" name="content" style="width:550px; padding:10px; margin-left:15px; font-weight:bolder;"><?php echo $post_con;?></textarea></br>
				<select name="topic" class="form-control"style="width:180px; margin-left:15px; margin-bottom:10px; font-weight:bolder;">
				    <option>Select Query Type</option>
				    <option name="1">maintanance</option>
				    <option name="2">Education</option>
				    <option name="3">news</option>
				    <option name="4">Confession</option>
				    <option name="5">Other</option>
				</select>
				<button type="submit" class="btn btn-primary" name="update" style="float:right; margin-right:25px; margin-bottom:15px;">Update post</button>
				</form>
				<?php
				    
					if(isset($_POST['update'])){
					    $post_title = $_POST['title'];
					    $post_content = $_POST['content'];
					    
						$post_update = "UPDATE posts SET post_title = '$post_title',post_content='$post_content' WHERE post_id = '$post_id' ";
						$run_update = mysqli_query($con,$post_update);
						if($run_update)
						{
						    echo "<script>alert('post has been updated successfully');</script>";
						    echo "<script>window.open('home.php','_self');</script>";
						}
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