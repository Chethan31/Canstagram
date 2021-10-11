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
	<link rel="stylesheet" href="style6.css">
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
				
				<li><a href="setting.php"><i class="fas fa-cogs"></i><b>Setting</b></a></li>
			</ul>
		</div>
		<div class="main_content">
			<div class="main_header"><h1>Canstagram</h1></div>
			<form action="" method="POST">
				<?php
					$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
				?>
				<?php
					$row=mysqli_fetch_assoc($q);
				?>
				<h1><b>Feedback</b></h1>
				<p><?php echo $row['position']; ?></p>
				<label>Please write your Feedback below:</label>
				<textarea name="feed" placeholder="In words(min 50 words):" required></textarea>
				
				<button class="button" name="feedback">Submit</button>
			</form>
		</div>
		
	</div>
	
</body>
</html>