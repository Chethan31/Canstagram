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
.flex-container {
  display: flex;

}

.flex-container > div {
 
 
  margin: 10px;
  padding: 20px;
  font-size: 30px;
}
.flex-container1 {
  display: flex;

}

.flex-container1 > div {
  font-size: 30px;
}

.drag{
	
	margin-left:290px;
  border-radius:10px;
  width:40%;
  height:70px;
 items-align:center;
 background-color:white;
}
.content{
	width:410px;
	height:650px;;
	background-color:silver;
	border-radius:10px;
	items-align:center;
	border:2px solid Black;
	margin-top:25px;
	
	margin-left:20px;
	
}

.content1{
	border:2px solid Grey;
	margin-top:20px;
	height:550px;
	overflow: auto;
}
.drags{
	margin-top:25px;
	margin-bottom:25px;
	margin-left:20px;
  border-radius:10px;
  width:90%;
  height:127px;
 background-color:white;
 border:2px solid black;
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
			<ul>
			<div class="flex-container">
			<li><div class="content">
			<div><h2 style="text-align:center;margin-top:15px;font-size:30px;margin-bottom:0"><b> Friends</b></h2></div>
			<div class="content1">
			<?php	
				$p=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
				$row=mysqli_fetch_assoc($p);
				$id=$row['id'];
				$q=mysqli_query($db,"SELECT friends.*,user.* FROM friends JOIN user WHERE (friends.user_id=user.id and friends.frd_id='$id') ORDER BY fid DESC;");				
				if(mysqli_num_rows($q)>0){
					while($users = mysqli_fetch_assoc($q)){
			?>		<form method="POST" action="friends.php?info=<?php echo $users['id']; ?>">
					<div class="drags">
						<div class="flex-container1">
							<div style="">
								<img style='border-radius:50%;border:1px solid Black;margin-top:10px;margin-left:10px;' src="<?php echo $users['image']; ?>" height='100px' width='100px'>
							</div>
							<div style="">
							<label style="font-size:20px;color:Blue;float:right;margin-top:10px;margin-right:-20px;"><b><?php echo $users['position']; ?></b></label>
							<label style="font-size:20px;float:left;margin-top:30px;margin-left:10px;"><b><?php echo $users['usn']; ?></b></label>
							<br><label style="font-size:20px;float:left;margin-left:15px;margin-top:5px;"><b><?php echo $users['fullname']; ?></b></label>
							<br><button style="font-size:15px;color:Darkblue;background-color:lightgreen;margin-top:8px;height:30px;width:100px;padding:5px;"   class="btn btn-success"><a href="checkprofile.php?info=<?php echo $users['id']; ?>">Profile</a></button>
							<button style="color:Darkblue;background-color:red;margin-top:8px;height:30px;width:100px;padding:5px;" type="submit" name="remove" class="btn btn-success">Remove</button>
							</div>	
						</div>
						
					</div>
			</form>
				<?php } } ?>
			</div>
			</div></li>
			
			<li><div class="content">
			<div><h2 style="text-align:center;margin-top:15px;font-size:30px;margin-bottom:0"><b>Suggestions</b></h2></div>
			<div class="content1">
			<?php
				$p=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
				$row=mysqli_fetch_assoc($p);
				$id=$row['id'];
				$q=mysqli_query($db,"SELECT * FROM user WHERE id NOT IN ('$id') AND NOT user.id in (select friends.frd_id from friends where friends.user_id=$id) ORDER BY id DESC;");					
				if(mysqli_num_rows($q)>0){
					while($users = mysqli_fetch_assoc($q)){
			?>		<form method="POST" action="friends.php?info=<?php echo $users['id']; ?>">
					<div class="drags">
						<div class="flex-container1">
							<div style="">
								<img style='border-radius:50%;border:1px solid Black;margin-top:10px;margin-left:10px;' src="<?php echo $users['image']; ?>" height='100px' width='100px'>
							</div>
							<div style="">
							<label style="font-size:20px;color:Blue;float:right;margin-top:10px;margin-right:-20px;"><b><?php echo $users['position']; ?></b></label>
							<label style="font-size:20px;float:left;margin-top:30px;margin-left:10px;"><b><?php echo $users['usn']; ?></b></label>
							<br><label style="font-size:20px;float:left;margin-left:10px;margin-top:5px;"><b><?php echo $users['fullname']; ?></b></label>
							<br><button style="color:Darkblue;background-color:lightgreen;margin-left:100px;margin-top:8px;height:30px;width:100px;padding:5px;" type="submit" name="add" class="btn btn-success">Add Friend</button>
							</div>	
						</div>
						
					</div>
			</form>
				<?php } } ?>
			</div>	
			</div></li>
			<li><div class="content">
			<div><h2 style="text-align:center;margin-top:15px;font-size:30px;margin-bottom:0"><b>Requests</b></h2></div>
			<div class="content1">
			<?php	
				$p=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
				$row=mysqli_fetch_assoc($p);
				$id=$row['id'];
				$q=mysqli_query($db,"SELECT request.*,user.* FROM request JOIN user WHERE request.user_id=user.id and request.frd_id='$id' ORDER BY req_id DESC;");				
				if(mysqli_num_rows($q)>0){
					while($users = mysqli_fetch_assoc($q)){
			?>		<form method="POST" action="friends.php?info=<?php echo $users['id']; ?>">
					<div class="drags">
						<div class="flex-container1">
							<div style="">
								<img style='border-radius:50%;border:1px solid Black;margin-top:10px;margin-left:10px;' src="<?php echo $users['image']; ?>" height='100px' width='100px'>
							</div>
							<div style="">
							<label style="font-size:20px;color:Blue;float:right;margin-top:10px;margin-right:-20px;"><b><?php echo $users['position']; ?></b></label>
							<label style="font-size:20px;float:left;margin-top:30px;margin-left:10px;"><b><?php echo $users['usn']; ?></b></label>
							<br><label style="font-size:20px;float:left;margin-left:15px;margin-top:5px;"><b><?php echo $users['fullname']; ?></b></label>
							<br><button style="color:Darkblue;background-color:lightgreen;margin-top:8px;height:30px;width:100px;padding:5px;" type="submit" name="accept" class="btn btn-success">Accept</button>
							<button style="color:Darkblue;background-color:red;margin-top:8px;height:30px;width:100px;padding:5px;" type="submit" name="reject" class="btn btn-success">Reject</button>
							</div>	
						</div>
						
					</div>
			</form>
				<?php } } ?>
			</div>
			</div></li>
			</div>
		</div>
		
	</div>
	
</body>
</html>