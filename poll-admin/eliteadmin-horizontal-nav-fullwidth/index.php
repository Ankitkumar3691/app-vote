<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
	header("location: profile.php");
}
?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>Poll Admin</title>
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/blue.css" id="theme"  rel="stylesheet">
<script src="http://www.w3schools.com/lib/w3data.js"></script>
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box">
	<div id="main">
		<div id="login">
			<h2>Login Management</h2>
			<form action="" method="post" class="login_form">
				<input id="name" name="username" placeholder="Username" type="text">
				<input id="password" name="password" placeholder="Password" type="password">
				<input name="submit" type="submit" class="button" value="Login "align="center">
				</br>
			<span><?php echo $error; ?></span>
			</form>
		</div>
	</div>
  </div>
</section>
</body>
</html>
