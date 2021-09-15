<?php 
	require 'dbconnect.php';

	$id = $_GET['id'];

	$qry = "SELECT * FROM users_tbl WHERE id=$id";

	$rs=mysqli_query($conn,$qry);

	$row=mysqli_fetch_assoc($rs);

	$status = $row['status'];

	if ($status=='Deactive') 
	{
		$qry1 = "UPDATE users_tbl SET status='Active' WHERE id=$id";
		echo $qry1;
	}
	else
	{
		$qry1 = "UPDATE users_tbl SET status='Deactive' WHERE id=$id";
	}
	$rs1=mysqli_query($conn,$qry1);
	if ($rs1) 
	{
		header("location:users");
		exit();
	}
	else
	{
		header("location:users");
		exit();
	}
?>