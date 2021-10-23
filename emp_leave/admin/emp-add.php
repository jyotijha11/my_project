<?php
  include('header.php');
  if(isset($_POST['submit']))
   {
     $username = $_POST['username'];
     $emp_pass = md5($_POST['emp-pass']);
     $emp_name = $_POST['emp-name'];
     $emp_email = $_POST['emp-email'];
     $doj = $_POST['date-of-join'];
     $designation = $_POST['designation'];
     $emp_type = $_POST['emp-type'];
     $update_status = $_POST['update-status'];
     $dob = $_POST['date-of-birth'];
  $flag=0;
   $sql1 = "select username from employees where username = '$username'";
      $res = mysqli_query($conn, $sql1);

      if(mysqli_num_rows($res) > 0)
      {
        $flag=1;
        echo "Username already exists.<br>";
      }
    $sql2 = "select emp_email from employees where emp_email = '$emp_email'";
      $res1 = mysqli_query($conn, $sql2);
      if(mysqli_num_rows($res1 ) > 0)
      {
        $flag=1;
        echo "Email already exists.<br>";
      }
    if($flag==0)
    {
       $sql = "INSERT INTO employees (username, emp_pass, emp_name, date_of_join, designation, emp_type,update_status,date_of_birth) VALUES ('$username', '$emp_pass', '$emp_name', '$doj','$designation', '$emp_type','$update_status','$dob')";
     if (mysqli_query($conn, $sql)) 
     {
        echo "New record created successfully";
     } 
     else 
     {
        echo "Error: " . mysqli_error($conn);
     }
    }
}
?>
                  <section class="row">
                     <div class="col-md-6 col-lg-4">
                        <!-- card -->
                       <!--  <article class="p-4 bg-primary shadow-sm  
                           mb-4">
                           <a href="#" class="d-flex align-items-center">
                              <span class="bi bi-box h5 text-white"></span>
                              <h5 class="ml-2 h5 text-white"></h5>
                           </a>
                        </article> -->
                     </div>   
                  </section>

                   
                  <!--table-section-start--> 
           <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="mb-4 text-center"> <h2> Add Employee   </h2> </div>
  <form action="" method="POST">

    <div class="row">
       <div class="col-sm-6 mb-4">Username
         <input type="text" class="form-control" placeholder="Username" name="username">   
      </div>
      <div class="col-sm-6 mb-4">Employee Password
          <input type="text" class="form-control" placeholder="Employee-Pass" name="emp-pass"> 
      </div>
    </div>

    <div class="row">
       <div class="col-sm-6 mb-4">Employee Name
         <input type="text" class="form-control" placeholder="Employee-Name" name="emp-name">   
      </div>
      <div class="col-sm-6 mb-4">Employee Email
         <input type="email" class="form-control" placeholder="Employee-Email" name="emp-email">   
      </div>
    </div>
    <div class="row">
    <div class="col-sm-6 mb-4">Date Of Join
        <input type="date" class="form-control" placeholder="Date-Of-Join" name=" date-of-join">
    </div>
    <div class="col-sm-6 mb-4">Employee Type
        <input type="text" class="form-control" placeholder="Employee-Type" name="emp-type">
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 mb-4">Designation
         <input type="text" class="form-control" placeholder="Designation" name="designation">
    </div>
    <div class="col-sm-6 mb-4">Update Status
        <input type="date" class="form-control" placeholder="Update-Status" name="update-status">
    </div>
  </div>
   <div class="row">
    <div class="col-sm-6 mb-4">Date of Birth
        <input type="date" class="form-control" placeholder="Date-Of-Birth" name="date-of-birth">
    </div>
  </div>
    <button type="submit" name="submit"class="btn btn-success btn-block"> Save <i class="fa fa-send"></i> </button>
  </form>
  <div class="login-footer">
  </div>
</div>

           </section>

<?php include('footer.php');