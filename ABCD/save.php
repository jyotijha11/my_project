<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login form</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
	<div class="row">
 		<div class="col-sm-6">
 			<img width="90%" src="https://www.oberlo.com/media/1603969791-image-1.jpg">
 		</div>		
	</div>
	<div>
		
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
			 <div class="result">Result should be shown here</div>
			<?php 
				if(isset($_POST['submit']))
				{
					$name = $_POST['name'];
					$phone = $_POST['phone'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					echo "Name:-".$name."<br>";
					echo "Phone:- ".$phone. "<br>";
					echo "email:- ".$email. "<br>";
					echo "address:- ".$address. "<br>";
				}	
			?>

			<form method="post" action="">
				<div id="contact-form" class="form-container" data-form-container>
				<div class="input-container">
					<div class="row">
					<span class="req-input" >
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="My Name."> </span>
						<input type="text" data-min-length="8" placeholder="Name" name="name" value="<?php if(isset($name)){ echo $name; } ?>">
					</span><br>
					</div>
					<div class="row">
						<span class="req-input" >
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Phone Number"> </span>
						<input type="text" data-min-length="8" placeholder="Phone" name="name" value="<?php if(isset($phone)){ echo $phone; } ?>">
					</span><br>
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
					<div class="row submit-row">
					<button type="submit" name="first_form" class="btn btn-block submit-form">Submit</button>
				</div>
				</div>		
			</form>
			</div>
		</div>
	</div>	
</div>		
</body>
</html>