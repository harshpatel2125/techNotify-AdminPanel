<?php
	require 'dbconnect.php';
	session_start();
	if (!isset($_POST['login'])) 
	{
		header("location:index.php");
		exit();
	}

	$username = $_POST['username'];
	$mobile   = $_POST['username'];
	$password = $_POST['password'];

	$qry = "SELECT * FROM admin_tbl WHERE username='".$username."' AND password='".$password."' AND status='Active'";

	$rs=mysqli_query($conn,$qry);
	if (mysqli_num_rows($rs)>0) 
	{
		$row=mysqli_fetch_assoc($rs);
		$_SESSION['id']=$row['id'];
		$_SESSION['fn']=$row['fullname'];
		$_SESSION['un']=$row['username'];
		$_SESSION['post']=$row['post'];
		$_SESSION['dp']=$row['dp'];

		if (isset($_POST['remember-me'])) 
		{
			setcookie("user",$username,time() + (86400 * 30), "/");
			setcookie("pass",$password,time() + (86400 * 30), "/");
		}

		header("location:dashboard.php");
		exit();
	}
	else
	{
		header("location:index1.php");
		exit();
	}
?>