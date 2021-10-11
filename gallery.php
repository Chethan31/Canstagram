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
	<link rel="stylesheet" href="style8.css">

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
			<div class="main_header" style="position : fixed;width:100%;height:86px;padding-left:36%;"><h1>Canstagram</h1></div>
			<?php
				$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
				$row=mysqli_fetch_assoc($q);
				$userid=$row['id'];
			?>
			<form action="" method="POST">
				<h1><b>My Photos</b></h1>
				<?php
					$p = "SELECT * FROM posts WHERE user_id='$userid' ORDER BY postid DESC ";
					$res = mysqli_query($db,$p);
					
					if(mysqli_num_rows($res)>0){
						while($images = mysqli_fetch_assoc($res)){
				?>
				<div style="text-align:center;padding-bottom:25px;" class="alb">
					<img style="width:600px;height:350px;" src="<?=$images['photo']?>" ><br>
					<b><?php echo $images['postdate']; ?><b>
					<a href="deletephoto.php?info=<?php echo $images['postid'];?>" style="margin-left:30%;" >Delete </a>
				</div>
				<?php } } ?>
			</form>
		</div>
		
	</div>
	
</body>
</html>