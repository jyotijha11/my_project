<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/stylees.css'; ?>">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
 <div class="container">
 <!---heading---->
     <header class="heading">LOGIN</header><hr></hr>
     <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
				<?php if(!empty($this->session->flashdata('message'))){ echo '<div class="alert alert-danger">'.$this->session->flashdata('message').'</div>'; } ?>
	<form  method="POST" action="<?php echo site_url('Card/login'); ?>">
		<div class="row ">
		 <div class="col-sm-12">
		     <div class="row">
			     <div class="col-xs-4">
		             <label class="mail" >Email :</label></div>
			     <div class="col-xs-8"	>	 
			          <input type="email" name="frm[email]"  id="email"placeholder="Enter your email" class="form-control" >
		         </div>
		     </div>
		 </div>
          <div class="col-sm-12">
	        <div class="row">
				<div class="col-xs-4">
				    <label class="pass">Password :</label>
				</div>
				<div class="col-xs-8">
					<input type="password" name="frm[password]" id="password" placeholder="Enter your Password" class="form-control">
				</div>
            </div>
		  </div>
		     <div class="col-sm-12">
		        <input type="submit"  class="btn btn-warning" name="submit" value="Login"/>
		   </div> 
	</div>
	</form>
	 </div>	 
		 		 
		 
</div>

</body>		
</html>
	 
	 