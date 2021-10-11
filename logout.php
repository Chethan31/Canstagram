<?php include('server.php'); 
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}
?>
<?php session_destroy();
unset($_SESSION['username']);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Canstagram</title>
	<link rel="stylesheet" type="text/css" href="style0.css">
</head>
<body>
    <div class="header" style="margin-top:13%;">
	<h2>Logout</h2>
	</div>
	<form method="post">
		<div class="input-group">
			<br><p><center><b>You are successfully Logged Out</color></b></center></p><br>
		</div>
		<div class="input-group">
			<br><a href="login.php" class="btn">Login</a>
		</div>
	</form>
</body>
</html>