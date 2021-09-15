<?php 

	require 'dbconnect.php';
	if (!isset($_POST['submit'])) 
	{
		header("location:dashboard.php");
		exit();
	}

	$title =  $_POST['note-title'];
	$note  =  $_POST['note-description'];
	$doi   =  date("y-m-d H:i:s");

	$qry = "INSERT INTO todolist_tbl (title,note,doi) VALUES('".$title."','".$note."','".$doi."')";

	$rs = mysqli_query($conn,$qry);
	if ($rs) 
	{
		header("location:dashboard.php");
		exit();
	}
	else
	{
		header("location:dashboard.php");
		exit();
	}
?>