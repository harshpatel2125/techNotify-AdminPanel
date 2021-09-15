<?php
	session_start();

	if ($_SESSION) 
	{
		if (!isset($_SESSION['id']))
		{	
		}
		$id=$_SESSION['id'];
		
		if (!isset($_SESSION['fn']))
		{	
		}
		$fullname=$_SESSION['fn'];

		if (!isset($_SESSION['un']))
		{	
		}
		$username=$_SESSION['un'];

		if (!isset($_SESSION['post']))
		{	
		}
		$post=$_SESSION['post'];	
	}
	else
	{
		header("location:index.php");
		exit();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Profile | Tech Notify</title>
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
  						<a href="dashboard.php" class="nav-link px-3">Dashboard</a>
  					</li>
  					<li class="nav-item">
  						<a href="posts.php" class="nav-link px-3">Posts</a>
  					</li>
  					<li class="nav-item">
  						<a href="categories.php" class="nav-link px-3">Categories</a>
  					</li>
  					<li class="nav-item">
  						<a href="users.php" class="nav-link px-3">Users</a>
  					</li>
  					<li class="nav-item">
  						<a href="feedback.php" class="nav-link px-3">Feedback</a>
  					</li>
  					<li class="nav-item active">
  						<a href="profile.php" class="nav-link px-3">Profile</a>
  					</li>
  					<li class="nav-item">
  						<a href="logout.php" class="nav-link pr-0 pl-3">Logout</a>
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
					<h3 class="page-title"><i class="fas fa-user"></i> Profile</h3>
					<section class="main-section">
						<h5 style="margin-bottom: 30px;">Profile Management</h5>
						<div class="row">
							<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
								<div class="profile-section">
									<img src="media/profile-pic.jpg" class="img-fluid profile-pic d-md-inline-block d-lg-inline-block d-xl-inline-block" width="150">
									<h4 class="text-xl-left text-lg-left text-md-left text-center ml-2" style="margin-bottom: 30px;"><?php echo "$fullname"; ?></h4>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
								<form method="post" class="edit-profile-form">
									<div class="form-group">
										<label class="form-label">Username</label>
										<div class="form-inline">
											<input type="text" name="username" placeholder="Username" class="form-control theme-txtbox" value="<?php echo $username; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Profile Picture</label>
										<label class="btn input-file-btn mr-2">Change Profile Pic
											<input type="file" name="profile-pic">
										</label>
									</div>
									<div class="form-group mb-0 mt-2">
										<button type="submit" class="btn theme-btn mr-2">Save Profile</button>
										<a href="#" class="btn theme-btn theme-btn-inverse ml-2" id="change-pass">Change Password</a>
									</div>
								</form>
								<form method="post" class="change-password-form d-none">
									<div class="form-group">
										<label class="form-label">Current Password</label>
										<div class="form-inline">
											<input type="password" name="current-password" placeholder="Current Password" class="form-control theme-txtbox">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">New Password</label>
										<div class="form-inline">
											<input type="password" name="new-password" placeholder="New Password" class="form-control theme-txtbox">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Confirm Password</label>
										<div class="form-inline">
											<input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control theme-txtbox">
										</div>
									</div>
									<div class="form-group mb-0 mt-2">
										<button type="submit" class="btn theme-btn mr-2">Change Password</button>
										<a href="#" class="btn theme-btn theme-btn-inverse ml-2" id="edit-pro">Edit Profile</a>
									</div>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</main>
	<!-- main end -->
</body>
</html>