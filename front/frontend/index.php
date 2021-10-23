<?php
require('conn.php');
$sql = mysqli_query($conn, "SELECT * FROM country ORDER BY country ASC");
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Front</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link href="style.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="styles.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script>
         function getStates(country_id)
         {
            $("#state").show();
            $("#stateDropdown").html('<option>Loading...</option>');
            $.ajax({
               method: "POST",
               url: "getStates.php",
               dataType: "html",
               data: {country: country_id}
            })
               .done(function(data){
               $("#stateDropdown").html(data);
            });
         }  
      
         function getDistricts(state_id)
         {
            $("#district").show();
            $("#districtDropdown").html('<option>Loading...</option>');
            $.ajax({
               method: "POST",
               url: "getDistricts.php",
               dataType: "html",
               data: {state: state_id}
            })
               .done(function(data){
               $("#districtDropdown").html(data);
            });
         }  
      
         function getCities(district_id)
         {
            $("#state").show();
            $("#cityDropdown").html('<option>Loading...</option>');
            $.ajax({
               method: "POST",
               url: "getCities.php",
               dataType: "html",
               data: {district: district_id}
            })
               .done(function(data){
               $("#cityDropdown").html(data);
            });
         }  
      </script>
      <style type="text/css">

         form 
        {
         height: 80%;
         color: lightgrey;
         background-color: #659bbf75;
         text-align: center;
         margin: 49px auto;
         padding: 3px 21px;
         width: 54%;
         font-weight: 900;
         text-transform: uppercase
        }
        .form-content .form-items 
        {
        border: 2px solid #fff;
        padding: 1px;
        display: inline-block;
        width: 50%;
        min-width: 100px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        text-align: center;
        -webkit-transition: all 0.4s ease;
        margin: 10px auto;
       }
      </style>
   </head>
   <body>
      <div class="container">
         <form class="form-horizontal">
            <div class="form-group">
               <label for="country" class="col-sm-2 control-label">Country:</label>
               <div class="col-sm-12">
                  <select class="form-control" id="country" onChange="getStates(this.value)">
                     <option value="">Select Country</option>
                     <?php
                     while($country = mysqli_fetch_array($sql)){
                        echo "<option value='" . $country['id'] . "'>" . $country['country'] . "</option>";
                     }
                     ?>
                  </select>
               </div>
            </div>
           <div class="form-group" id="state">
               <label for="state" class="col-sm-2 control-label">State:</label>
               <div class="col-sm-12">               
                  <select class="form-control" id="stateDropdown" onChange="getDistricts(this.value)">
                  </select>
               </div>
            </div>
             <div class="form-group" id="district">
               <label for="district" class="col-sm-2 control-label">district:</label>
               <div class="col-sm-12">               
                  <select class="form-control" id="districtDropdown" onChange="getCities(this.value)">
                  </select>
               </div>
            </div>
            <div class="form-group" id="city">
               <label for="city" class="col-sm-2 control-label">City:</label>
               <div class="col-sm-12">               
                  <select class="form-control" id="cityDropdown" onChange="getDistricts(this.value)">
                  </select>
               </div>
            </div>
            </div>
         </form>
      </div>
   </body>
</html>