<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <style type="text/css">
		form { margin: 0px 10px; }

		h2 {
		margin-top: 2px;
		margin-bottom: 2px;
		}

		.container { max-width: 360px; }

		.divider {
		text-align: center;
		margin-top: 20px;
		margin-bottom: 5px;
		}

		.divider hr {
		margin: 7px 0px;
		width: 35%;
		}

		.left { float: left; }

		.right { float: right; }
		body{
		    
		    background: -webkit-radial-gradient(circle, #1a82f7, #2F2727);

		  /* Firefox 3.6+ */
		    background: -moz-radial-gradient(circle, #1a82f7, #2F2727);

		  /* IE 10 */
		    background: -ms-radial-gradient(circle, #1a82f7, #2F2727);
		    height:600px;
		}

		.centered-form{
			margin-top: 60px;
		}

		.centered-form .panel{
			background: rgba(255, 255, 255, 0.8);
			box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
		}

		label.label-floatlabel {
		    font-weight: bold;
		    color: #46b8da;
		    font-size: 11px;
		}
  </style>
</head>
<body width="100" border="1" cellpadding="10">
<div class="container">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					<?php echo validation_errors(); ?>
					<form method="POST" action="" role="form">
						<div class="form-group">
							<h2>Create account</h2>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupName">Name</label>
							<input id="signupName"  name="frm[name]" type="text" maxlength="50" class="form-control" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmail">Email</label>
							<input id="signupEmail"  name="frm[email]" type="email" maxlength="50" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label class="control-label" for="signupPassword">Password</label>
							<input id="signupPassword"  name="frm[password]" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmailagain">Address</label>
							<textarea id="signupEmailagain" name="frm[address]" type="text" maxlength="50" class="form-control"required></textarea> 
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPasswordagain">Contact No.</label>
							<input id="signupPasswordagain"  name="frm[contact]" type="tel" maxlength="25" class="form-control" required>
						</div>
						<div class="form-group">
							<button id="signupSubmit"  name="submit" type="submit" class="btn btn-info btn-block">Create your account</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>