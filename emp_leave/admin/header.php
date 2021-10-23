<?php
  session_start();
  require('conn.php');
  if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
     header('loction:admin-login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Dashboard </title>
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
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() 
{
    $('#emp').DataTable();
});
</script>
   </head>
   <body>
      <div class="container-fluid">
         <div class="row">
            <!-- sidebar -->
            <div class="col-md-4 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
               
               <div class="list-group rounded-0">
                  <nav class="w-100 bg-secondary d-flex px-4 py-2 mb-4 shadow-sm">
                  <div class="list-group">
                     <a href="dashboard.php" class="list-group-item list-group-item-action bg-secondary border-0 pl-5">
                           <h5 style="color: pink;">Option</h5>
                        </a>
                        <a href="add_country.php" class="list-group-item list-group-item-action bg-secondary border-0 pl-5">
                           <h5 style="color: pink;">Add Country</h5> 
                        </a>
                        <a href="add_state.php" class="list-group-item list-group-item-action bg-secondary border-0 pl-5">
                          <h5 style="color: pink;">Add State</h5>
                        </a>
                        <a href="add_dirict.php" class="list-group-item list-group-item-action bg-secondary border-0 pl-5">
                           <h5 style="color: pink;">Add Didtrict </h5>
                        </a>
                        <a href="add_dirict.php" class="list-group-item list-group-item-action bg-secondary border-0 pl-5">
                           <h5 style="color: pink;">Add City </h5>
                        </a>
                     </div>
                  </div>
            </div>
            </nav>
            <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>
            <div class="col-md-8 col-lg-10 ml-md-auto px-0">
               <!-- top nav -->
            <nav class="navbar navbar-inverse">
            <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="location.php">Home</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="location.php">Country</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="stte_dashboard.php">State<span class="caret"></span></a>
            <li><a href="district_dashbord.php">District</a></li>
            <li><a href="city_dashboard.php">City</a></li>
            <!-- <li><a href="scheduled.php">Scheduled Booking</a></li> -->
            </ul>
            </li>
            </ul>
            </nav>
               <!-- main content -->

               <main class="container-fluid">
                  