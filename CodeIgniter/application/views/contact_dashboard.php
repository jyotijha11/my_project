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
table[Attributes] {
    width: 500px;
    border-top-width: 10px;
    border-right-width: 10px;
    border-bottom-width: 10px;
    border-left-width: 10px;
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
      .jumbotron {
    padding:0px;
    margin-bottom: 30px;
    margin-top: -5px;
    font-size: 21px;
    font-weight: 200;
    line-height: 2.1428571435;
    color: inherit;
    background-color: #eee;
}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 10px;
    color: #d6e9c6;
    line-height: 1.428571429;
    vertical-align: top;
    border-top: 1px solid #fff;
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
                  <h3>Contact Dashboard</h3>
                  </div>
            </nav>
        <main class="container-fluid">
            <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4" style=" background: #9a010169;">
                  <table width="800" class="table" border="6">
                     <tr>
                       <th>Sr No</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>Email</th>
                       <th>Mobile</th>
                       <th>Address</th>
                       <th>Status</th>
                       <th>Action</th>
                     </tr>
                     <?php
                        $i = 1;
                        foreach ($record as $contact)
                         {
                            if($contact->status==0){
                            $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/contact/approve/'.$contact->id.'"> Approve</a>';
                            }
                            else
                            {
                               $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/contact/disapprove/'.$contact->id.'">Disapprove </a>';
                            }
                             if($contact->status==1){
                                $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/contact/disapprove/'.$contact->id.'">Disapprove </a>';
                            }
                            else
                            {
                                 $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/contact/approve/'.$contact->id.'"> Approve</a>';
                            }  
                            
                           echo "<tr>";
                           echo "<td>".$contact->id."</td>";
                           echo "<td>".$contact->fname."</td>";
                           echo "<td>".$contact->lname."</td>";
                           echo "<td>".$contact->email."</td>";
                           echo "<td>".$contact->mobile."</td>";
                           echo "<td>".$contact->address."</td>";
                           echo "<td>".$status."</td>";
                           echo "<td>
                           <a class='btn btn-sm btn-success' href='".site_url()."/contact/getListById/".$contact->id."'>Edit</a><br>  
                           <a class='btn btn-sm btn-danger' href='".site_url()."/contact/deleteListById/".$contact->id."'>Delete</a></td>";
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
