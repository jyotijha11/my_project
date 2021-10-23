<?php
$conn = mysqli_connect("localhost", "root", "", "order_list");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
?>