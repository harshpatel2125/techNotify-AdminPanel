<?php
	session_start();
	if (isset($_SESSION['id'])) 
	{
		echo '<script>javascript:history.back()</script>';
	}
	else
	{
		if (isset($_COOKIE['user'])) 
		{
			$un = $_COOKIE['user'];
			$ps = $_COOKIE['pass'];
		}
		else
		{
			$un="";
			$ps="";
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Login | Tech Notify</title>
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
		html
		{
			height: 100%;
		}
		body
		{
			height: 100%;
			display: flex;
			-ms-flex-align: center;
		}
		.theme-btn
		{
			font-size: 20px !important;
			line-height: 24px !important;
			font-weight: 500 !important;
			color: #000000 !important;
			background-color: #22ff66 !important;
			border-color: #22ff66 !important;
			border-radius: 50px !important;
		}
		.theme-btn:hover
		{
			background-color: #22e066 !important;
			border-color: #22e066 !important;
		}
		.theme-btn:active
		{
			background-color: #22d066 !important;
			border-color: #22d066 !important;
		}
		.theme-btn:focus
		{
			box-shadow: 0 0 0 0.2rem rgba(34,255,102,.5) !important;
		}
	</style>

</head>
<body>
	<div class="login-form">
		<div class="brand-logo" style="margin-bottom: 30px;">
			<img src="media/logo.png" class="img-fluid d-block my-0 mx-auto" width="230">
		</div>
		<h3 class="login-txt">Login</h3>
		<form method="POST" >
			<input type="text" name="username" value="<?php echo $un; ?>" placeholder="Username" class="form-control theme-txtbox" style="margin-bottom: 20px;" required>
			<input type="password" name="password" value="<?php echo $ps; ?>" placeholder="Password" class="form-control theme-txtbox" style="margin-bottom: 20px;" required>
			<div class="custom-control custom-checkbox ml-1" style="margin-bottom: 20px;">
				<input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me">
				<label for="remember-me" class="custom-control-label theme-chkbox text-white">Remember me</label>
			</div>
			<button type="submit" class="btn btn-block theme-btn" name="submit">Login</button>
			<?php  

				require 'dbconnect.php';
				
				if (isset($_POST['submit'])) 
				{
				$username = $_POST['username'];
				$mobile   = $_POST['username'];
				$password = $_POST['password'];

				$qry = "SELECT * FROM admin_tbl WHERE username='".$username."' AND password='".$password."' AND status='Active'";

				$rs=mysqli_query($conn,$qry);
				if (mysqli_num_rows($rs)>0) 
				{
					$row=mysqli_fetch_assoc($rs);
					$user = $row['username'];
					$pass = $row['password'];
					$_SESSION['id']=$row['id'];
					$_SESSION['fn']=$row['fullname'];
					$_SESSION['un']=$row['username'];
					$_SESSION['post']=$row['post'];
					$_SESSION['dp']=$row['dp'];

					if ($username == $user) 
					{
						if ($password == $pass) 
						{	
							if (isset($_POST['remember-me'])) 
							{
								setcookie("user",$username,time() + (86400 * 30), "/");
								setcookie("pass",$password,time() + (86400 * 30), "/");
							}

								header("location:dashboard");
								exit();
						}
						else
						{
							echo '<script> alert ("Wrong password")</script>';
						}
					}
					else
					{
						echo '<script> alert ("Could not find Your Acccount")</script>';
					}
					
				}
				else
				{
					echo '<script> alert ("Could not find Your Acccount")</script>';
				}
			}
			?>
		</form>
	</div>
</body>
</html>
<?php
	}
?>