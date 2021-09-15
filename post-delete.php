<?php 
	require 'dbconnect.php';

	$id = $_GET['id'];
	$dou =  date("y-m-d H:i:s");

	$qry = "UPDATE posts_tbl SET isactive='Deleted',status='Pending', dou='".$dou."' WHERE id=$id";

	$qry1 = "UPDATE likes_tbl SET status='Deleted', dou='".$dou."' WHERE id=$id";

	$rs  = mysqli_query($conn,$qry);
	$rs1 = mysqli_query($conn,$qry1);
	if($rs)
	{
		header("location:posts");
		exit();
	}
	else
	{
		header("location:posts");
		exit();
	}
?>