<?php
 
    $query = "SELECT * FROM posts";
	$result = mysqli_query($con,$query);
	//count total record
	$total_posts = mysqli_num_rows($result);
	//using ceil function to divide the total rcords on per page 
	$total_pages = ceil($total_posts/$per_page);
	//going to the first page 
	echo "
	    <center>
		<div id='pagination'>
		<a href='home.php?page=1'>First Page</a>
	";
	for($i=1;$i<=$total_pages;$i++)
	{
	    echo "<a href='home.php?page=$i'> $i </a>";
	}
	//goint to the last page 
	echo "<a href='home.php?page=$total_pages'>Last Page</a></center></div>";
   
?>