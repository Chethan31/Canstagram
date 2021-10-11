<?php
	include('server.php');
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}
  
	if(isset($_GET['info'])){
		$id=$_GET['info'];
		
	}
	$query = "DELETE FROM posts WHERE postid='$id';";
	$result = mysqli_query($db,$query);
	
	if($result)
	{
		echo "<script>alert('Your Post has been successfully deleted!!')</script>";
		echo "<script>location.replace('gallery.php')</script>";
	}
	else
	{
		echo "<script>alert('Unknown Error!!')</script>";
		echo "<script>location.replace('gallery.php')</script>";
	}
?>
	