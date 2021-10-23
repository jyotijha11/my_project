<?php include('header.php'); ?>
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
                <div class="table-responsive bg-white p-4">
                  
                    <?php

                       $sql = "SELECT * FROM employees";
                       $result = mysqli_query($conn, $sql);

                       $arr_emp = array();
                       
                       while ($row = mysqli_fetch_assoc($result)) 
                       {
                           $arr_emp[] = $row;  
                       }  
                  ?>
            <table id="emp">
                <thead>
                    <th>S.No</th>
                    <th>Username</th>
                    <th>Employee Password</th>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Date_Of_Join </th>
                    <th>Designation </th>
                    <th>Emp_Type </th>
                    <th>Update_Status </th>
                    <th>Date_Of_Birth </th>
                     <th>Action </th>
                   
                </thead>
                <tbody>
                    <?php if(!empty($arr_emp)) { ?>
                        <?php foreach($arr_emp as $emp) { ?>
                            <tr>
                                <td><?php echo $emp['id']; ?></td>
                                <td><?php echo $emp['username']; ?></td>
                                <td><?php echo $emp['emp_pass']; ?></td>
                                <td><?php echo $emp['emp_name']; ?></td>
                                <td><?php echo $emp['emp_email']; ?></td>
                                <td><?php echo $emp['date_of_join']; ?></td>
                                <td><?php echo $emp['designation']; ?></td>
                                <td><?php echo $emp['emp_type']; ?></td>
                                <td><?php echo $emp['update_status']; ?></td>
                                <td><?php echo $emp['date_of_birth']; ?></td>
                                 <td>  
                                  <a class="btn btn-sm btn-success" href="edit-emp.php?id=<?php echo $emp['id']; ?>"> <i class="fa fa-edit"></i> Update </a>
                                 <a class="btn btn-sm btn-danger" href="#"> <i class="fa fa-trash"></i> Delete </a> </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>

             </div>

            </div>

           </section>

<?php include('footer.php'); ?>