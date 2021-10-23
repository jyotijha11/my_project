<?php
  require('conn1.php');
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "delete from district where id ='$id'");
  header("location:district_dashboard.php");
?>