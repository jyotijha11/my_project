<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Study With Us</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<body>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<img width="7%" src="https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8OHx8fGVufDB8fHx8&w=1000&q=80">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="result">Result will be shown here</div>
		 <?php 
			 if(isset($_POST["first_form"]))
	            {
	                $name = $_POST['name'];
	                $email = $_POST['email'];
	                $phone = $_POST['phone'];
	                $message = $_POST['message'];
	                $city = $_POST['city'];
	                echo "Name :- :".$name. "<br>";
	                echo "Email :- :".$email. "<br>";
	                echo "Phone :- :".$phone. "<br>";
	                echo "City :- :".$city. "<br>";
	 				echo "Message :- :".$message. "<br>";
	            }  
         ?>
			<form method="post" action="">
				<div id="contact-form" class="form-container" data-form-container>
				<div class="row">
					<div class="form-title">
						<span>Contact Us</span>
					</div>
				</div>
			<div class="input-container">
				<div class="row">
					<span class="req-input" >
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Input Your First and Last Name."> </span>
						<input type="text" data-min-length="8" placeholder="Name" name="name" value="<?php if(isset($name)){ echo $name; } ?>">
					</span>
				</div>
				<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input Your Email."> </span>
						<input type="email" placeholder="Email" name="email" value="<?php if(isset($email)){ echo $email; } ?>">
					</span>
				</div>
				<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input Your Email."> </span>
						<input type="text" placeholder="City" name="city" value="<?php if(isset($city)){ echo $city; } ?>">
					</span>
				</div>
				<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input Your Phone Number."> </span>
						<input type="tel" placeholder="Phone Number" name="phone"value="<?php if(isset($phone)){ echo $phone; } ?>">
					</span>
				</div>
				<div class="row">
					<span class="req-input message-box">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Include a Message."> </span>
						<textarea name="message" type="textarea" data-min-length="10" value="<?php if(isset($message)){ echo $message; } ?>" placeholder="Message"></textarea>
				</div>
				<div class="row submit-row">
					<button type="submit" name="first_form" class="btn btn-block submit-form">Submit</button>
				</div>
			</div>
			</div>
			</form>
		</div>
</body>
</html>