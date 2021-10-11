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
	<link rel="stylesheet" href="style5.css">
</head>
<body>
<style>
.drag{
	
	margin-left:290px;
	margin-bottom:15px;
  border-radius:10px;
  width:40%;
  height:70px;
 items-align:center;
 background-color:white;
}
</style>
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
			<div class="main_header" style="position:fixed;width:88%;height:86px;"><h1>Canstagram</h1></div>
			<div class="drag"></div> 
			<form style="width:100%;height:141%;">
				<?php
					$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
				?>
				<?php
					$row=mysqli_fetch_assoc($q);
				?>
				<h1><b>Account Setting</b></h1>
				<p style="margin-right:400px;margin-top:20px;"><?php echo $row['position']; ?></p>
				<table style="margin-left:400px;">
					<tr style="padding: 20px;">
						<td style="padding: 20px;">
							<label>Logout <b>: </b></label>
						</td>
						<td style="padding: 20px;">
							<a href="logout.php"><b>Click here!</b></a>
						</td>
					</tr>
					<tr style="padding: 20px;">
						<td style="padding: 20px;">
							<label>Delete Account <b>: </b></label>
						</td>
						<td style="padding: 20px;">
							<a href="delete.php"><b>Click here!</b></a>
						</td>
					</tr>
					<tr style="padding: 20px;">
						<td style="padding: 20px;">
							<label>Feedback <b>: </b></label>
						</td>
						<td style="padding: 20px;">
							<a href="feedback.php"><b>Click here!</b></a>
						</td>
					</tr>
				</table>
				
			</form>
		</div>
		
	</div>
	
</body>
</html>