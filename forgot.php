<?php include('server.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Canstagram</title>
	<link rel="stylesheet" type="text/css" href="style0.css">
</head>
<body style="margin-top:8%;">
	<div class="header">
	<h2>Forgot Password</h2>
	</div>
	<form method="post" action="forgot.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Enter USN or Staff ID....">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" required autofocus placeholder="Registered Email-ID....">
		</div>
		<div class="input-group">
			<label>Phone</label>
			<input type="text" name="phone" required autofocus placeholder="Registered Phone-No....">
		</div>
		<div class="input-group">
			<label>New Password</label>
			<input type="password" name="password_1" required autofocus>
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="password_2" required autofocus>
		</div>
		
		<div class="input-group">
			<br><button type="submit" name="forgot" class="btn">Submit</button>
			<a style="margin-left:65%;padding:10px;padding-right:20px;padding-left:20px;" href="login.php" class="btn"><b>Back</b></a>
		</div>
		
	</form>
</body>
</html>