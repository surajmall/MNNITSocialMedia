<?php

    $con = mysqli_connect("localhost","root","","social_network")or die("connection was not established");
    if(isset($_GET['u_id'])){
	
	    $user_id = $_GET['u_id'];
	   
		 $delete_user = "DELETE FROM users WHERE user_id='$user_id'";
		$run_delete = mysqli_query($con,$delete_user);
		
		if($run_delete)
		{
		    echo "<script>alert('your account has been deleted register again for using MNNIT Social Media')</script>";
		    echo "<script>window.open('index.php','_self')</script>";
		}
	}
?>