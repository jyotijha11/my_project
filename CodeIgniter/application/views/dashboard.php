<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 15px 10px;
}
body{
          
          background: -webkit-radial-gradient(circle, #1a82f7, #2F2727);

        /* Firefox 3.6+ */
          background: -moz-radial-gradient(circle, #1a82f7, #2F2727);

        /* IE 10 */
          background: -ms-radial-gradient(circle, #1a82f7, #2F2727);
          height:600px;
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
</style>
<!-- <script>
$(document).ready(function() 
{
    $('#users').DataTable();
    $("#logout-dropdown").click(function(){
      $(".dropdown-menu").slideToggle();
    })
});
       
</script>
 -->   </head>
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
                  <h3>Dashboard</h3>
                  </div>
            </nav>
        <main class="container-fluid">
            <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4" style=" background: Gray;">
                  <table width="300" class="table" border="1">
                     <tr>
                       <th>Sr No</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Address</th>
                       <th>Contact No.</th>
                       
                       <th>Action</th>
                     </tr>
                     <?php
                        $i = 1;
                        foreach ($record as $result)
                         {
                           echo "<tr>";
                           echo "<td>".$result->id."</td>";
                           echo "<td>".$result->name."</td>";
                           echo "<td>".$result->email."</td>";
                           echo "<td>".$result->address."</td>";
                           echo "<td>".$result->contact."</td>";

                           echo "<td>
                           <a class='btn btn-sm btn-success' href='".site_url()."/Registration/getrecordbyid/".$result->id."'>Edit</a>   
                           <a class='btn btn-sm btn-danger' href='".site_url()."/registration/deleteRecordById/".$result->id."'>Delete</a></td>";
                           echo "</tr>";
                        $i++;
                       }
                     ?>
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
