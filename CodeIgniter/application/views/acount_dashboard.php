<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Account Dashboard </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/style1.css'; ?>"> -->
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
    background-color: #ca16b366!important;
    color: whitesmoke;
}
/*body{
          
             background: -webkit-radial-gradient(circle, #dc3545, #212529);
         background: -webkit-radial-gradient(circle, #dc3545, #212529);
              background: -webkit-radial-gradient(circle, #dc3545, #212529);
          height:1000px;
      }*/
html, body {
     background-image: url('https://wallpapercave.com/wp/7INjqUa.jpg');
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
    background-color: rgb(158 33 131 / 42%);
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
                  <h3>Account Dashboard</h3>
                  </div>
            </nav>
        <main class="container-fluid">
            <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4" style=" background: Gray;">
                  <table width="900" class="table" border="6">
                     <tr>
                       <th>Sr No</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Address</th>
                       <th>Satet</th>
                       <th>City</th>
                       <th>Zip Code</th>
                       <th>Company</th>
                       <th>Title</th>
                       <th>Status</th>
                     </tr>
                     <?php
                        $i = 1;
                        foreach ($list as $act)
                         {
                            if($act->status==0){
                            $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Account/approve/'.$act->id.'"> Approve</a>';
                            }
                            else
                            {
                               $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Account/disapprove/'.$act->id.'">Disapprove </a>';
                            }
                             if($act->status==1){
                                $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Account/disapprove/'.$act->id.'">Disapprove </a>';
                            }
                            else
                            {
                                 $status = '<a class="btn btn-sm btn-info" href="'.site_url().'/Account/approve/'.$act->id.'"> Approve</a>';
                            }  
                           echo "<tr>";
                           echo "<td>".$act->id."</td>";
                           echo "<td>".$act->f_name."</td>";
                           echo "<td>".$act->l_name."</td>";
                           echo "<td>".$act->email."</td>";
                           echo "<td>".$act->phone."</td>";
                           echo "<td>".$act->address."</td>";
                           echo "<td>".$act->state."</td>";
                           echo "<td>".$act->city."</td>";
                           echo "<td>".$act->zip."</td>";
                           echo "<td>".$act->company."</td>";
                           echo "<td>".$act->title."</td>";
                           echo "<td>".$status."</td>";
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
