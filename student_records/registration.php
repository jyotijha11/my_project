<?php 
require('conn.php');
if(isset($_POST['submit']))
{
   $fname= $_POST['first-name'];
   $lname= $_POST['last-name'];
   $mobile= $_POST['mobile'];
   $email=  $_POST['email'];
   $password= md5($_POST['password']);
   $sql = "INSERT INTO student_registration (first_name, last_name, mobile, email, password) VALUES ('$fname', '$lname', '$mobile', '$email', '$password')";
   if (mysqli_query($conn, $sql)) {
         header("location:login.php");
      } else {
        echo "Error: " . mysqli_error($conn);
      }
}
?>
<html lang="en">
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2? 
    family=Roboto+Slab:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<!--form-Login-->

<div class="row justify-content-center mt-5">
<div class="col-sm-7">
<div class="login-box">
<div class="mb-4 text-center"> <h2> Register Here </h2> </div>
  <form action="" method="POST">

    <div class="row">
       <div class="col-sm-6 mb-4">
         <input type="text" class="form-control" placeholder="First name" name="first-name" required>   
      </div>
      <div class="col-sm-6 mb-4">
          <input type="text" class="form-control" placeholder="Last name" name="last-name" required> 
      </div>
    </div>

    <div class="row">
       <div class="col-sm-6 mb-4">
         <input type="text" class="form-control" placeholder="Mobile" name="mobile" required>   
      </div>
      <div class="col-sm-6 mb-4">
         <input type="email" class="form-control" placeholder="E-mail" name="email" required>   
      </div>
    </div>

    <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirm Password" name="password" required>
    </div>
    <button type="submit" name="submit" class="btn btn-success btn-block"> Sign up <i class="fa fa-send"></i> </button>
  </form>
  <div class="login-footer">
     <p> If already have an account? <a href="login.php"> Login </a> </p>
  </div>
</div>-
</div>
</div>
</div>
</body>
</html>