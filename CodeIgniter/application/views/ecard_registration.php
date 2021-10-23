
<!------ Include the above in your HEAD tag ---------->

<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/style1.css'; ?>">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
 <div class="container">
 <!---heading---->
      <header class="heading"> Registration-Form</header><hr></hr>
	<!---Form starting----> 
	<?php echo validation_errors(); ?>
	<form  method="POST" action="">
		<div class="row ">
		<!--- For Name---->
		<div class="col-sm-12">
		 <div class="row">
		     <div class="col-xs-4">
			         <label class="firstname">First Name :</label> </div>
		     <div class="col-xs-8">
		         <input type="text" name="frm[fname]" id="fname" placeholder="Enter your First Name" class="form-control ">
		 </div>
		  </div>
		</div>


		<div class="col-sm-12">
		 <div class="row">
		     <div class="col-xs-4">
		         <label class="lastname">Last Name :</label></div>
			<div class ="col-xs-8">	 
		         <input type="text" name="frm[lname]" id="lname" placeholder="Enter your Last Name" class="form-control last">
		    </div>
		 </div>
		</div>
		<!-----For email---->
		<div class="col-sm-12">
		 <div class="row">
		     <div class="col-xs-4">
		         <label class="mail" >Email :</label></div>
		     <div class="col-xs-8"	>	 
		          <input type="email" name="frm[email]"  id="email"placeholder="Enter your email" class="form-control" >
		     </div>
		 </div>
		</div>
		<!-----For Password and confirm password---->
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

		<!-----------For Phone number-------->
		<div class="col-sm-12">
		 <div class ="row">
		     <div class="col-xs-4 ">
		       <label class="gender">Gender:</label>
			 </div>
		 
		     <div class="col-xs-4 male">	 
			     <input type="radio" name="frm[gender]"  id="gender" value="boy">Male</input>
			 </div>
			 
			 <div class="col-xs-4 female">
			     <input type="radio"  name="frm[gender]" id="gender" value="girl" >Female</input>
		     </div>

			 </div>
		<div class="col-sm-12">
		   <input type="submit"  class="btn btn-warning" name="submit" value="Register"/>
		</div>
	</form>
	<div>
</div>
</div>
</body>		
</html>
	 
	 