<?php  
    include("includes/connection.php");  
   // session_start();	
    global $con;	
        if(isset($_POST['sign_up']))
		{
			echo '<script>console.log("inside23");</script>';
		    echo $name= mysqli_real_escape_string($con,$_POST['u_name']);
		    echo $email= mysqli_real_escape_string($con,$_POST['u_email']);
			echo '<script>console.log("'.$email.'");</script>';
		    $dob= mysqli_real_escape_string($con,$_POST['u_dob']);
		    $reg= mysqli_real_escape_string($con,$_POST['u_reg']);
		    $branch= mysqli_real_escape_string($con,$_POST['u_branch']);
		    $name= mysqli_real_escape_string($con,$_POST['u_name']);
		    $gender= mysqli_real_escape_string($con,$_POST['u_gender']);
		    $year= mysqli_real_escape_string($con,$_POST['u_year']);
		    $pass=mysqli_real_escape_string($con,$_POST['u_pass']);
		    $conpass=mysqli_real_escape_string($con,$_POST['u_conpass']);
		    $date= date("d-m-y");
		    $posts="No";
		    $conpass=mysqli_real_escape_string($con,$_POST['u_conpass']);
		    
			$get_email = "SELECT * FROM users WHERE user_email = '$email'";
			$run_email = mysqli_query($con,$get_email);
			$check = mysqli_num_rows($run_email);
			echo '<script>console.log("'.$check.'");</script>';
			if($check==1)
			{
			    echo "<script>alert('This email is already registered')</script>";
				exit();
			}
			if($pass!=$conpass)
			{
			    echo "<script>alert('Your passward is not matching with second one')</script>";
				exit();
				}
			
			echo '<script>console.log("'.$pass.'");</script>';
			echo '<script>console.log("'.$conpass.'");</script>';
		    if(strlen($pass)<8)
			{
			    echo "<script>alert('passward must contain 8 characters')</script>";
				exit();
			}
			else
			{
			    $insert = "INSERT INTO users(`user_name`, `user_email`, `user_pass`, `posts`, `user_dob`, `user_year`, `user_branch`, `user_reg`, `user_image`, `user_gender`, `register_date`, `last_login`) VALUES ('$name','$email','$pass','$posts','$dob','$year','$branch','$reg','default.jpg','$gender',NOW(),NOW())";
				echo '<script>console.log("'.$insert.'");</script>';
				echo '<script>console.log("'.mysqli_errno($con).'");</script>';
				$run_insert = mysqli_query($con,$insert);
				
				
				if($run_insert)
				{
				    $_SESSION['user_email']=$email;
				    //echo "<script>alert('Congratulation Registered Successfully')</script>";
					echo "<script>window.open('home.php','_self')</script>";
				}
			}
		}	
?>		