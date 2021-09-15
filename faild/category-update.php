<?php 

	require 'dbconnect.php';
	if (isset($_POST['submit'])) 
	{

	$catid    =  $_POST['id'];
	$catname    =  $_POST['category-name'];
	$catdetails =  $_POST['category-details'];
	$catcreator =  $_POST['category-creator'];
	$catstatus  =  $_POST['category-status'];
	$dou        =  date("y-m-d H:i:s");

	$qry = "UPDATE category_tbl SET name='".$catname."',details='".$catdetails."',creator='".$catcreator."',status='".$catstatus."',dou='".$dou."' WHERE id='".$catid."' ";

	$rs = mysqli_query($conn,$qry);
	if ($rs) 
	{
		header("location:categories.php");
		exit();
	}
	else
	{
		header("location:category-edit.php");
		exit();
	}
	}
?>