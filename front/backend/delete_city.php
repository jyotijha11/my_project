<?php
  require('conn1.php');
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "delete from city where id ='$id'");
  header("location:city_dashboard.php");
?>