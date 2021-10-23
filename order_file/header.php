<?php
  session_start();
  require('conn.php');
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
<style type="text/css">
body{

}
h3 {
    text-align: center;
    background: black;
    color: white;
    font-size: 40px;
}

        
      .user-1{
         color: black;
      }
      button#logout-dropdown {
         float: right;
    background: black;
    color: white;
}
      </style>
<script>
$(document).ready(function() 
{
    $('#users').DataTable();
    $("#logout-dropdown").click(function(){
      $(".dropdown-menu").slideToggle();
    })
});
       
</script>
   </head>
   <body class="jumbotron">
      <div class="container jumbotron">
         <div class="row">
            <!-- sidebar -->
            <div class="col-md-12" id="sidebar">
               
               <div class="list-group rounded-0">
            </div>
            
            <div class="col-md-12">
               <!-- top nav -->
            <nav>
                   <a href="order_dashboard.php">
                     <div class="user-1">
                  <h3>Order List</h3>
                  <div class="dropdown ml-auto">
                     <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown" aria-expanded="false">
                     <span class="bi bi-person text-white h4"></span>
                     <span class="bi bi-chevron-down ml-1 text-white mb-2 small"></span>
                     </button>
                     <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown" style="margin-top: 38px;">
                        <a class="dropdown-item" href="login.php">Logout</a>
                     </div>
                  </div>
                  </div>
            </nav>
<!-- main content -->

<main class="container-fluid">
                  