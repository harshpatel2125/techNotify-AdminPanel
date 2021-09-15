<?php 
	require 'dbconnect.php';

	$id = $_GET['id'];
	$dou =  date("y-m-d H:i:s");

	$qry = "UPDATE comments_tbl SET status='Deleted' WHERE id=$id";

	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		header("location:feedback");
		exit();
	}
	else
	{
		header("location:feedback");
		exit();
	}
?>