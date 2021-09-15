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

	$qry = "SELECT * FROM category_tbl WHERE isactive='Active'";
	$rs = mysqli_query($conn,$qry);

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Categories | Tech Notify</title>
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
					<h3 class="page-title"><i class="fas fa-layer-group"></i> Categories</h3>
					<section class="main-section">
						<h5 style="margin-bottom: 30px;">Category Management</h5>
						<form method="get" class="form-inline" action="category-search" style="margin-bottom: 30px;">
							<input type="text" name="search-box" placeholder="Search..." class="form-control theme-txtbox mb-3">
							<button type="submit" class="btn theme-btn mb-3 ml-1">Search</button>
							<a href="category-create" class="btn theme-btn-inverse ml-auto mb-3" style="font-size: 18px !important;"><i class="fas fa-plus"></i> Create Category</a>
						</form>
						<div class="table-responsive">
							<table class="table table-striped table-dark">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Name</th>
										<th scope="col">Creator</th>
										<th scope="col">Date & Time</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<?php
									if (mysqli_num_rows($rs)>0) 
									{
										while ($row=mysqli_fetch_assoc($rs)) 
										{
								?>
								<tbody>
									<tr>
										<td scope="row"><?php echo $row['id']; ?></td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['creator']; ?></td>
										<td><?php echo $row['doi']; ?></td>
										<td><?php echo $row['status']; ?></td>
										<td>
											<a href="category-status?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-success"><i class="fas fa-power-off"></i></a>
											<a href="category-edit?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-secondary"><i class="fas fa-pen"></i></a>
											<a href="category-delete?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
								</tbody>
								<?php
										}
									}
								?>
							</table>
						</div>
					</section>
				</div>
			</div>
		</div>
	</main>
	<!-- main end -->
</body>
</html>