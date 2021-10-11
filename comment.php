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
</head>
<body>
<style>
.drag{
	margin-left:290px;
	border-radius:10px;
	width:40%;
	height:70px;
	items-align:center;
	background-color:white;
}
.content{
	width:70%;
	height:650px;
	background-color:silver;
	border-radius:10px;
	items-align:center;
	border:2px solid Black;
	margin-top:30px;
	margin-left:15%;
}

.content1{
	margin-top:50px;
	margin-left:50px;
	margin-bottom:25px;
	border-radius:10px;
	width:90%;
	height:400px;
	border:2px solid black;
	overflow:auto;
}
.drags{
	margin-top:5px;
	margin-left:40px;
	width:90%;
	height:140px;
	border-radius:10px;
	border: 2px solid Black;
	background-color:white;
}
.wrapper .main_content textarea{
	width:90%;
	height:60px;
	border: 2px solid Black;
	border-radius:5px;
	padding:15px;
	margin-left:50px;
	margin-top:30px;
}

button{
	width:100px;
	height:30px;
	background-color: green;
	border: 1px solid Black;
	border-radius: 5px;
	float:right;
	margin-right:40px;
	margin-top:5px;
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
			<div style="position:fixed;width:88%;height:86px;" class="main_header"><h1>Canstagram</h1></div>
			<div class="drag"></div> 
			<div class="content">
			<div><h2 style="text-align:center;margin-top:15px;font-size:30px;margin-bottom:0"><b> Comment</b></h2></div>
			<?php 
				$pid=$_GET['info1'];
				$uid=$_GET['info2'];
			?>
			<form method="POST" action="comment.php?info1=<?php echo $pid; ?>&&info2=<?php echo $uid;?>" >
				<textarea name="feed" style="font-size:20px;" placeholder="Write your comment here(max 10 words)...." required></textarea>
				<br><button class="button" name="comment">Submit</button>
			</form>
			<div class="content1">
			<?php
				
				$q=mysqli_query($db,"SELECT comment.*,user.* FROM comment JOIN user WHERE comment.user_id=user.id and comment.postid=$pid ORDER BY comment_id DESC");	
				if(mysqli_num_rows($q)>0){
					while($comment = mysqli_fetch_assoc($q)){
			?>		
					<div class="drags">
					<div style="width:100%;height:30px;">
						<img style='border-radius:50%;border:2px solid Black;float:left;margin-top:10px;margin-left:20px;height:60px;width:60px;' src="<?php echo $comment['image']; ?>" height='80' width='80'>
						<label style="font-size:25px;float:left;margin-top:30px;margin-left:10px;"><b><?php echo $comment['fullname']; ?></b></label>
						<label style="font-size:20px;float:right;margin-top:20px;margin-right:20px;color:Blue;"><b><?php echo $comment['position']; ?></b></label>
						<label style="font-size:15px;float:right;margin-top:50px;margin-right:-60px;"><b><?php echo $comment['comment_time']; ?></b></label>
					</div>
					<div style="width:100%;height:20px;">
						<label style="font-size:20px;float:left;margin-top:50px;margin-left:-150px;"><b><?php echo $comment['comment_content']; ?></b></label>
						<a href="deletecomment.php?info=<?php echo $comment['comment_id'];?>" style="float:right;margin-top:80px;margin-right:-100px;" ><b>Delete </b></a>
					</div>
					</div>
			<?php } } ?>
			</div>
			<div>
			<form action="home.php" style="margin-top:-15px;">
			<button style="background-color:Blue">Back</button>
			</form>
			</div>
			</div>
		</div>
		
	</div>
	
</body>
</html>