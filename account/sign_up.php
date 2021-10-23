<?php
require('conn.php');
if(isset($_POST['submit']))
{
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$address = $_POST['address'];
	$states = $_POST['states'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$title = $_POST['title'];
	$company = $_POST['company'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$sql = "INSERT INTO account(f_name,l_name,address,email,states,city,zip, title, company, phone, status) VALUES('$f_name','$l_name','$address','$states','$')";
}
$sql = mysqli_query($conn, "SELECT * FROM states ORDER BY states ASC");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://demo.expertphp.in/js/jquery.js"></script>
	<script type="text/javascript">
	    function getCities(state_id)
         {
            $("#state").show();
            $("#cityDropdown").html('<option>Loading...</option>');
            $.ajax({
               method: "POST",
               url: "getCities.php",
               dataType: "html",
               data: {state: state_id}
            })
               .done(function(data){
               $("#cityDropdown").html(data);
            });
         }    
	</script>
</head>
<body>	
	<div class="container">
		<h1 class="well">Registration Form</h1>
		<div class="col-lg-12 well">
			<div class="row">
				<form method="POST" action="">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" name="f_name" placeholder="Enter First Name Here.." class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" name="l_name" placeholder="Enter Last Name Here.." class="form-control">
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
						</div>	
						<div class="row">
							<div class="form-group" id="state">
				               <label for="state" class="col-sm-2 control-label">State:</label>
				               <div class="col-sm-12">               
				                  <select class="form-control" id="cityDropdown" onChange="getCities(this.value)" name= "states">
				                  </select>
				               </div>
				            </div>
							<div class="form-group" id="city">
				               <label for="city" class="col-sm-2 control-label" name="city">City:</label>
				               <div class="col-sm-12">               
				                  <select class="form-control" id="cityDropdown" onChange="getCities(this.value)">
				                  </select>
				               </div>
				            </div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" name="zip" placeholder="Enter Zip Code Here.." class="form-control">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Title</label>
								<input type="text" name="title" placeholder="Enter Designation Here.." class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Company</label>
								<input type="text" name="company" placeholder="Enter Company Name Here.." class="form-control">
							</div>	
						</div>						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="tel" name="phone" placeholder="Enter Phone Number Here.." class="form-control">
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter Email Address Here.." class="form-control">
					</div>
				</div>
				<div class="d-flex justify-content-center mt-3 login_container">
		 			<input  type="submit" name="submit" class="btn btn-lg btn-info" value='Signup'>
		   		</div>				
			</form> 
			</div>
		</div>
	</div>
</body>
</html>