<?php
  session_start();
  require('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Payment Detalis </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

<!-- Datatable Jquery/CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<style type="text/css">
html, body 
        {
        height: 100%;
        background-color: #152733;
        text-align: center;
        background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
        }
        .form-content .form-items 
        {
        border: 3px solid #fff;
        padding: 5px;
        display: inline-block;
        width: 50%;
        min-width: 540px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        text-align: left;
        -webkit-transition: all 0.4s ease;
       }
</style>
<script>
$(document).ready(function() {
$('#users').DataTable();
});
</script>
</head>
<body>
      <div class="container-fluid">
         <div class="row">
            <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <a class="navbar-brand" href="logout.php">Admin Logout</a>
        </div>
      </div>
      <div class="row">
            <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <a class="navbar-brand" href="check_out.php">Check Out</a>
        </div>
      </div>
    </nav>
        <main class="container-fluid"> 
           <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4">
                   <?php
                      $sql = "SELECT * FROM report_front";
                       $result = mysqli_query($conn, $sql);
                       $arr_users = array();
                        while ($row = mysqli_fetch_assoc($result)) 
                       {
                           $arr_users[] = $row;  
                       }
                         
                  ?>
                  <table id="users">
                      <thead>
                          <th>S.No</th>
                          <th>Image</th>
                          <th>Client Name</th>
                          <th>Client Address</th>
                          <th>Occupier Name</th>
                          <th>Occupier Numper</th>
                          <th>Landload Name</th>
                          <th>Landload Numper</th>
                          <th>Date</th>
                          <th>Property Address</th>
                      </thead>
                      <tbody>
                          <?php if(!empty($arr_users)) { ?>
                              <?php foreach($arr_users as $user) { ?>
                                  <tr>

                                      <td><?php echo $user['id']; ?></td>
                                      <td><img src="upload.php/<?php echo $user['id'];?>"style="height: 160px;">  </td>
                                      <td><?php echo $user['client_name']; ?></td>
                                      <td><?php echo $user['client_address']; ?></td>
                                      <td><?php echo $user['occupier_name']; ?></td>
                                      <td><?php echo $user['occupier_number']; ?></td>
                                      <td><?php echo $user['landloard_name']; ?></td>
                                      <td><?php echo $user['landloard_number']; ?></td>
                                      <td><?php echo $user['report_date']; ?></td>
                                      <td><?php echo $user['property_address']; ?></td>
                                  </tr>
                              <?php } ?>
                          <?php } ?>
                      </tbody>
                  </table>

                </div>

              </div>

           </section>
   <!--end-table-section-start--> 

               </main>
            </div>
         </div>
      </div>
   </body>
</html>






