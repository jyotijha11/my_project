<?php
include('header.php');
?>
           <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4">
                    <?php
                       $sql = "SELECT user.*,country.country_name,state.state_name FROM user LEFT JOIN country ON user.country = country.id LEFT JOIN state ON user.state = state.id";
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if(!empty($arr_users)) { ?>
                        <?php foreach($arr_users as $user) { ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['address']; ?></td>
                                <td><?php echo $user['country_name']; ?></td>
                                <td><?php echo $user['state_name']; ?></td> 
                                <td><?php echo $user['quantity']; ?></td>
                                <td>
                                <?php
                                    if($user['status']==1){
                                        echo "Approved";
                                    }else{
                                        echo "Disapprove";
                                    }
                                ?>
                                </td>
                                <?php
                                if($user['status']==1){
                                ?>
                                <td>
                                    <a class="btn btn-sm btn-info" href="disapprove.php?id=<?php echo $user['id']; ?>">Disapprove</a>
                                </td>
                                <?php
                                }else{
                                ?>
                                <td>
                                    <a class="btn btn-sm btn-info" href="approve.php?id=<?php echo $user['id']; ?>">Approved</a>
                                </td>
                                <?php   
                                }
                                ?>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>

             </div>

            </div>

           </section>

<?php include('footer.php'); ?>