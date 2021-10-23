<?php
  session_start();
  require('conn.php');
  if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
      header("location:index.php");
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

      <!-- Datatable Jquery/CSS -->
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#users').DataTable();
});
</script>

   </head>
   <body>
      <div class="container-fluid">
         <div class="row">
            <!-- sidebar -->
            <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
               <h3 class="dash_logo"> 
                <a href="dashboard.html"> <i class="fa fa-dashboard"></i> Dashboard </a> 
              </h3>
               <div class="list-group rounded-0">


                 <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#user-collapse">
                     <div>
                        <span class="bi bi-person"></span>
                        <span class="ml-2"> User </span>
                     </div>
                     <span class="bi bi-chevron-down small"></span>
                  </button>
                  <div class="collapse" id="user-collapse" data-parent="#sidebar">
                     <div class="list-group">
                        <a href="add_user.html" class="list-group-item list-group-item-action border-0 pl-5">
                           Add Users 
                        </a>
                     </div>
                  </div>
                 
                  <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
                  <span class="bi bi-box"></span>
                  <span class="ml-2">Products</span>
                  </a>

                  <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#sale-collapse">
                     <div>
                        <span class="bi bi-cart-dash"></span>
                        <span class="ml-2">Sales</span>
                     </div>
                     <span class="bi bi-chevron-down small"></span>
                  </button>
                  <div class="collapse" id="sale-collapse" data-parent="#sidebar">
                     <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Customers</a>
                        <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Sale Orders</a>
                     </div>
                  </div>

                  <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#purchase-collapse">
                     <div>
                        <span class="bi bi-cart-plus"></span>
                        <span class="ml-2">Purchase</span>
                     </div>
                     <span class="bi bi-chevron-down small"></span>
                  </button>
                  <div class="collapse" id="purchase-collapse" data-parent="#sidebar">
                     <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Sellers</a>
                        <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Purchase Orders</a>
                     </div>
                  </div>
               </div>
            </div>

            <!-- overlay to close sidebar on small screens -->
            <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>
            <!-- note: in the layout margin auto is the key as sidebar is fixed -->
            <div class="col-md-9 col-lg-10 ml-md-auto px-0">
               <!-- top nav -->
               <nav class="w-100 bg-primary d-flex px-4 py-2 mb-4 shadow-sm">
                  <!-- close sidebar -->
                  <button class="btn py-0 d-lg-none" id="open-sidebar">
                  <span class="bi bi-list text-white h3"></span>
                  </button>
                  <div class="dropdown ml-auto">
                     <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown" aria-expanded="false">
                     <span class="bi bi-person text-white h4"></span>
                     <span class="bi bi-chevron-down ml-1 text-white mb-2 small"></span>
                     </button>
                     <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown">
                        <a class="dropdown-item" href="index.php">Logout</a>
                        <a class="dropdown-item" href="update_user.html">Settings</a>
                     </div>
                  </div>
               </nav>
               <!-- main content -->

               <main class="container-fluid">
                  
                  <!--table-section-start--> 
           <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4">
                  <?php 
                     $sql = "SELECT * FROM student_registration";
                     $result = mysqli_query($conn, $sql);
                     $arr_users = array();
                     while ($row = mysqli_fetch_assoc($result)) {
                         $arr_users[] = $row;
                     }  
                  ?>
                  <table id="users">
                      <thead>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Mobile</th>
                          <th>Email</th>
                      </thead>
                      <tbody>
                          <?php if(!empty($arr_users)) { ?>
                              <?php foreach($arr_users as $user) { ?>
                                  <tr>
                                      <td><?php echo $user['first_name']; ?></td>
                                      <td><?php echo $user['last_name']; ?></td>
                                      <td><?php echo $user['mobile']; ?></td>
                                      <td><?php echo $user['email']; ?></td>
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