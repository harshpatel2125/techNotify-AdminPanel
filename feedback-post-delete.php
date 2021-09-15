<?php 
	require 'dbconnect.php';

	$id = $_GET['id'];
	$dou =  date("y-m-d H:i:s");

	$qry = "UPDATE userposts_tbl SET status='Deleted', dou='".$dou."' WHERE id=$id";

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