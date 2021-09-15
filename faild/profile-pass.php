<?php
	require 'dbconnect.php';

	$id       = $_POST['id'];
	$password = $_POST['current-password'];
	$newpass  = $_POST['new-password'];
	$conpass  = $_POST['confirm-password'];

	if ($newpass==$conpass) 
	{
		$qry = "SELECT * FROM admin_tbl WHERE password='".$password."' AND id='".$id."' AND status='Active' ";
		$rs=mysqli_query($conn,$qry);
		if (mysqli_num_rows($rs)>0) 
		{
			$row=mysqli_fetch_assoc($rs);

			if ($password==$row['password']) 
			{
				$qry1 = "UPDATE admin_tbl SET password='".$conpass."' WHERE id=$id";
				echo $qry1;
				$rs1=mysqli_query($conn,$qry1);
				if ($rs1) 
				{
					header("location:profile.php");
					exit();
				}
			}
			else
			{
				
			}
		}
	}
?>