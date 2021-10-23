<?php 
require('conn.php');
if(isset($_POST['submit']))
{
     $name = $_POST['name'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $quantity = $_POST['quantity'];
     $country = $_POST['country'];
     $state = $_POST['state'];
     
    $sql = "INSERT INTO user(name,email,address,quantity,country,state) VALUES ( '$name','$email','$address','$quantity','$country','$state')";
    if (mysqli_query($conn, $sql)) 
     {
      
        echo "Data inserted successfully";
        
        
     } 
     else 
     {
        echo "Error: " . mysqli_error($conn);
     }
 }
$sql2 = mysqli_query($conn, "SELECT * FROM country ORDER BY country_name ASC");
//echo "SELECT * FROM country ORDER BY country_name ASC";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Order Form</title>
<link rel="stylesheet" href="styles.css">
<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js'></script>
<script>
 function getstates(country_id){
    $("#state").show();
    $("#stateDropdown").html('<option>Loading...</option>');
    $.ajax({
       method: "POST",
       url: "getstates.php",
       dataType: "html",
       data: {country: country_id}
    })
       .done(function(data){
       $("#stateDropdown").html(data);
    });
 }  
</script>  
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
                            <label for="name" class="control-label">name</label>
                            <input type="text" class="form-control" style="margin: 0px;height: 50px;width: 613px;" name="name" required>
                        </div><br>
                        <div class="form-group">
                            <label for="email" class="control-label">email</label>
                            <input type="text" class="form-control" style="margin: 0px;height: 50px;width: 613px;" name="email" required>
                        </div><br><br>
                        <div class="form-group" class="control-label">
                            <label for="address">address</label>
                            <textarea class="form-control" style="margin: 1px;height: 178px;width: 613px;" name="address" required></textarea>
                        </div>
                <div class="form-group">
                    <label for="country" class="col-sm-2 control-label">Country:</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="country"id="country" onChange="getstates(this.value)">
                         <option value="">Select Country</option>
                         <?php
                         while($country = mysqli_fetch_array($sql2)){
                            echo "<option value='" . $country['id'] . "'>" . $country['country_name'] . "</option>";
                         }
                         ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group" id="state">
                        <label for="state" class="col-sm-2 control-label">State:</label>
                        <div class="col-sm-4">               
                         <select class="form-control" name="state" id="stateDropdown">
                        </select>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="quantity" class="control-label">Quantity</label>
                            <input type="number" style="margin: 3px;height: 50px;width: 613px;" class="form-control" name="quantity" required>
                        </div>
                        
                         <button  type="submit" name="submit" class="btn btn-primary" value="submit">Submit</button>
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