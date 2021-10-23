<?php
session_start();
require('conn.php');
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
      header("location:myprofile.php");
}

$id=$_GET['id'];
$sql = mysqli_query($conn1, "select * from user where id= '$id'");
$result = mysqli_fetch_assoc($sql);

if(isset($_POST['submit'])){
  $name= $_POST['name'];
  $email= $_POST['email'];
  $address= $_POST['address'];
  $gender= $_POST['gender'];
  $dob= $_POST['dob'];

  $sql ="UPDATE user SET name = '$name', email = '$email', address = '$address', gender = '$gender', dob='$dob' WHERE id='$id'";
  mysqli_query($conn1, $sql);
  header("location:myprofile.php");
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Dashboard </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="js/script.js"></script>
   </head>
   </html>