<?php 

	require 'dbconnect.php';
	if (isset($_POST['submit'])) 
	{

	$catname    =  $_POST['category-name'];
	$catdetails =  $_POST['category-details'];
	$catcreator =  $_POST['category-creator'];
	$catstatus  =  $_POST['category-status'];
	$isactive   = 'Active';
	$doi        =  date("y-m-d H:i:s");

	$qry = "INSERT INTO category_tbl(name,details,creator,status,isactive,doi) VALUES('".$catname."','".$catdetails."','".$catcreator."','".$catstatus."','".$isactive."','".$doi."')";

	$rs = mysqli_query($conn,$qry);
	if ($rs) 
	{
		header("location:categories.php");
		exit();
	}
	else
	{
		header("location:category-create.php");
		exit();
	}
}
?>