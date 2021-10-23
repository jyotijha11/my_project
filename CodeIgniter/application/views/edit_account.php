<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/style3.css'; ?>">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
								<input type="text" name="frm[f_name]" placeholder="Enter First Name Here.." class="form-control" value="<?php echo $user_record->f_name;?>">
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" name="frm[l_name]" placeholder="Enter Last Name Here.." class="form-control" value="<?php echo $user_record->l_name;?>">
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea name="frm[address]" placeholder="Enter Address Here.." rows="3" class="form-control" value="<?php echo $user_record->address;?>"></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<select  name="frm[city]" class="form-control" id="city" value="<?php echo $user_record->city;?>">
								  <option value=" ">Select City</option>
								  <option value="Bokaro">Bokaro</option>
								  <option value="Gaya">Gaya</option>
								  <option value="Dhanbad">Dhanbad</option>
								  <option value="Darbhanga">Darbhanga</option>
								</select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>State</label>
								<label>City</label>
								<select  name="frm[state]" class="form-control" id="state" value="<?php echo $user_record->state;?>">
								  <option value=" ">Select State</option>
								  <option value="Jharkhand">Jharkhand</option>
								  <option value="Bihar">Bihar</option>
								</select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" name="frm[zip]" placeholder="Enter Zip Code Here.." class="form-control" value="<?php echo $user_record->zip;?>">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Title</label>
								<input type="text" name="frm[title]" placeholder="Enter Designation Here.." class="form-control" value="<?php echo $user_record->title;?>">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Company</label>
								<input type="text" name="frm[company]" placeholder="Enter Company Name Here.." class="form-control" value="<?php echo $user_record->company;?>">
							</div>	
						</div>						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="tel" name="frm[phone]" placeholder="Enter Phone Number Here.." class="form-control" value="<?php echo $user_record->phone;?>">
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" name="frm[email]" placeholder="Enter Email Address Here.." class="form-control" value="<?php echo $user_record->email;?>">
					</div>	
				</div>
				<div class="d-flex justify-content-center mt-3 login_container">
		 			<input  type="submit" name="submit" class="btn btn-lg btn-info" value='Save'>
		   		</div>				
			</form> 
			</div>
		</div>
	</div>
</body>
</html>