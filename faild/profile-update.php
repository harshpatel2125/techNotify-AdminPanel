<?php
	require 'dbconnect.php';
	
	$id       = $_POST['id'];
	$username = $_POST['username'];
	$dpname   = $_FILES['dp']['name'];
	$dp       = addslashes(file_get_contents($_FILES["dp"]["tmp_name"]));

	$qry = "UPDATE admin_tbl SET username='".$username."',dp='".$dp."',dpname='".$dpname."' WHERE id=$id";

	$rs=mysqli_query($conn,$qry);
	if ($rs) 
	{
		header("location:profile.php");
		exit();
	}
	else
	{
	}
?>