<?php 
$conn = mysqli_connect("localhost", "root", "", "add1");
if(isset($_POST['submit']))
{
   $name= $_POST['name'];
   $phone= $_POST['phone'];
   $email=  $_POST['email'];
   
   $sql = "INSERT INTO user (name,phone,email) VALUES ('$name', '$phone', '$email')";
   if (mysqli_query($conn, $sql))
    {
        echo "New record created successfully";
     } 
    else
	  {
	    echo "Error: " . mysqli_error($conn);
	  }
    }
?>
<html>
	<head>
		<title>Mycoders</title>
    </head>	
<body>
	<label>name</label>
	<input type="text" name="name">
	<label>phone</label>
	<input type="text" name="mobile">
    <label>E-mail</label>
    <input type="email" name="email">
    <input type="submit" name="submit">
</body>
