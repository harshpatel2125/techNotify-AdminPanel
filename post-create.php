<?php
	session_start();

	if ($_SESSION['id']) 
	{
		$id=$_SESSION['id'];
		
		$user=$_SESSION['fn'];

		$un=$_SESSION['un'];
	}
	else
	{	
		header("location:index");
		exit();
	}

	require 'dbconnect.php';

	$qry = "SELECT * FROM category_tbl WHERE status='Published'";
	$rs = mysqli_query($conn,$qry)
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Create Post | Tech Notify</title>
	<link rel="icon" type="image/png" href="media/bell.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CUSTOM CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- MODIFIED BOOTSTRAP CSS -->
	<link rel="stylesheet" type="text/css" href="css/modified-bootstrap.css">

	<!-- BOOTSTRAP CSS 4.3.1 -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- FONT AWESOME CSS 5.7.2 -->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">

	<!-- JQUERY SLIM JS 3.3.1 -->
	<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>

	<!-- POPPER JS 1.14.7 -->
	<script type="text/javascript" src="js/popper-1.14.7.min.js"></script>

	<!-- BOOTSTRAP JS 4.3.1 -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
	<!-- header start -->
	<header>
		<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-black">
			<img src="media/logo.png" class="img-fluid" width="193">
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#drop" aria-controls="drop" aria-expanded="false">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="drop">
  				<ul class="navbar-nav ml-auto">
  					<li class="nav-item">
  						<a href="dashboard" class="nav-link px-3">Dashboard</a>
  					</li>
  					<li class="nav-item active">
  						<a href="posts" class="nav-link px-3">Posts</a>
  					</li>
  					<li class="nav-item">
  						<a href="categories" class="nav-link px-3">Categories</a>
  					</li>
  					<li class="nav-item">
  						<a href="users" class="nav-link px-3">Users</a>
  					</li>
  					<li class="nav-item">
  						<a href="feedback" class="nav-link px-3">Feedback</a>
  					</li>
  					<li class="nav-item">
  						<a href="profile" class="nav-link px-3">Profile</a>
  					</li>
  					<li class="nav-item">
  						<a href="logout" class="nav-link pr-0 pl-3">Logout</a>
  					</li>
  				</ul>
  			</div>
		</nav>
	</header>
	<!-- header end -->
	<!-- main start -->
	<main style="padding: 72px 20px 20px 20px;">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<h3 class="page-title"><i class="far fa-newspaper"></i> Create Posts</h3>
					<section class="main-section">
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="form-label">Post Title</label>
								<input type="text" name="post-title" placeholder="Enter the Title of Post" class="form-control theme-txtbox" required>
							</div>
							<div class="form-group">
								<label class="form-label">Post Content</label>
								<textarea name="post-content-1" placeholder="Enter the Content of Post" class="form-control theme-txtbox mb-3" required></textarea>
								<textarea name="post-content-2" placeholder="Enter the Content of Post" class="form-control theme-txtbox mb-3"></textarea>
								<textarea name="post-content-3" placeholder="Enter the Content of Post" class="form-control theme-txtbox mb-3"></textarea>
							</div>
							<div class="form-group">
								<label class="form-label">Post Images</label>
								<div class="row">
									<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3 mb-md-0 mb-lg-0 mb-xl-0">
										<input type="file" name="img1" id="real-file1" hidden="hidden">
										<button type="button" class="btn input-file-btn" id="custom-button1">Select Image 1</button>
										<span class="input-file-preview" id="custom-text1">No image chosen</span>
										<script type="text/javascript">
											const realFileBtn1 = document.getElementById("real-file1");
											const customBtn1 = document.getElementById("custom-button1");
											const customTxt1 = document.getElementById("custom-text1");

											customBtn1.addEventListener("click", function()
											{
												realFileBtn1.click();
											});

											realFileBtn1.addEventListener("change", function()
											{
												if (realFileBtn1.value)
												{
    												customTxt1.innerHTML = realFileBtn1.value.match
    												(
      													/[\/\\]([\w\d\s\.\-\(\)]+)$/
    												)[1];
  												}
  												else
  												{
    												customTxt1.innerHTML = "No image chosen";
												}
											});
										</script>
									</div>
									<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3 mb-md-0 mb-lg-0 mb-xl-0">
										<input type="file" name="img2" id="real-file2" hidden="hidden">
										<button type="button" class="btn input-file-btn" id="custom-button2">Select Image 2</button>
										<span class="input-file-preview" id="custom-text2">No image chosen</span>
										<script type="text/javascript">
											const realFileBtn2 = document.getElementById("real-file2");
											const customBtn2 = document.getElementById("custom-button2");
											const customTxt2 = document.getElementById("custom-text2");

											customBtn2.addEventListener("click", function()
											{
												realFileBtn2.click();
											});

											realFileBtn2.addEventListener("change", function()
											{
												if (realFileBtn2.value)
												{
    												customTxt2.innerHTML = realFileBtn2.value.match
    												(
      													/[\/\\]([\w\d\s\.\-\(\)]+)$/
    												)[1];
  												}
  												else
  												{
    												customTxt2.innerHTML = "No image chosen";
												}
											});
										</script>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<div class="form-group">
										<label class="form-label">Post Author</label>
										<input type="text" name="post-author" placeholder="Enter the Name of Author" class="form-control theme-txtbox" required>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<div class="form-group">
										<label class="form-label">Post Category</label>
										<select name="post-category" class="form-control theme-select">
											<?php
												if (mysqli_num_rows($rs)>0) 
												{
													while ($row=mysqli_fetch_assoc($rs)) 
													{
														if ($row) 
														{
											?>
											<option value="<?php echo $row['name']; ?>" ><?php echo $row['name']; ?></option>									<?php
														}
													}
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<div class="form-group">
										<label class="form-label">Post status</label>
										<select name="post-status" class="form-control theme-select">
											<option value="Published">Published</option>
											<option value="Pending">Pending</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group mb-0 mt-2 text-center">
								<button type="submit" name="submit" class="btn theme-btn mr-2">Publish</button>
								<button type="reset" onclick="location.href='posts'" class="btn theme-btn-red ml-2">Cancel</button>
							</div>
							<?php 
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
									$img1     	  = $_FILES['img1']['name'];
									$img2     	  = $_FILES['img2']['name'];
									$target1 = "C:/xampp\htdocs/technotify/UserPanel/img/".basename($_FILES['img1']['name']);
									$target2 = "C:/xampp\htdocs/technotify/UserPanel/img/".basename($_FILES['img2']['name']);

									$qry = "INSERT INTO posts_tbl (title,content1,content2,content3,img1,img2,category,author,status,isactive,doi) VALUES('".$posttitle."','".$postcontent1."','".$postcontent2."','".$postcontent3."','".$img1."','".$img2."','".$postcat."','".$postauthor."','".$poststatus."','".$isactive."','".$doi."')";

									move_uploaded_file($_FILES['img1']['tmp_name'], $target1);
									move_uploaded_file($_FILES['img2']['tmp_name'], $target2);

									$rs = mysqli_query($conn,$qry);
									if ($rs) 
									{
										echo '<script>window.location.href = "posts"</script>';
									}
									else
									{
										echo '<script>window.location.href = "post-create"</script>';
									}
								}
							?>
						</form>
					</section>
				</div>
			</div>
		</div>
	</main>
	<!-- main end -->
</body>
</html>