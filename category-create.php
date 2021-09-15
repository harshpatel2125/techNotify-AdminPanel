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

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Create Category | Tech Notify</title>
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

	<style type="text/css">
		input[type="file"]
		{
			display: none;
		}
	</style>

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
  					<li class="nav-item">
  						<a href="posts" class="nav-link px-3">Posts</a>
  					</li>
  					<li class="nav-item active">
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
					<h3 class="page-title"><i class="fas fa-layer-group"></i> Create Category</h3>
					<section class="main-section">
						<form method="post">
							<div class="form-group">
								<label class="form-label">Category Name</label>
								<input type="text" name="category-name" placeholder="Enter the Name of Category" class="form-control theme-txtbox" required>
							</div>
							<div class="form-group">
								<label class="form-label">Category Details</label>
								<textarea name="category-details" placeholder="Enter the Details of Category" class="form-control theme-txtbox mb-3" required></textarea>
							</div>
							<div class="row">
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label class="form-label">Category Creator</label>
										<input type="text" name="category-creator" placeholder="Enter the Name of Creator" class="form-control theme-txtbox" required>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label class="form-label">Category status</label>
										<select name="category-status" class="form-control theme-select">
											<option value="Published">Published</option>
											<option value="Pending">Pending</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group mb-0 mt-2 text-center">
								<button type="submit" name="submit" class="btn theme-btn mr-2">Create</button>
								<button onclick="location.href='categories'" class="btn theme-btn-red ml-2">Cancel</button>
							</div>
							<?php 

								require 'dbconnect.php';
								if (isset($_POST['submit'])) 
								{

									$catname    =  $_POST['category-name'];
									$catdetails =  $_POST['category-details'];
									$catcreator =  $_POST['category-creator'];
									$catstatus  =  $_POST['category-status'];
									$isactive   = 'Active';
									$doi        =  date("y-m-d H:i:s");

									$qry = "INSERT INTO category_tbl(name,details,creator,status,isactive,doi) VALUES('".$catname."','".$catdetails."','".$catcreator."','".$catstatus."','".$isactive."','".$doi."')";

									$rs = mysqli_query($conn,$qry);
									if ($rs) 
									{
										echo '<script>window.location.href = "categories"</script>';
									}
									else
									{
										header("location:category-create");
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