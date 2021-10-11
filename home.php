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
<style>
 .bb{
	margin-top:3px;
	margin-left:3px;
	height:70%;
	width:525px;
	padding:2px;
	border:4px solid black;
}
.bb img{
	width:30%;
	height:30%;
}
.drag{
	
	margin-left:290px;
  border-radius:10px;
  width:40%;
  height:70px;
 items-align:center;
 background-color:white;
}
.drags{
	margin-top:25px;
	margin-bottom:25px;
	margin-left:400px;
  border-radius:10px;
  width:40.9%;
  height:480px;
 items-align:center;
 background-color:white;
 border:4px solid silver;
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
		<div class="main_content" style="background-color:lightgrey;">
			<div class="main_header" style="position : fixed;width:100%;height:86px;padding-left:36%;"><h1>Canstagram</h1></div>
			<div class="drag"></div> 
			<?php
				$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
				$row=mysqli_fetch_assoc($q);					
				$p = "SELECT posts.*,user.* FROM posts JOIN user WHERE posts.user_id=user.id ORDER BY postid DESC";
				$res = mysqli_query($db,$p);
				if(mysqli_num_rows($res)>0){
					while($images = mysqli_fetch_assoc($res)){
			?>
					<div class="drags">
						<div>
							<img style='border-radius:50%;border:2px solid Black;float:left;margin-top:10px;margin-left:20px;height:60px;width:60px;' src="<?php echo $images['image']; ?>" height='80' width='80'>
							<label style="font-size:25px;float:left;margin-top:30px;margin-left:10px;"><b><?php echo $images['fullname']; ?></b></label>
							<label style="font-size:20px;float:right;margin-top:20px;margin-right:20px;color:Blue;"><b><?php echo $images['position']; ?></b></label>
							<label style="font-size:15px;float:right;margin-top:50px;margin-right:-60px;"><b><?php echo $images['postdate']; ?></b></label>
						</div>
						<img class ="bb" src="<?=$images['photo']?>" style="margin-bottom:20px;">
						<b style="margin-left:20px;font-size:25px;">Likes </b><a style="font-size:25px;" href="like.php?info1=<?php echo $images['postid'];?>&&info2=<?php echo $row['id'];?>"><i class="fas fa-thumbs-up"></i><a>
						<label style="font-size:20px;"><b><?php echo $images['count'];?></b></label>
						<b style="margin-left:20px;font-size:25px;">Comments </b><a style="font-size:25px;" href="comment.php?info1=<?php echo $images['postid'];?>&&info2=<?php echo $row['id'];?>"><i class="fas fa-comments"></i><a>
					</div>
				<?php } } ?>
		</div>
	</div>
</body>
</html>