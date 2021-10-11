<?php include('server.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Canstagram</title>
	<link rel="stylesheet" type="text/css" href="style0.css">
</head>
<body>
    <div class="header">
		<h2>Create a new Account</h2>
	</div>
	<form method="POST" action="register.php" enctype ="multipart/form-data">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required autofocus value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>USN or Staff_id</label>
			<input type="text" name="usn" required autofocus value="<?php echo $usn; ?>">
		</div>
		<div class="input-group">
			<label>Full Name</label>
			<input type="text" name="fullname" placeholder="Must be 9-12 characters.."required autofocus value="<?php echo $fullname; ?>">
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="dob" required autofocus value="<?php echo $dob; ?>">
		</div>
		<div>
			<label>Gender</label><br>
			<input type="radio" id="male" name="gender" required autofocus value="Male"> 
			<label for="male">Male</label>
			<input type="radio" id="female" name="gender" required autofocus value="Female"> 
			<label for="female">Female</label><br>
		</div>
		<div>
			<label>Postion</label><br>
			<input type="radio" id="student" name="position" required autofocus value="Student"> 
			<label for="student">Student</label>
			<input type="radio" id="teacher" name="position" required autofocus value="Staff"> 
			<label for="teacher">Staff</label><br>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" required autofocus value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Phone</label>
			<input type="text" name="phone" required autofocus value="<?php echo $phone; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" required autofocus>
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="password_2" required autofocus>
		</div>
		<div class="input-group">
			<label>Profile Picture</label>
			<input type="file" name="image" required autofocus>
		</div>
			<br><button type="submit" name="register" class="btn">Submit</button>
			<a style="margin-left:65%;padding:10px;padding-right:20px;padding-left:20px;" href="login.php" class="btn"><b>Back</b></a>
	</form>
</body>
</html>