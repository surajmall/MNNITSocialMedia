<?php

    $con = mysqli_connect("localhost","root","","social_network")or die("connection was not established");
	if(isset($_GET['m_id'])){
	    $ms_id = $_GET['m_id'];
        $update = "UPDATE messages SET status = 'read' WHERE msg_id='$ms_id'";
        $update_run = mysqli_query($con,$update);
        if($update_run)
        {
		    echo "<script>alert('you read the message')</script>";
		    echo "<script>window.open('home.php','_self')</script>";
		}		
	}
?>