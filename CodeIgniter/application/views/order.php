<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Order Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/styles1.css'; ?>">
<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js'></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('select[name="frm[country]"]').on('change', function() {
            var countryId = $(this).val();
            if(countryId) {
                $.ajax({
                    url: '<?php echo site_url('/getstates/') ?>'+countryId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="states"]').empty();
                        $.each(data, function(key, value) {
                        	//$('select[name="frm[states]"]').empty();
                            $('select[name="frm[states]"]').append('<option value="'+ value.id +'">'+ value.states +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="states"]').empty();
            }
        });
    });
</script>
</head>
<body>
<div class="row">
<div class="form-holder">
<div class="form-content">
<div class="form-items">
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
                <div class="card-body p-4 p-md-5">
                    <h3>Order</h3>
                    <form action="" method="POST" >
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" style="margin: 0px;height: 50px;width: 550px;    background-color: #265a2c57; color: #ffffff;" name="frm[name]" required>
                        </div><br>
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="text" class="form-control" style="margin: 0px;height: 50px;width: 550px;    background-color: #265a2c57; color: #ffffff;" name="frm[email]" required>
                        </div><br><br>
                        <div class="form-group" class="control-label">
                            <label for="address">Address</label>
                            <textarea class="form-control" style="margin: 1px;height: 100px;width: 550px;    border-radius: 42px;background-color: #265a2c57; color: #ffffff;" name="frm[address]" required></textarea>
                        </div>
                <div class="form-group">
                    <label>country</label>
						<select name="frm[country]" style="margin: 3px;height: 50px;width: 550px;  color: #ffffff;  background-color: #265a2c57;" class="form-control">
		                    <option value="">Select country</option>
		                    <?php
		                        if(!empty($country)){
		                            foreach ($country as $value) {
		                                echo "<option value='".$value->id."'>".$value->country."</option>";
		                            }
		                        }
		                    ?>
		                </select>
                    </div>
                    <div class="form-group" id="state">
                        <label for="title">Select State:</label>
				         <select name="frm[states]" style="margin: 3px;height: 50px;width: 550px;  color: #ffffff;  background-color: #265a2c57;" class="form-control">
				                </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="control-label">Quantity</label>
                        <input type="number" style="margin: 3px; border-radius: 42px; height: 50px;width: 550px; color: #ffffff;   background-color: #265a2c57;" class="form-control" name="frm[quantity]" required>
                    </div>
                     <input type="submit" name="submit" class="btn btn-info" value="Submit" style="background-color: #34d3ecd9; padding: 4px 16px; font-size: 15px; border-radius: 10px;">
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>