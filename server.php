<?php
	session_start();
	$username = "";
	$usn = "";
	$fullname = "";
	$dob ="";
	$gender ="";
	$position ="";
	$email = "";
	$phone = "";
	$errors = array();
	
	$db = mysqli_connect('localhost','root','','canstagram');
	
	if(isset($_POST['register'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$usn = mysqli_real_escape_string($db,$_POST['usn']);
		$fullname = mysqli_real_escape_string($db,$_POST['fullname']);
		$dob = mysqli_real_escape_string($db,$_POST['dob']);
		$gender = mysqli_real_escape_string($db,$_POST['gender']);
		$position = mysqli_real_escape_string($db,$_POST['position']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$phone = mysqli_real_escape_string($db,$_POST['phone']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
		
		$file_name =  $_FILES['image']['name'];
		$file_type =  $_FILES['image']['type'];
		$file_size =  $_FILES['image']['size'];
		$file_tem_loc =  $_FILES['image']['tmp_name'];
		$file_store = "profilepic/".$file_name;
		
		move_uploaded_file($file_tem_loc,$file_store);
		
		/* if(empty($username)) {
			array_push($errors,"Username is required");
		}
		
		if(empty($email)) {
			array_push($errors,"Email is required");
		} 
		
		if(empty($password_1)) {
			array_push($errors,"Password is required");
		}*/
		
		if($password_1 != $password_2) {
			array_push($errors,"Password do not match");
		} 
		
		$user_check_query = "SELECT * FROM user WHERE username='$username' or email='$email' LIMIT 1";
		$results = mysqli_query($db,$user_check_query);
		$user = mysqli_fetch_assoc($results);
		
		if($user){
			if($user['username'] === $username){
				array_push($errors,"Username already exists");
			}
			if($user['usn'] === $usn){
				array_push($errors,"USN already exists");
			}
			if($user['email'] === $email){
				array_push($errors,"Email Id already exists for Registered User");
			}
		}
		
		if(count($errors)==0){
			$password = md5($password_1);
			$sql = "INSERT INTO user (username,usn,fullname,dob,gender,position,email,phone,password,image)
						Values ('$username','$usn','$fullname','$dob','$gender','$position','$email','$phone','$password','$file_store')";
			mysqli_query($db,$sql);
			echo "<script>alert('You are successfully Registered!!')</script>";
			echo "<script>location.replace('login.php')</script>";
			/*header('location: login.php');*/
		}
		

	}
	
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		
		if(empty($username)) {
			array_push($errors,"Username is required");
		}
		
		if(empty($password)) {
			array_push($errors,"Password is required");
		}	
			
		if(count($errors)==0){
			$password = md5($password);
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db,$query);
			if(mysqli_num_rows($result) == 1){
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				echo "<script>alert('You are successfully logged in!!')</script>";
				//header('location: index.php');
				echo "<script>location.replace('home.php')</script>";
			}else{
				array_push($errors,"Wrong username/password combination");
				
			}	
		}	
		
	}
	
	if(isset($_GET['update'])){
		$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
		$row=mysqli_fetch_assoc($q);
		if($row['position']== 'Student'){
			$usn=$_GET['usn'];
			$fn=$_GET['fn'];
			$dt=$_GET['dob'];
			$bn=$_GET['branch'];
			$yr=$_GET['year'];
			$sm=$_GET['sem'];
			$hb=$_GET['hobbies'];
			$em=$_GET['email'];
			$ph=$_GET['phone'];
		
		
			$sqlupdate = "UPDATE user SET 
									usn='$usn',
									fullname='$fn',
									dob='$dt',	
									branch='$bn',
									year='$yr',
									sem='$sm',
									hobbies='$hb',
									email='$em',
									phone='$ph'
								WHERE username='$_SESSION[username]' ";
		}else{
			$usn=$_GET['usn'];
			$fn=$_GET['fn'];
			$dt=$_GET['dob'];
			$bn=$_GET['branch'];
			$em=$_GET['email'];
			$ph=$_GET['phone'];
		
		
			$sqlupdate = "UPDATE user SET 
									usn='$usn',
									fullname='$fn',
									dob='$dt',	
									branch='$bn',
									email='$em',
									phone='$ph'
								WHERE username='$_SESSION[username]' ";
		}
		$result = mysqli_query($db,$sqlupdate);
		
		if($result){
			echo "<script>alert('You are successfully Updated profile!!')</script>";
		}else{
			echo "<script>alert('Profile Not Updated!!')</script>";
		}
		
	}
	
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
	
	if(isset($_POST['upload'])){
		$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
		$row=mysqli_fetch_assoc($q);
		$username=$row['id'];
		
		$img_name =  $_FILES['imag']['name'];
		$img_type =  $_FILES['imag']['type'];
		$img_size =  $_FILES['imag']['size'];
		$tmp_name =  $_FILES['imag']['tmp_name'];
		$error =  $_FILES['imag']['error'];
		
		if($error === 0){
			if($img_size > 125000000000){
				$em = "Sorry, your file is too large.";
				header("Location: uploadpost.php?error=$em");
			}else{
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);
				$allowed_exs = array("jpg","jpeg","png");
				
				if(in_array($img_ex_lc,$allowed_exs)){
					$new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
					$img_upload_path = 'Uploads/'.$new_img_name;
					move_uploaded_file($tmp_name,$img_upload_path);
					$sql = "INSERT INTO posts (user_id,photo)
						Values ('$username','$img_upload_path')";
					mysqli_query($db,$sql);
					echo "<script>alert('Your Post has be uploaded!!')</script>";
					echo "<script>location.replace('gallery.php')</script>";
				}else{
					$em = "You can't upload files of this type";
					header("Location: uploadpost.php?error=$em");
				}
			}
		}else{
			$em = "unknown error occurred!";
			header("Location: uploadpost.php?error=$em");
		}
		
	}
	
	if(isset($_POST['uploadpic'])){
		$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
		$row=mysqli_fetch_assoc($q);
		$username=$row['username'];
		
		$img_name =  $_FILES['imag']['name'];
		$img_type =  $_FILES['imag']['type'];
		$img_size =  $_FILES['imag']['size'];
		$tmp_name =  $_FILES['imag']['tmp_name'];
		$error =  $_FILES['imag']['error'];
		
		if($error === 0){
			if($img_size > 1250000000){
				$em = "Sorry, your file is too large.";
				header("Location: changepic.php?error=$em");
			}else{
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);
				$allowed_exs = array("jpg","jpeg","png");
				
				if(in_array($img_ex_lc,$allowed_exs)){
					$new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
					$img_upload_path = 'profilepic/'.$new_img_name;
					move_uploaded_file($tmp_name,$img_upload_path);
					$sql = "UPDATE user SET
									image='$img_upload_path'
								WHERE username='$username'";
					mysqli_query($db,$sql);
					echo "<script>alert('Your ProfilePic has be uploaded!!')</script>";
					echo "<script>location.replace('profile.php')</script>";
				}else{
					$em = "You can't upload files of this type";
					header("Location: changepic.php?error=$em");
				}
			}
		}else{
			$em = "unknown error occurred!";
			header("Location: changepic.php?error=$em");
		}
		
	}
	
	if(isset($_POST['feedback'])){
		$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
		$row=mysqli_fetch_assoc($q);
		$username=$row['id'];
		$feedback= mysqli_real_escape_string($db,$_POST['feed']);
		$sql = "INSERT INTO feedback (user_id,feedbacks)
						Values ('$username','$feedback')";
		mysqli_query($db,$sql);
		echo "<script>alert('Thank you for your feedback!!')</script>";
		echo "<script>location.replace('setting.php')</script>";
	}
	
	if(isset($_POST['forgot'])) {
		$userid = mysqli_real_escape_string($db,$_POST['username']);
		$eid = mysqli_real_escape_string($db,$_POST['email']);
		$phn = mysqli_real_escape_string($db,$_POST['phone']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
		
		if($password_1 != $password_2) {
			array_push($errors,"Password do not match");
		} 
		
		$user_check_query = "SELECT * FROM user WHERE username='$userid';";
		$results = mysqli_query($db,$user_check_query);
		$user = mysqli_fetch_assoc($results);
		
		if($user){
			if($user['email'] != $eid){
				array_push($errors,"Enter exist Email ID");
			}
			
			if($user['phone'] != $phn){
				array_push($errors,"Enter exist Phone Number");
			}
		}
		
		if(count($errors)==0){
			$password = md5($password_1);
			$sql = "UPDATE user SET password='$password' WHERE username='$userid'";
			$result = mysqli_query($db,$sql);
			if($result){
				echo "<script>alert('Your Password has been successfully changed!!')</script>";
				echo "<script>location.replace('login.php')</script>";
			}else{
				echo "<script>alert('Password does not changed!!')</script>";
				echo "<script>location.replace('login.php')</script>";
			}
		}
		

	}
	if(isset($_POST['add'])){
		$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
		$row=mysqli_fetch_assoc($q);
		$id=$row['id'];
		$id1=$_GET['info'];
		$request_check_query = "SELECT * FROM request WHERE user_id='$id' and frd_id='$id1' LIMIT 1";
		$results = mysqli_query($db,$request_check_query);
		$user = mysqli_fetch_assoc($results);
		if($user){
		if($user['user_id'] === $id){
			array_push($errors,"Username already exists");
		}
		if($user['frd_id'] === $id1){
			array_push($errors,"Username already exists");
		}
	}
		if(count($errors)==0){
			$sql = "INSERT INTO request (user_id,frd_id)
							Values ('$id','$id1')";
			mysqli_query($db,$sql);
		}
		echo "<script>alert('You Request has been sent!!')</script>";
	}
	if(isset($_POST['reject'])){
		$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
		$row=mysqli_fetch_assoc($q);
		$id=$row['id'];
		$id1=$_GET['info'];
		mysqli_query($db,"DELETE FROM request WHERE user_id='$id1' and frd_id='$id'");
	}
		
	if(isset($_POST['accept'])){
		$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
		$row=mysqli_fetch_assoc($q);
		$id=$row['id'];
		$id1=$_GET['info'];
		if(mysqli_query($db,"INSERT INTO friends (user_id,frd_id) VALUES ('$id','$id1')")&&mysqli_query($db,"INSERT INTO friends (user_id,frd_id) VALUES ('$id1','$id')"))
		{
			mysqli_query($db,"DELETE FROM request WHERE user_id='$id1' and frd_id='$id'");
			mysqli_query($db,"DELETE FROM request WHERE user_id='$id' and frd_id='$id1'");
		}
	}
	if(isset($_POST['remove'])){
		$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
		$row=mysqli_fetch_assoc($q);
		$id=$row['id'];
		$id1=$_GET['info'];
		mysqli_query($db,"DELETE FROM friends WHERE (user_id='$id' and frd_id='$id1')");
		mysqli_query($db,"DELETE FROM friends WHERE (user_id='$id1' and frd_id='$id')");
	}
	if(isset($_POST['comment'])){
		$pid=$_GET['info1'];
		$uid=$_GET['info2'];
		$comment= mysqli_real_escape_string($db,$_POST['feed']);
		$sql = "INSERT INTO comment (postid,user_id,comment_content)
						Values ('$pid','$uid','$comment')";
		mysqli_query($db,$sql);
	}

?>