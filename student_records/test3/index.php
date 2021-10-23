<?php
  session_start();
  require('conn.php');
  if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $sql = "select id,email from user where email = '$email' AND password = '$password'";
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);
      if($count == 1){
          $_SESSION['id'] = $row['id'];
          header("location:myprofile.php");
      }
      else {
          echo "Invalid User or Password";
      }
      }

  
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/style.css">
  	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="col-sm-5">
		<form action="" method="post">
			<div class="form-group">
				<input type="email" class="form-control" placeholder="email" name="email">
    		</div>
    		<div class="form-group">
        		<input type="password" class="form-control" placeholder="Password" name="password">
    		</div>
    <button type="submit" name="submit" class="btn btn-success btn-block"> Login <i class="fa fa-sign-in"></i> </button>
    <div class="login-footer">
     <p> Forgot <a href="forgot.php  "> Password? </a></p>
     <p> Don't have an account? <a href="sign.php"> Sign up </a> </p>
  </div>
  </form>
</div>
</body>
</html>