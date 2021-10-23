<?php
  session_start();
  require('conn.php');
  if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
     header('location:emp-login.php');
  }
  else{
   $id = $_SESSION['id'];
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

                  <div class="list-group">
                     <a href="dashboard.php" class="list-group-item list-group-item-action border-0 pl-5">
                           Dashboard 
                        </a>
                        <a href="emp_leave.php" class="list-group-item list-group-item-action border-0 pl-5">
                          Employee Leave
                        </a>
                     </div>
                
               </div>
            </div>
            <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>
            <div class="col-md-8 col-lg-10 ml-md-auto px-0">
               <!-- top nav -->
               <nav class="w-100 bg-primary d-flex px-4 py-2 mb-4 shadow-sm">
                  <center><h1>Employee's  Dashboard</h1></center>
                  <button class="btn py-0 d-lg-none" id="open-sidebar">
                  <span class="bi bi-list text-white h3"></span>
                  </button>
                  <div class="dropdown ml-auto">
                     <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown" aria-expanded="false">
                     <span class="bi bi-person text-white h4"></span>
                     <span class="bi bi-chevron-down ml-1 text-white mb-2 small"></span>
                     </button>
                     <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown">
                        <a class="dropdown-item" href="emp-login.php">Logout</a>
                        <a class="dropdown-item" href="update_user.html">Settings</a>
                     </div>
                  </div>
               </nav>
               <!-- main content -->

               <main class="container-fluid">
                  