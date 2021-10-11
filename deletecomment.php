<?php
	include('server.php');
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}
	$id=$_GET['info'];	
	
	$p=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
	$row=mysqli_fetch_assoc($p);
	$uid=$row['id'];
	$q=mysqli_query($db,"SELECT * FROM comment WHERE comment_id='$id';");
	$row1=mysqli_fetch_assoc($q);
	$uid1=$row1['user_id'];
	if($uid==$uid1){
	$query = "DELETE FROM comment WHERE comment_id='$id';";
	$result = mysqli_query($db,$query);
	echo "<script>alert('Your Comment has been successfully deleted!!')</script>";
	echo "<script>location.replace('home.php')</script>";
	
	}
	else{
		echo "<script>alert('You cant delete others comment!!')</script>";
		echo "<script>location.replace('home.php')</script>";
		
	}
	
	?>
	