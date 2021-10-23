<?php
include('header.php');
?>
           <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4">
                  
                    <?php
                       $sql = "SELECT * FROM district";
                       $result = mysqli_query($conn, $sql);
                       $arr_users = array();
                       while ($row = mysqli_fetch_assoc($result)) 
                       {
                           $arr_users[] = $row;  
                       }  
                  ?>
            <table id="users" border="1">
                <thead>
                    <th>S.No</th>
                    <th>State Id</th>
                    <th>District</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php if(!empty($arr_users)) { ?>
                        <?php foreach($arr_users as $user) { ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['state_id']; ?></td> 
                                <td><?php echo $user['district']; ?></td> 
                                <td><a class="btn btn-sm btn-success" href="edit_district.php?id=<?php echo $user["id"];?>"> <i class="fa fa-edit"></i> Edit </a></td>
                                <td>
                                 <a class="btn btn-sm btn-danger" href="delete_district.php?id=<?php echo $user["id"];?>"> <i class="fa fa-edit"></i> Delete</a> 
                                </td>
                                 
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>

             </div>

            </div>

           </section>

<?php include('footer.php'); ?>