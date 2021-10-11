<?php include('server.php'); 
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}
	$q1=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
	$row1=mysqli_fetch_assoc($q1);
	$id=$row1['id'];
	$pid=$_GET['info1'];
	$uid=$_GET['info2'];
	$q=mysqli_query($db,"SELECT * FROM posts WHERE postid='$pid';");
	$row=mysqli_fetch_assoc($q);
	$count=$row['count'];
	$user_check_query = "SELECT * FROM likes WHERE user_id='$uid' and postid='$pid' LIMIT 1";
	$results = mysqli_query($db,$user_check_query);
	$user = mysqli_fetch_assoc($results);
	if($user){
		if($user['user_id'] === $uid){
			array_push($errors,"Username already exists");
		}
		if($user['postid'] === $pid){
			array_push($errors,"Username already exists");
		}
	}
	if(count($errors)==0){
		$sql = "INSERT INTO likes (postid,user_id)
							Values ('$pid','$uid')";
		mysqli_query($db,$sql);
		$sql1 = "UPDATE posts SET count=$count+1 WHERE postid='$pid'";
		mysqli_query($db,$sql1);
	}
	
	echo "<script>location.replace('home.php')</script>";	
?>