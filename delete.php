<?php

    $con = mysqli_connect("localhost","root","","social_network")or die("connection was not established");
    if(isset($_GET['post_id'])){
	
	    $post_id = $_GET['post_id'];
		$delete_post = "DELETE FROM posts WHERE post_id='$post_id'";
		$run_delete = mysqli_query($con,$delete_post);
		
		if($run_delete)
		{
		    echo "<script>alert('your post has been deleted')</script>";
		    echo "<script>window.open('home.php','_self')</script>";
		}
	}
?>