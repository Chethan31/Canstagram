<?php include('server.php'); 
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}


$p=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
$row=mysqli_fetch_assoc($p);
$id=$row['id'];
$a = [];
$A=mysqli_query($db,"SELECT frd_id FROM friends WHERE user_id='$id';");
	while($ids = mysqli_fetch_assoc($A)){
		$a[]=$ids['frd_id'];
	}
$b = [];
$B=mysqli_query($db,"SELECT * FROM user WHERE id NOT IN ('$id');");
	while($ids1 = mysqli_fetch_assoc($B)){
		$b[]=$ids1['id'];
	}


  foreach($b as $friend)
    if (!in_array($friend, $a)) 
      { 
       echo $friend;
      } 	
?>