<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Account sigin</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/style3.css'; ?>">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login via site</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="yourmail@example.com" name="frm[email]" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="frm[password]" type="password" value="">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" name="submit" type="submit" value="Login">
			    	</fieldset>
			      	</form>
                      <hr/>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>