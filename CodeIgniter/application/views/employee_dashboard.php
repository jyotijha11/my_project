<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Dashboard </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
    <title>Apply as a Employee</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/style.css'; ?>"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
    body{

    }
    h3 {
    text-align: center;
    background: -webkit-linear-gradient(left, #9c31af, #dc354587);
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
          
             background: -webkit-radial-gradient(circle, #dc3545, #212529);

        /* Firefox 3.6+ */
         background: -webkit-radial-gradient(circle, #dc3545, #212529);

        /* IE 10 */
              background: -webkit-radial-gradient(circle, #dc3545, #212529);
          height:1000px;
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
    background-color: rgb(158 33 131 / 42%);
    border-radius: .3rem;
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
                  <h3>Employee Dashboard</h3>
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
                       <th>Phone</th>
                       <th>Gender</th>
                       <th>Date of Birth</th>
                       <th>Experience</th>
                       <th>Status</th>
                       <th>Action</th>
                     </tr>
                     <?php
                        $i = 1;
                        foreach ($list as $emp)
                         {
                            if($emp->status==0){
                            $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Apply/approve/'.$emp->id.'"> Approve</a>';
                            }
                            else
                            {
                               $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Apply/disapprove/'.$emp->id.'">Disapprove </a>';
                            }
                             if($emp->status==1){
                                $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Apply/disapprove/'.$emp->id.'">Disapprove </a>';
                            }
                            else
                            {
                                 $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Apply/approve/'.$emp->id.'"> Approve</a>';
                            }  
                           echo "<tr>";
                           echo "<td>".$emp->id."</td>";
                           echo "<td>".$emp->f_name."</td>";
                           echo "<td>".$emp->l_name."</td>";
                           echo "<td>".$emp->email."</td>";
                           echo "<td>".$emp->phone."</td>";
                           echo "<td>".$emp->gender."</td>";
                           echo "<td>".$emp->dob."</td>";
                           echo "<td>".$emp->experience."</td>";
                           echo "<td>".$status."</td>";
                           echo "<td>
                           <a class='btn btn-sm btn-success' href='".site_url()."/Apply/getListById/".$emp->id."'>Edit</a><br>  
                           <a class='btn btn-sm btn-danger' href='".site_url()."/Apply/deleteListById/".$emp->id."'>Delete</a></td>";
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
