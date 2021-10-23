<?php
include('header.php');
?>
           <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4">
                  
                    <?php
                       $sql = "SELECT * FROM emp_leaves";
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
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>Leave Days</th>
                    <th>Start Date</th>
                    <th>End Date </th>
                    <th>Status </th>
                    <th>Requested Date </th>
                </thead>
                <tbody>
                    <?php if(!empty($arr_emp)) { ?>
                        <?php foreach($arr_emp as $emp) { ?>
                            <tr>
                                <td><?php echo $emp['id']; ?></td>
                                <td><?php echo $emp['emp_name']; ?></td>
                                <td><?php echo $emp['leave_type']; ?></td>
                                <td><?php echo $emp['leave_days']; ?></td>
                                <td><?php echo $emp['start_date']; ?></td>
                                <td><?php echo $emp['end_date']; ?></td>
                                <td><a href="approve.php?id=<?php echo $emp['id']; ?>"><?php if($emp['status'] ==0) echo "Pending"; else{ echo "Approved";} ?></a></td>
                                <td><?php echo $emp['request_date']; ?></td>
                                 
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>

             </div>

            </div>

           </section>

<?php include('footer.php'); ?>