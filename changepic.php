<?php include('server.php'); 
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Canstagram</title>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel="stylesheet" href="style3.css">
	<link rel="stylesheet" href="style9.css">
</head> 
<body>
	<div class="wrapper">
		<div class="sidebar">
			<h2><b>Menu</b></h2>
			<ul>
				<li><a href="home.php"><i class="fas fa-home"></i><b>Home</b></a></li>
				<li><a href="uploadpost.php"><i class="fas fa-image"></i><b>Post</b></a></li>
				<li><a href="gallery.php"><i class="fas fa-images"></i><b>Gallery</b></a></li>
				<li><a href="profile.php"><i class="fas fa-address-card"></i><b>Profile</b></a></li>
				<li><a href="friends.php"><i class="fas fa-user"></i><b>Friends</b></a></li>
				<li><a href="notification.php"><i class="fas fa-bell"></i><b>Notification</b></a></li>
				<li><a href="setting.php"><i class="fas fa-cogs"></i><b>Setting</b></a></li>
			</ul>
		</div>
		<div class="main_content">
			<div style="width:100%;height:86px;" class="main_header"><h1>Canstagram</h1></div>
			<form  style="margin-top:10%;height:70%;" action="" method="POST" enctype ="multipart/form-data">
				<h1 style="margin-top:20px;"><b>Change Profile Photo</b></h1>
				<input style="height:25%;padding:20px;width:90%;margin-left:5%" type="file" name="imag" required autofocus><br>
				
				<button style="margin-top:15px;width:70px;height:40px;margin-left:83%;" class="button" name="uploadpic"><b>Upload</b></button>
			</form>
		</div>
		
	</div>
	
</body>
</html>