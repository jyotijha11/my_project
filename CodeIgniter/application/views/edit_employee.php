<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Apply as a Employee</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/style.css'; ?>">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="container register">
	    <div class="row">
	        <div class="col-md-3 register-left">
	            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
	            <h3>Welcome</h3>
	            <p>You are 30 seconds away from earning your own money!</p>
	            <input type="submit" name="" value="Login"/><br/>
	        </div>
	        <div class="col-md-9 register-right">
	            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
	                <li class="nav-item">
	                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
	                </li>
	            </ul>
	            <div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<?php echo validation_errors(); ?>
				    <h3 class="register-heading">Employee Updating</h3>
	            <form method="POST" action="<?php echo site_url().'/apply/edit_employees/'.$user_list->id;?>">
				    <div class="row register-form">
				        <div class="col-md-6">
				            <div class="form-group">
				                <input type="text" class="form-control" placeholder="First Name *" name="frm[f_name]" value="<?php echo $user_list->f_name;?>" />
				            </div>
				            <div class="form-group">
				                <input type="text" class="form-control" placeholder="Last Name *"  name="frm[l_name]" value="<?php echo $user_list->l_name;?>"/>
				            </div>
				            </div>
				        	<div class="col-md-6">
				            <div class="form-group">
				                <input type="email" class="form-control" placeholder="Your Email *" name="frm[email]" value="<?php echo $user_list->email;?>" />
				            </div>
				            <div class="form-group">
				                <input type="tel" minlength="10" maxlength="10" name="frm[phone]" class="form-control" placeholder="Your Phone *" value="<?php echo $user_list->phone;?>" />
				            </div>
				            <div class="form-group">
				                <input type="date" minlength="10" maxlength="10" class="form-control" placeholder="Your date of birth *" name="frm[dob]" value="<?php echo $user_list->dob;?>"/>
				            </div>
				            <div class="form-group">
				                <input type="Number" class="form-control" placeholder="Your Experience *" name="frm[experience]" value="<?php echo $user_list->experience;?>"/>
				            </div>
				            <input type="submit" class="btnRegister" name="submit" value="Update"/>
				        </div>
				    </div>
	   			 </form>
				</div>
	        </div>
	    </div>
	</div>
</body>
</html>