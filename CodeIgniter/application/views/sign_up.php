<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/style3.css'; ?>">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://demo.expertphp.in/js/jquery.js"></script>
	<script type="text/javascript">

    $(document).ready(function() {
        $('select[name="frm[state]"]').on('change', function() {
            var stateId = $(this).val();
            if(stateId) {
                $.ajax({
                    url: '<?php echo site_url('/getcity/') ?>'+stateId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="frm[city]"]').append('<option value="'+ value.id +'">'+ value.city +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
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
								<input type="text" name="frm[f_name]" placeholder="Enter First Name Here.." class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" name="frm[l_name]" placeholder="Enter Last Name Here.." class="form-control">
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea name="frm[address]" placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>State</label>
								<select name="frm[state]" class="form-control">
				                    <option value="">Select state</option>
				                    <?php
				                        if(!empty($states)){
				                            foreach ($states as $value) {
				                                echo "<option value='".$value->id."'>".$value->state."</option>";
				                            }
				                        }
				                    ?>
				                </select>
							</div>	
							<div class="col-sm-4 form-group">
								<label for="title">Select City:</label>
				                <select name="frm[city]" class="form-control">
				                </select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" name="frm[zip]" placeholder="Enter Zip Code Here.." class="form-control">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Title</label>
								<input type="text" name="frm[title]" placeholder="Enter Designation Here.." class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Company</label>
								<input type="text" name="frm[company]" placeholder="Enter Company Name Here.." class="form-control">
							</div>	
						</div>						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="tel" name="frm[phone]" placeholder="Enter Phone Number Here.." class="form-control">
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" name="frm[email]" placeholder="Enter Email Address Here.." class="form-control">
					</div>	
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="frm[password]" placeholder="Enter Password Here.." class="form-control">
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