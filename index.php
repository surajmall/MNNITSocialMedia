<?php
  
    session_start();
    include("functions/functions.php");
	include("login.php");

	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MNNIT Social Network</title>
	<link rel="shortcut icon" href="images/mnnit-logo.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="styles/style.css" rel="stylesheet"/>
  </head>
  <body>
  <!--contain start-->
    <div class="contain">
	     <!--head_wrap start-->
	    <div id="head_wrap">	 
		     <!--header start-->
		    <div id="header">
			    <img src="images/logo.png" style="float:left; height:98px;"/>
				<form method="post" action="" id="form1">
				<div class="row">
				    <input type="text" name="email" placeholder="Your E-mail" style="width:200px;"/>
				    <input type="password" name="pass" placeholder="Password" style="width:200px;"/>
				    <button type="submit" class="btn btn-primary" name="login">Login</button>
				</div>
				</form>
			</div>
			 <!--header ends-->
		</div>
		<!--head_wrap ends-->
		<div id="content">
		    <div>
			    <img src="images/index.jpg" style="width:700px; height:600px; float:left;margin-right:40px;"/>
			</div>
			<div>
			    <center><h2 style="padding-top:20px;"><b>Join us now</b><h2></center>
			    <form method="post" action="index.php" id="form2">
					   <center><input type="text" style="width:400px;" name="u_name" placeholder="Your Name" required="required"/></center><br>
						<center><input type="number" style="width:400px;" name="u_reg" placeholder="College Registration No" required="required"/></center><br>
					    <center><input type="email" style="width:400px;" name="u_email" placeholder="Your Valid E-mail" required="required"/></center><br>
					    <center><input type="date" style="width:400px;" name="u_dob" placeholder="Date of Birthday" required="required"/></center><br>
					    <center><input type="number" style="width:400px;" name="u_year" placeholder="Which year you are in" required="required"/><br><br>
						<select name="u_gender" style="width:400px;" class="form-control" required="required">
						    <option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						</center><br>
						<center><b>Branch :</b></center><br>
						<center><select name="u_branch" class="form-control" style="width:400px;">
						<option value="Computer Science and Engineering">Computer Science and Engineering</option>
						<option value="Information Tecnology">Information Tecnology</option>
						<option value="Electronics and Communication">Electronics and Communication</option>
						<option value="Mechnical Engineering">Mechnical Engineering</option>
						<option value="Electrical Engineering">Electrical Engineering</option>
						<option value="Civil Engineering">Civil Engineering</option>
						<option value="Chemical Engineering">Chemical Engineering</option>
						<option value="Industrial Production">Industrial Production</option>
						<option value="Bio Technology">Bio Technology</option>
						</select></center><br>
						<center><input type="password" style="width:400px;" name="u_pass" placeholder="Enter Password" required="required"/></center><br>
					    <center><input type="password" style="width:400px;" name="u_conpass" placeholder="Re-Enter Password" required="required"/></center><br>
						<center><button type="submit" class="btn-lg btn-success" name="sign_up">Confirm and Join</button></center>
                    </div>	
			    </form>
				<?php include("user_insert.php") ?>
			</div>
		</div>
	</div>
     <!--contain ends-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>