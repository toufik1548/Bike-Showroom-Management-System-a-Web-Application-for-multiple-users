<?php include("configs/config.php"); ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Login</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" type="text/css" href="<?php echo $site_url; ?>/style.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $site_url; ?>/css/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $site_url; ?>/css/loginstyle.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $site_url; ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $site_url; ?>/css/font.css" />
</head>

<body>

<?php
session_start();
if(isset($_SESSION['msg']))
{
	echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION['msg']."</div>";
	unset($_SESSION['msg']);
}
?>

<section class="section pt-3">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-5">
				<div class="wrap">
					<div class="img">
					    <img src="images/login.jpg" class="img-fluid" alt="Admin Image">
					</div>
					<div class="login-wrap p-4 p-md-5">
				      	<div class="d-flex pt-3">
				      		<div class="w-100">
				      			<h6 class="mb-4 text-center"><b>BIKE<br>Showroom Management System</b></h6>
				      		</div>
				      	</div>
						<form method="post" action="mvc/checklogin.php" class="signin-form">
				      		<div class="form-group mt-3">
				      			<input type="text" class="form-control" name="username" required>
				      			<label class="form-control-placeholder" for="username">Username</label>
				      		</div>
				            <div class="form-group">
				              <input id="password-field" type="password" name="password" class="form-control" required>
				              <label class="form-control-placeholder" for="password">Password</label>
				            </div>
				            <div class="form-group">
				            	<button type="submit" name="signin" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
				            </div>
	          			</form>
	        		</div>
	      		</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript" src="<?php echo $site_url; ?>/js/all.js"></script>






</body>
</html>
