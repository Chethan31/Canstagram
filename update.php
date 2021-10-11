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
	<link rel="stylesheet" href="style5.css">
</head>
<body>
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
			<div style="position:fixed;width:90%;height:86px;" class="main_header"><h1>Canstagram</h1></div>
				<form style="margin-top:6%;" action="profile.php" method="GET" enctype="multipart/form-data">
					<?php
						$q=mysqli_query($db,"SELECT * FROM user WHERE username='$_SESSION[username]';");
					?>
					<?php
						$row=mysqli_fetch_assoc($q);
					?>
					<h1><b>Update Profile</b></h1>
					<p><?php echo $row['position']; ?></p>
					
					<?php 
						if($row['position']== 'Student'){ ?>
							<table>
								<tr>
									<td>
										<label>USN <b>: </b></label>
									</td>
									<td>
										<input type="text" name="usn" required value="<?php echo $row['usn']; ?>" />
									</td>
								</tr>
								<tr>
									<td>
										<label>Name <b>: </b></label>
									</td>
									<td>
										<input type="text" name="fn" required value="<?php echo $row['fullname']; ?>"/>
									</td>
								</tr>
								<tr>
									<td>
										<label>Date Of Birth <b>: </b></label>
									</td>
									<td>
										<input type="date" name="dob" required value="<?php echo $row['dob']; ?>" />
									</td>
								</tr>
								<tr>
									<td>
										<label for="branch" >Branch <b>: </b></label>
									</td>
									<td>
										<select style="width:200%;height:35px;border:2px solid Black;border-radius:5px;font-size: 13px;margin-bottom:20px;margin-top:15px;" id="branch" name="branch" >
											<option value="<?php echo $row['branch']; ?>">Select Branch</option>
											<option value="Computer Science">Computer Science</option>
											<option value="Mechanical">Mechanical</option>
											<option value="Civil">Civil</option>
											<option value="Electronics & Communication">Electronics & Communication</option>
											<option value="Electrical & Electronics">Electrical & Electronics</option>
											<option value="Information Science">Information Science</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label for="year">Year <b>: </b></label>
									</td>
									<td>
										<select style="width:200%;height:35px;border:2px solid Black;border-radius:5px;font-size: 13px;margin-bottom:20px;margin-top:10px;" id="year" name="year" >
											<option value="<?php echo $row['year']; ?>">Select year</option>
											<option value="I Year">I</option>
											<option value="II Year">II</option>
											<option value="III Year">III</option>
											<option value="IV Year">IV</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label for="sem">Semester <b>: </b></label>
									</td>
									<td>
										<select style="width:200%;height:35px;border:2px solid Black;border-radius:5px;font-size: 13px;margin-bottom:20px;margin-top:10px;" id="sem" name="sem" >
											<option value="<?php echo $row['sem']; ?>">Select Semester</option>
											<option value="I Sem">I</option>
											<option value="II Sem">II</option>
											<option value="III Sem">III</option>
											<option value="IV Sem">IV</option>
											<option value="V Sem">V</option>
											<option value="VI Sem">VI</option>
											<option value="VII Sem">VII</option>
											<option value="VIII Sem">VIII</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label>Hobbies <b>: </b></label>
									</td>
									<td>
										<input type="text" name="hobbies" required value="<?php echo $row['hobbies']; ?>" />
									</td>
								</tr>
								<tr>
									<td>
										<label>Email <b>: </b></label>
									</td>
									<td>
										<input type="text" name="email"  required value="<?php echo $row['email']; ?>" />
									</td>
								</tr>
								<tr>
									<td>
										<label>Phone Number <b>: </b></label>
									</td>
									<td>
										<input type="text" name="phone" required value="<?php echo $row['phone']; ?>"/>
									</td>
								</tr>
							</table>
					<?php	}	
						else{ ?>
							<table>
								<tr>
									<td>
										<label>Staff-ID <b>: </b></label>
									</td>
									<td>
										<input type="text" name="usn" required value="<?php echo $row['usn']; ?>"/>
									</td>
								</tr>
								<tr>
									<td>
										<label>Name <b>: </b></label>
									</td>
									<td>
										<input type="text" name="fn" required value="<?php echo $row['fullname']; ?>"/>
									</td>
								</tr>
								<tr>
									<td>
										<label>Date Of Birth <b>: </b></label>
									</td>
									<td>
										<input type="date" name="dob" required />
									</td>
								</tr>
								<tr>
									<td>
										<label for="branch">Department <b>: </b></label>
									</td>
									<td>
										<select style="width:200%;height:40px;border:2px solid Black;border-radius:5px;font-size:13px;" id="branch" name="branch" >
											<option value="<?php echo $row['branch']; ?>">Select Department</option>
											<option value="Computer Science">Computer Science</option>
											<option value="Mechanical">Mechanical</option>
											<option value="Civil">Civil</option>
											<option value="Electronics & Communication">Electronics & Communication</option>
											<option value="Electrical & Electronics">Electrical & Electronics</option>
											<option value="Information Science">Information Science</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label>Email <b>: </b></label>
									</td>
									<td>
										<input type="text" name="email" required value="<?php echo $row['email']; ?>"/>
									</td>
								</tr>
								<tr>
									<td>
										<label>Phone Number <b>: </b></label>
									</td>
									<td>
										<input type="text" name="phone" required value="<?php echo $row['phone']; ?>" />
									</td>
								</tr>
							</table>
					<?php	}?>
					<!--<div class="group">
					<table>
						<tr>
							<td>
								<label>Profile Pic <b>: </b></label>
							</td>
							<td>
								<input type="file" name="profile" />
							</td>
					</table>
					</div>-->
					<br><button type="submit" name="update" class="btn btn-success">Save</button>
				</form>	
		</div>
	</div>
	
</body>
</html>