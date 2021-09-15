<?php
	require 'dbconnect.php';

	$id    =  $_POST['id'];	
	$title =  $_POST['note-title'];
	$note  =  $_POST['note-description'];
	$dou   =  date("y-m-d H:i:s");

	$qry = "UPDATE todolist_tbl SET title='".$title."',note='".$note."',dou='".$dou."' WHERE id=$id";
	$rs = mysqli_query($conn,$qry);
	if ($rs) 
	{
		header("location:dashboard.php");
		exit();
	}
?>