<?php
  require('conn1.php');
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "delete from country where id ='$id'");
  header("location:country_dashboard.php");
?>