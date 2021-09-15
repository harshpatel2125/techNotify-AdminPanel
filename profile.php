<?php 
	session_start();

	if ($_SESSION['id']) 
	{
		$id=$_SESSION['id'];
	}
	else
	{
		header("location:index");
		exit();
	}

	require 'dbconnect.php';

	$qry = "SELECT * FROM admin_tbl WHERE id='".$id."' ";
	$rs = mysqli_query($conn,$qry);
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
  					<li class="nav-item active">
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
					<h3 class="page-title"><i class="fas fa-user"></i> Profile</h3>
					<section class="main-section">
						<?php
							if (mysqli_num_rows($rs)==1) 
							{
								while ($row=mysqli_fetch_assoc($rs)) 
								{
									if ($row) 
									{
						?>
						<h5 style="margin-bottom: 30px;">Profile Management</h5>
						<div class="row">
							<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
								<div class="profile-section">
							    	<?php echo '<img width="150" class="img-fluid profile-pic d-md-inline-block d-lg-inline-block d-xl-inline-block" src="data:image/jpeg;base64, '.base64_encode($row['dp']).' " />'; ?>
									<h4 class="text-xl-left text-lg-left text-md-left text-center" style="margin-bottom: 30px;"><?php echo $row['fullname']; ?></h4>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
								<form method="post" class="edit-profile-form" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
									<div class="form-group">
										<label class="form-label">Username</label>
										<div class="form-inline" >
											<input type="text" name="username" placeholder="Username" class="form-control theme-txtbox" value="<?php echo $row['username']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Profile Picture</label>
										<input type="file" name="dp" id="real-file4" hidden="hidden" required>
										<button type="button" class="btn input-file-btn" id="custom-button4">Change Profile Pic</button>
										<span class="input-file-preview" id="custom-text4">No image chosen</span>
										<script type="text/javascript">
											const realFileBtn4 = document.getElementById("real-file4");
											const customBtn4 = document.getElementById("custom-button4");
											const customTxt4 = document.getElementById("custom-text4");

											customBtn4.addEventListener("click", function()
											{
												realFileBtn4.click();
											});

											realFileBtn4.addEventListener("change", function()
											{
												if (realFileBtn4.value)
												{
    												customTxt4.innerHTML = realFileBtn4.value.match
    												(
      													/[\/\\]([\w\d\s\.\-\(\)]+)$/
    												)[1];
  												}
  												else
  												{
    												customTxt4.innerHTML = "No image chosen";
												}
											});
										</script>
									</div>
									<div class="form-group mb-0 mt-2">
										<button type="submit" name="submit" class="btn theme-btn mr-2">Save Profile</button>
										<a href="#" class="btn theme-btn theme-btn-inverse ml-2" id="change-pass">Change Password</a>
									</div>
									<?php
										require 'dbconnect.php';
										if (isset($_POST['submit'])) 
										{
											$id       = $_POST['id'];
											$username = $_POST['username'];
											$dpname   = $_FILES['dp']['name'];
											$dp       = addslashes(file_get_contents($_FILES["dp"]["tmp_name"]));

											$qry = "UPDATE admin_tbl SET username='".$username."',dp='".$dp."',dpname='".$dpname."' WHERE id=$id";

											$rs=mysqli_query($conn,$qry);
											if ($rs) 
											{
												echo '<script>window.location.href = "profile"</script>';
											}
										}
									?>
								</form>
								<form method="post" class="change-password-form d-none">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<div class="form-group">
										<label class="form-label">Current Password</label>
										<div class="form-inline">
											<input type="password" name="current-password" placeholder="Current Password" class="form-control theme-txtbox" required>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">New Password</label>
										<div class="form-inline">
											<input type="password" name="new-password" placeholder="New Password" class="form-control theme-txtbox" required>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Confirm Password</label>
										<div class="form-inline">
											<input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control theme-txtbox" required>
										</div>
									</div>
									<div class="form-group mb-0 mt-2">
										<button type="submit" name="submitbtn" class="btn theme-btn mr-2">Change Password</button>
										<a href="#" class="btn theme-btn theme-btn-inverse ml-2" id="edit-pro">Edit Profile</a>
									</div>
									<?php
										if (isset($_POST['submitbtn'])) 
										{
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
															echo '<script>window.location.href = "profile"</script>';
														}
													}
												}
											}
										}
									?>
								</form>
							</div>
						</div>
						<?php
									}
								}
							}
						?>
					</section>
				</div>
			</div>
		</div>
	</main>
	<!-- main end -->
</body>
</html>