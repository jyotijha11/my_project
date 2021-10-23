<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Order List </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
h3 {
   text-align: center;
   background: -webkit-linear-gradient(left, #000000, #545b62);
   color: white;
   font-size: 40px;
   }
.user-1{
   color: whitesmoke;
   }
   button#logout-dropdown {
   float: right;
   background: black;
   color: white;
   }
table.dataTable tbody th, table.dataTable tbody td {
   padding: 15px 10px;
   }
.bg-white {
   background-color: #04040466!important;
   color: whitesmoke;
   }
html, body {
   background-image: url('https://www.adweek.com/wp-content/uploads/2020/03/behr-zoom-background-feature-2020.jpg');
   background-size: cover; 
   background-repeat: no-repeat; 
   height: 120%;
   }
.centered-form{
   margin-top: 60px;
   }
.centered-form .panel{
   background: rgba(255, 255, 255, 0.8);
   box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
   }

label.label-floatlabel {
   font-weight: bold;
   color: #46b8da;
   font-size: 11px;
   }
.jumbotron {
   padding: 2rem 1rem;
   margin-bottom: 2rem;
   background-color: #7e8a96c2;
   border-radius: .3rem;
   }
</style>
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
                     <div class="user-1">
                  <h3>Order List</h3>
                  </div>
            </nav>
        <main class="container-fluid">
            <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4" style=" background: Gray;">
                  <table width="900" class="table" border="6">
                     <tr>
                       <th>Sr No</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Address</th>
                       <th>Country</th>
                       <th>state</th>
                       <th>Quantity</th>
                       <th>Status</th>
                     </tr>
                     <?php
                        $i = 1;
                        foreach ($order_list as $list)
                         {
                            if($list->status==0){
                            $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Orders/approve/'.$list->id.'"> Approve</a>';
                            }
                            else
                            {
                               $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Orders/disapprove/'.$list->id.'">Disapprove </a>';
                            }
                             if($list->status==1){
                                $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Orders/disapprove/'.$list->id.'">Disapprove </a>';
                            }
                            else
                            {
                                 $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Orders/approve/'.$list->id.'"> Approve</a>';
                            }  
                           echo "<tr>";
                           echo "<td>".$list->id."</td>";
                           echo "<td>".$list->name."</td>";
                           echo "<td>".$list->email."</td>";
                           echo "<td>".$list->address."</td>";
                           echo "<td>".$list->country."</td>";
                           echo "<td>".$list->states."</td>";
                           echo "<td>".$list->quantity."</td>";
                           echo "<td>".$status."</td>";
                           echo "</tr>";
                        $i++;
                       }
                     ?>
                  </table>

                </div>

              </div>

           </section>
               </main>
            </div>
         </div>
      </div>
   </body>
</html>
