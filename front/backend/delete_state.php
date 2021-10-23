<?php
  require('conn1.php');
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "delete from state where id ='$id'");
  header("location:state_dashboard.php");
?>