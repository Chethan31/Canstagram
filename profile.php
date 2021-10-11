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
	<link rel="stylesheet" href="style4.css">
	
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
					<?php
						$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
					?>
					<?php
						$row=mysqli_fetch_assoc($q);
					?>
					<form action="update.php" method="POST">
					
					<h1><b>My Profile</b></h1>
					<p><?php echo $row['position']; ?></p>
					<div style='text-align:center;padding-bottom:10px;'><img style='border-radius:50%;border:1px solid Black;' src="<?php echo $row['image']; ?>" height='120' width='130'><a href="changepic.php"><i class="fas fa-edit" style="margin-left:-20px;color:black;"></i></a></div>

					<?php 
						if($row['position']== 'Student'){ ?>
							<label>USN<b> : </b> <?php echo $row['usn']; ?> </label><br>
							<br><label>Name<b> : </b> <?php echo $row['fullname']; ?> </label><br>
							<br><label>Date Of Birth<b> : </b><?php echo date("d-m-Y",strtotime($row['dob'])); ?></label><br>
							<br><label>Gender<b> : </b><?php echo $row['gender']; ?></label><br>
							<br><label>Branch<b> : </b><?php echo $row['branch']; ?></label><br>
							<br><label>Year<b> : </b><?php echo $row['year']; ?></label><br>
							<br><label>Semester<b> : </b><?php echo $row['sem']; ?></label><br>
							<br><label>Hobbies<b> : </b><?php echo $row['hobbies']; ?></label><br>
							<br><label>Email<b> : </b><?php echo $row['email']; ?></label><br>
							<br><label>Phone Number<b> : </b><?php echo $row['phone']; ?></label><br>
							
					<?php	}	
						else{ ?>
							<label>Staff-ID<b> : </b> <?php echo $row['usn']; ?> </label><br>
							<br><label>Name<b> : </b><?php echo $row['fullname']; ?></label><br>
							<br><label>Date Of Birth<b> : </b><?php echo date("d-m-Y",strtotime($row['dob'])); ?></label><br>
							<br><label>Gender<b> : </b><?php echo $row['gender']; ?></label><br>
							<br><label>Department<b> : </b><?php echo $row['branch']; ?></label><br>
							<br><label>Email<b> : </b><?php echo $row['email']; ?></label><br>
							<br><label>Phone Number<b> : </b><?php echo $row['phone']; ?></label><br>
							
					<?php	}?>
					<button class="button" name="profile">Edit Profile</button>
				</form>	
		</div>
	</div>
	
</body>
</html>