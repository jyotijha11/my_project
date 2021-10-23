<?php
  session_start();
  require('conn.php');

  if(isset($_POST['submit']))
  {
      $name = $_POST['name'];
      $password = $_POST['password'];
      $sql = "select id from schedule where name = '$name' AND password = '$password'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_num_rows($result);

      if($row == 1)
      {
        $count = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $count['id'];
        header("location:dashboard.php");
      }
      else
      {
        echo "Invalid User or Password";
      }
  }
?>       
<!DOCTYPE html>
<html lang="en">
<head>
  <title>  Admin Login </title>

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
<div class="mb-4 text-center"> <h2> Admin Login  </h2> </div>
  <form action=" " method="post">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="name" name="name">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
    <button type="submit" name="submit" class="btn btn-success btn-block"> <a href="dashboard.php">  </a> <i class="fa fa-sign-in"></i> Login </button>
  </form>
  <div class="login-footer">
     <p> Forgot <a href="forgot.html  "> Password? </a></p>
  </div>
</div>
</div>
</div>
<!--Login-end-->

</div>
</body>
</html>
