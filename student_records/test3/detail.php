<?php
  require('conn.php');
  if(isset($_POST['submit']))
   {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $gender = $_POST['gender'];
     $dob = $_POST['dob'];
     $password = $_POST['password'];
     $sql = "INSERT INTO user (name, email, address, gender, dob, password) VALUES ('$name', '$email', '$address', '$gender','$dob', '$password')";
     if (mysqli_query($conn, $sql)) 
     {
        echo "New record created successfully";
        header("location:index.php");
     } 
     else 
     {
        echo "Error: " . mysqli_error($conn);
     }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register Here</title>
  <meta charset="utf-8">
  
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-5">
	<h1> Register Here </h1>
	<form action=" " method="POST">
		<label>Name</label>
		<input type="text" name="name" placeholder="name"><br><br>
		<label>Email</label>
	<input type="email" name="email" placeholder="email"><br><br>
		<label>address</label>
		<input type="textarea" name="address" placeholder="address"><br><br>
		<label>Gender</label>
		<input type="radio" name="gender">Male<br>
		<input type="radio" name="gender">Female<br><b>
		<input type="radio" name="gender">other<br><b>

		<label>DOB</label>
		<input type="date" name="dob" placeholder="dob"><br><br>
		<label>password</label>
		<input type="password" name="password" placeholder="password"><br><br>
		<input type="submit" name="submit">
	</form>
</div>
</div>
</div>
</body>
</html>