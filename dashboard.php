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

	$qry1 = "SELECT * FROM posts_tbl ";
	$rs1 = mysqli_query($conn,$qry1);

	$qry2 = "SELECT * FROM likes_tbl ";
	$rs2 = mysqli_query($conn,$qry2);

	$qry3 = "SELECT * FROM users_tbl ";
	$rs3 = mysqli_query($conn,$qry3);

	$qry4 = "SELECT * FROM comments_tbl ";
	$rs4 = mysqli_query($conn,$qry4);

	$qry5 = "SELECT * FROM todolist_tbl WHERE status='Active'";
	$rs5 = mysqli_query($conn,$qry5);
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Dashboard | Tech Notify</title>
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
  					<li class="nav-item active">
  						<a href="dashboard" class="nav-link px-3">Dashboard</a>
  					</li>
  					<li class="nav-item">
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
					<h3 class="page-title"><i class="fas fa-tachometer-alt"></i> Dashboard</h3>
					<section class="main-section" style="padding: 30px;">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
								<div class="widget">
									<div class="widget-icon">
										<i class="far fa-newspaper"></i>
									</div>
									<div class="widget-text">
										<h4 class="mb-1"><?php echo mysqli_num_rows($rs1); ?></h4>
										<h6 class="widget-title mb-4">Total Posts</h6>
										<a href="posts" class="btn btn-block theme-btn-inverse">Manage Posts</a>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
								<div class="widget">
									<div class="widget-icon">
										<i class="far fa-heart"></i>
									</div>
									<div class="widget-text">
										<h4 class="mb-1"><?php echo mysqli_num_rows($rs2); ?></h4>
										<h6 class="widget-title mb-4">Total Likes</h6>
										<a href="feedback" class="btn btn-block theme-btn-inverse">Manage Feedbacks</a>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
								<div class="widget">
									<div class="widget-icon">
										<i class="fas fa-users"></i>
									</div>
									<div class="widget-text">
										<h4 class="mb-1"><?php echo mysqli_num_rows($rs3); ?></h4>
										<h6 class="widget-title mb-4">Total Users</h6>
										<a href="users" class="btn btn-block theme-btn-inverse">Manage Users</a>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
								<div class="widget">
									<div class="widget-icon">
										<i class="far fa-comment-dots"></i>
									</div>
									<div class="widget-text">
										<h4 class="mb-1"><?php echo mysqli_num_rows($rs4); ?></h4>
										<h6 class="widget-title mb-4">Total Comments</h6>
										<a href="feedback" class="btn btn-block theme-btn-inverse">Manage Comments</a>
									</div>
								</div>
							</div>
						</div>
						<h5 style="margin-bottom: 30px;" class="mt-4">Todo List</h5>
						<div class="table-responsive">
							<table class="table table-striped table-dark">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Title</th>
										<th scope="col">Note</th>
										<th scope="col">Date & Time</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<?php
								if (mysqli_num_rows($rs5)>0) 
								{
									while ($row=mysqli_fetch_assoc($rs5)) 
									{
								?>
								<tbody>
									<tr>
										<td scope="row"><?php echo $row['id']; ?></td>
										<td><?php echo $row['title']; ?></td>
										<td><?php echo $row['note']; ?></td>
										<td><?php echo $row['doi']; ?></td>
										<td>
											<a href="todolist-edit?id=<?php echo $row['id'] ?> " class="btn btn-sm btn-secondary"><i class="fas fa-pen"></i></a>
											<a href="todolist-delete?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								</tbody>
								<?php
										}
									}
								?>
							</table>
						</div>
						<h5 style="margin-bottom: 30px; margin-top: 30px;" class="mt-4">Take a note...</h5>
						<form method="post">
							<div class="form-group">
								<label class="form-label">Title</label>
								<input type="text" name="note-title" placeholder="Enter the Title of Note" class="form-control theme-txtbox" required>
							</div>
							<div class="form-group">
								<label class="form-label">Note</label>
								<textarea name="note-description" placeholder="Enter the Note" class="form-control theme-txtbox mb-3" required></textarea>
							</div>
							<div class="form-group mb-0 mt-2 text-center">
								<button type="submit" name="submit" class="btn theme-btn mr-2">Publish</button>
								<button type="reset" class="btn theme-btn-red ml-2">Cancel</button>
							</div>
							<?php 
								if (isset($_POST['submit'])) 
								{
		
									$title =  $_POST['note-title'];
									$note  =  $_POST['note-description'];
									$status=  'Active';
									$doi   =  date("y-m-d H:i:s");

									$qry = "INSERT INTO todolist_tbl (title,note,doi,status) VALUES('".$title."','".$note."','".$doi."','".$status."')";

									$rs = mysqli_query($conn,$qry);
									if ($rs) 
									{
										echo '<script> window.location.href = "dashboard" </script>';
									}
									else
									{
										echo '<script> window.location.href = "dashboard" </script>';
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