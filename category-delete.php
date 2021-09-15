<?php 
	require 'dbconnect.php';

	$id = $_GET['id'];
	$dou =  date("y-m-d H:i:s");

	$qry = "UPDATE category_tbl SET isactive='Deleted', status='Pending', dou='".$dou."' WHERE id=$id";

	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		header("location:categories");
		exit();
	}
	else
	{
		header("location:categories");
		exit();
	}
?>