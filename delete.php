<?php
	include('server.php');
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}

	$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
	$row=mysqli_fetch_assoc($q);		
		$username=$row['username'];
		$id=$row['id'];
	
	$query = "DELETE FROM user WHERE id='$id'";
	$result = mysqli_query($db,$query);
	
	
	if($result)
	{
		echo "<script>alert('You are successfully deleted your account!!')</script>";
		echo "<script>location.replace('login.php')</script>";
	}
	else
	{
		echo "<script>alert('Account not deleted!!')</script>";
		echo "<script>location.replace('setting.php')</script>";
	}
?>
	
