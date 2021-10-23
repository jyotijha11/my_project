<?php
require('conn.php');
$id = $_GET['id'];
$sql = "UPDATE user SET status = 0 WHERE id=".$id;
mysqli_query($conn,$sql);
header("location:order_dashboard.php");
?>