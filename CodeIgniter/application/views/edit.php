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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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

	h3 {
	    text-align: center;
	    background: black;
	    color: white;
	    font-size: 50px;
	}

	        
	      .user-1{
	         color: black;
	      }
	      button#logout-dropdown {
	         float: right;
	    background: black;
	    color: white;
	}
body{
		    
		    background: -webkit-radial-gradient(circle, #1a82f7, #2F2727);

		  /* Firefox 3.6+ */
		    background: -moz-radial-gradient(circle, #1a82f7, #2F2727);

		  /* IE 10 */
		    background: -ms-radial-gradient(circle, #1a82f7, #2F2727);
		    height:600px;
		        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    		font-size: 30px;
    		line-height: 2.428571;
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
<body class="jumbotron" width="100" border="1" cellpadding="10">
 <div class="container jumbotron">
	<div class="row">
		<div class="col-md-12" id="sidebar">
			<div class="list-group rounded-0">
			</div>
			<div class="col-md-12">
			<nav>
				<div class="user-1">
					<h3>Update Account</h3>
				</div>
			</nav>
			<main class="container-fluid">
				<div class="row">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form method="POST" action="<?php echo site_url().'/Registration/edit_user/'.$user_record->id;?>" role="form">
								<div class="form-group">
									<h2></h2>
								</div>
								<div class="form-group" method="POST" action="">
									<label class="control-label" for="signupName">Name</label>
									<input id="signupName"  name="frm[name]" type="text" maxlength="50" class="form-control" value="<?php echo $user_record->name;?>" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="signupEmail">Email</label>
									<input id="signupEmail"  name="frm[email]" type="email" maxlength="50" class="form-control" value="<?php echo $user_record->email;?>" required>
								</div>
								<div class="form-group">
									<label class="control-label" for="signupEmailagain">Address</label>
									<textarea id="signupEmailagain" name="frm[address]" type="text" maxlength="50" class="form-control"required><?php echo $user_record->address;?></textarea> 
								</div>
								<div class="form-group">
									<label class="control-label" for="signupPasswordagain">Contact No.</label>
									<input id="signupPasswordagain"  name="frm[contact]" type="tel" maxlength="25" class="form-control" value="<?php echo $user_record->contact;?>" required>
								</div>
								<div class="form-group">
									<button id="signupSubmit"  name="submit" type="submit" class="btn btn-info btn-block">Save</button>
								</div>
							</form>
						</div>
					</div>
					</div>
				</div>
		  </main>
      </div>
    </div>
  </div>
</body>
</html>>