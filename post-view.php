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

	$postid = $_GET['id'];

	$qry = "SELECT * FROM posts_tbl WHERE id='".$postid."' ";
	$rs = mysqli_query($conn,$qry);

?><!DOCTYPE html>
<html lang="en">
<head>

	<title>Posts | Tech Notify</title>
	<link rel="icon" type="image/png" href="media/bell.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CUSTOM CSS -->
	<link rel="stylesheet" type="text/css" href="css/style2.css">
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

	<!-- CUSTOM JQUERY -->
	<script type="text/javascript" src="js/custom.js"></script>

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
	<main style="padding-top: 72px">
		<div class="container">
			<section class="main-section">
				<?php
									if (mysqli_num_rows($rs)>0) 
									{
										while ($row=mysqli_fetch_assoc($rs)) 
										{
											if ($row) 
											{
								?>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<?php $postid=$row['id'] ?>
						<div class="view-post-section" style="text-align: justify;">
							<h3 class="view-post-title"><?php echo $row['title']; ?></h3>
							<p style="margin-bottom: 30px;"><?php echo $row['content1']; ?></p>
								<?php echo "<img src='postimages/".$row['img1']."' class='img-fluid d-block mx-auto w-50' width='150' >" ?>
							<p style="margin-top: 30px; margin-bottom: 30px;"><?php echo $row['content2']; ?></p>
								<?php echo "<img src='postimages/".$row['img2']."' class='img-fluid d-block mx-auto w-50' width='150' >" ?>
							<p style="margin-top: 30px; margin-bottom: 30px;"><?php echo $row['content3']; ?></p>
							<div class="row mx-0" style="margin-bottom: 12px;">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
									<p class="card-text">
										<a href="https://twitter.com/AuthorUsername" class="author-link"><?php echo $row['author'] ?></a>
										<span class="post-time"><?php $date=$row['doi']; echo date("F d, Y", strtotime($date)); ?></span>
									</p>
								</div>
							</div>
							<a href="posts" class="btn theme-btn-inverse col-12" style="text-align: center;">Go Back</a>
						</div>
					</div>
				</div>
				<?php  
							}
						}
					}
				?>
				<!-- latest end -->
			</section>
		</div>
	</main>
	<!-- main end -->
</body>
</html>