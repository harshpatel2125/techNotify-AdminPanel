<?php 
	require 'dbconnect.php';
	if (isset($_POST['submit'])) 
	{

		$posttitle    =  $_POST['post-title'];
		$postcontent1 =  $_POST['post-content-1'];
		$postcontent2 =  $_POST['post-content-2'];
		$postcontent3 =  $_POST['post-content-3'];
		$postauthor   =  $_POST['post-author'];
		$postcat      =  $_POST['post-category'];
		$poststatus   =  $_POST['post-status'];
		$isactive     = "Active";
		$doi          =  date("y-m-d H:i:s");
		$img1name     = $_FILES['img1']['name'];
		$img2name     = $_FILES['img2']['name'];
		$img1         = addslashes(file_get_contents($_FILES["img1"]["tmp_name"]));
		$img2         = addslashes(file_get_contents($_FILES["img2"]["tmp_name"]));

		$qry = "INSERT INTO posts_tbl (title,content1,content2,content3,img1,img1name,img2,img2name,category,author,status,isactive,doi) VALUES('".$posttitle."','".$postcontent1."','".$postcontent2."','".$postcontent3."','".$img1."','".$img1name."','".$img2."','".$img2name."','".$postcat."','".$postauthor."','".$poststatus."','".$isactive."','".$doi."')";

		$rs = mysqli_query($conn,$qry);
		if ($rs) 
		{
			header("location:posts.php");
			exit();
		}
		else
		{
			header("location:post-create.php");
			exit();
		}
	}
?>