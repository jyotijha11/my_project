<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Product Registration</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>
	<style type="text/css">
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
	<script type="text/javascript">
		$(function() {
		$('input').floatlabel({labelEndTop:0});
		});
	</script>
</head>
<body>
	<div class="container">
	    <div class="row centered-form">
	    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
	    	<div class="panel panel-default">
	    		<div class="panel-heading">
	    			<?php echo validation_errors(); ?>
			    		<h3 class="panel-title">Please Register Here <small>It's free!</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="" method="POST">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="frm[p_name]" id="p_name" class="form-control input-sm floatlabel" placeholder="Product Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="frm[p_price]" id="p_price" class="form-control input-sm" placeholder="Product Price">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="p_type" id="frm[p_type]" class="form-control input-sm" placeholder="Product Type">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
						    		<div class="form-group">
										<label class="control-label" for="signupEmailagain">Description</label>
										<textarea id="signupEmailagain" name="frm[description]" type="text" maxlength="50" class="form-control" placeholder="Write Some Description Here...."required></textarea> 
									</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
			</div>
		</div>
	</div>
</body>
</html>