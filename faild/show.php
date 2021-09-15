<?php
	require 'dbconnect.php';

	$qry = "SELECT * FROM posts_tbl WHERE id='5'";
	$sql = mysqli_query($conn,$qry);
	while ($row = mysqli_fetch_array($sql))
	{
		echo '<img src="data:image/jpeg;base64, '.base64_encode($row['img1']).' " />';
	}
?>