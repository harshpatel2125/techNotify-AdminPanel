<?php 

	require 'dbconnect.php';

		$id           =  $_POST['id'];
		$posttitle    =  $_POST['post-title'];
		$postcontent1 =  $_POST['post-content-1'];
		$postcontent2 =  $_POST['post-content-2'];
		$postcontent3 =  $_POST['post-content-3'];
		$postauthor   =  $_POST['post-author'];
		$postcat      =  $_POST['post-category'];
		$poststatus   =  $_POST['post-status'];
		$dou          =  date("y-m-d H:i:s");

		$qry = "UPDATE posts_tbl SET title='".$posttitle."', content1='".$postcontent1."', content2='".$postcontent2."', content3='".$postcontent3."', author='".$postauthor."', category='".$postcat."', status='".$poststatus."', dou='".$dou."' WHERE id='".$id."' ";

		$rs = mysqli_query($conn,$qry);
		if ($rs) 
		{
			header("location:posts.php");
			exit();
		}
		else
		{
			header("location:post-edit.php");
			exit();
		}
?>