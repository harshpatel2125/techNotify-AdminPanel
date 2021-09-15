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

	$id = $_GET['id'];

	$qry = "SELECT * FROM posts_tbl WHERE id=$id";
	$rs = mysqli_query($conn,$qry);
	$row=mysqli_fetch_assoc($rs);
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
					<h3 class="page-title"><i class="far fa-newspaper"></i> Edit Posts</h3>
					<section class="main-section">
						<form method="post" action="post-update" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label class="form-label">Post Title</label>
								<input type="text" name="post-title" value="<?php echo $row['title'] ?>" placeholder="Enter the Title of Post" class="form-control theme-txtbox" required>
							</div>
							<div class="form-group">
								<label class="form-label">Post Content</label>
								<textarea name="post-content-1" placeholder="Enter the Content of Post" class="form-control theme-txtbox mb-3" required><?php echo $row['content1'] ?></textarea>
								<textarea name="post-content-2" placeholder="Enter the Content of Post" class="form-control theme-txtbox mb-3"><?php echo $row['content2'] ?></textarea>
								<textarea name="post-content-3" placeholder="Enter the Content of Post" class="form-control theme-txtbox mb-3"><?php echo $row['content3'] ?></textarea>
							</div>
							<div class="row">
								<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<div class="form-group">
										<label class="form-label">Post Author</label>
										<input type="text" name="post-author" value="<?php echo $row['author'] ?>" placeholder="Enter the Name of Author" class="form-control theme-txtbox" required>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<div class="form-group">
										<label class="form-label">Post Category</label>
										<select name="post-category" class="form-control theme-select">
											<option value="News">News</option>
											<option value="Trending">Trending</option>
											<option value="Latest">Latest</option>
											<option value="Tips-Trick">Tips & Trick</option>
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
								<button type="submit" name="submit" class="btn theme-btn mr-2">Save</button>
								<button type="reset" onclick="location.href='posts'" class="btn theme-btn-red ml-2">Cancel</button>
							</div>
							<?php 

								require 'dbconnect';

								if (isset($_POST['submit'])) 
								{

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
										echo '<script>window.location.href = "post-edit"</script>';
									}
									else
									{
										header("location:post-edit");
										exit();
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