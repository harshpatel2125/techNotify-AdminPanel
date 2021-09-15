<?php 
	require 'dbconnect.php';

	$id = $_GET['id'];

	$qry = "SELECT * FROM posts_tbl WHERE id=$id";

	$rs=mysqli_query($conn,$qry);

	$row=mysqli_fetch_assoc($rs);

	$status = $row['status'];

	if ($status=='Pending') 
	{
		$qry1 = "UPDATE posts_tbl SET status='Published' WHERE id=$id";
		echo $qry1;
	}
	else
	{
		$qry1 = "UPDATE posts_tbl SET status='Pending' WHERE id=$id";
	}
	$rs1=mysqli_query($conn,$qry1);
	if ($rs1) 
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