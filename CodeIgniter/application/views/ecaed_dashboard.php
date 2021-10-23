<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <title> Dashboard </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/style1.css'; ?>">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
    body{

    }
    h3 {
        text-align: center;
        /*background: -webkit-linear-gradient(left, #3931af, #00c6ff);*/
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
                  <h3>Ecard Dashboard</h3>
                  </div>
            </nav>
        <main class="container-fluid">
            <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4" style=" background: Gray;">
                  <table width="500" class="table" border="6">
                     <tr>
                       <th>Sr No</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>Email</th>
                       <th>Gender</th>
                     </tr>
                     <?php
                        $i = 1;
                        foreach ($list as $ecard)
                         {
                           echo "<tr>";
                           echo "<td>".$ecard->id."</td>";
                           echo "<td>".$ecard->fname."</td>";
                           echo "<td>".$ecard->lname."</td>";
                           echo "<td>".$ecard->email."</td>";
                           echo "<td>".$ecard->gender."</td>";
                           // echo "<td>
                           // <a class='btn btn-sm btn-success' href='".site_url()."/Apply/getListById/".$ecard->id."'>Edit</a><br>  
                           // <a class='btn btn-sm btn-danger' href='".site_url()."/Apply/deleteListById/".$ecard->id."'>Delete</a></td>";
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
