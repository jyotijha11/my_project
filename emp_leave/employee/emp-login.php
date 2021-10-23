<?php
  session_start();
  require('conn.php');
  if(isset($_POST['submit']))
  {
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $sql = "select id from employees where emp_email = '$email' AND emp_pass = '$password'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) == 1)
      {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $data['id']; 
        header("location:dashboard.php");
      }
      else
      {
        echo "Invalid User or Password";
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Employee Login</title>
	<meta charset="utf-8">
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
    	<div class="row justify-content-center mt-5">
    		<div class="col-sm-5">
    			<div class="login-box">
    				
    			</div class="mb-4 text-center"><h1>EMPLOYEE LOGIN</h1>
    			<form method="POST" action=" ">
    				<div class="form-group">
    					<input type="email" class="form-control" name="email" placeholder="E-mail">
    				</div>
    				<div class="form-group">
    					<input type="password" class="form-control" name="password" placeholder="Password">
    				</div>
    				<button type="submit" name="submit" class="btn btn-success btn-block"><i class="fa fa-sign-in"></i> Login></button>
    			</form>
    			<div class="login-footer">
    				<p> Forgot <a href="forgot.html"> Password? </a></p>
    			</div>
    		</div>
    	</div>
    </div>
</body>
</html>