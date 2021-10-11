<?php include('server.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Canstagram</title>
	<link rel="stylesheet" type="text/css" href="style0.css">
</head>
<body style="margin-top:13%;">
    <div class="header">
	<h2>Login for Canstagram</h2>
	</div>
	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		
		<div class="input-group">
			<br><button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a><a style="margin-left:110px;" href="forgot.php">Forgot Password</a>
		</p>
	</form>
</body>
</html>