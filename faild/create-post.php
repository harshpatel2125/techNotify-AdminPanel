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
  						<a href="dashboard.php" class="nav-link px-3">Dashboard</a>
  					</li>
  					<li class="nav-item active">
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
  					<li class="nav-item">
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
					<h3 class="page-title"><i class="far fa-newspaper"></i> Create Posts</h3>
					<section class="main-section">
						<form method="post" action="create-post-process.php">
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
								<label class="btn input-file-btn mr-2">Select Image 1
									<input type="file" name="image">
								</label>
								<label class="btn input-file-btn mr-2">Select Image 2
									<input type="file" name="img-2">
								</label>
								<label class="btn input-file-btn mr-2">Select Image 3
									<input type="file" name="img-3">
								</label>
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
											<option value="news">News</option>
											<option value="trending">Trending</option>
											<option value="latest">Latest</option>
											<option value="tips-trick">Tips & Trick</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<div class="form-group">
										<label class="form-label">Post status</label>
										<select name="post-status" class="form-control theme-select">
											<option value="published">Published</option>
											<option value="pending">Pending</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group mb-0 mt-2 text-center">
								<button type="submit" name="submit" class="btn theme-btn mr-2">Publish</button>
								<button onclick="location.href='posts.php'" class="btn theme-btn-red ml-2">Cancel</button>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</main>
	<!-- main end -->
</body>
</html>