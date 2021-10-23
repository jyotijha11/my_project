<?php
require('conn.php');
?>


           <section class="row justify-content-center">

              <div class="col-sm-12">
                <div class="table-responsive bg-white p-4">
                  
                     <?php
                       $sql = "SELECT * FROM user";
                       $result = mysqli_query($conn, $sql);
                       $arr_prof = array();
                       while ($row = mysqli_fetch_assoc($result)) 
                       {
                           $arr_prof[] = $row;  
                       }  
                  ?>
                  <table id="prof">
                <thead>
                    <th>S.No</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Address</th>

                    <th>Gender</th>

                    <th>DOB</th>
                    
                </thead>
                <tbody>
                    <?php if(!empty($arr_prof)) { ?>
                        <?php foreach($arr_prof as $prof) { ?>
                            <tr>
                    <td><?php echo $prof['id']; ?></td>
                    <td><?php echo $prof['name']; ?></td>
                    <td><?php echo $prof['email']; ?></td>
                    <td><?php echo $prof['address']; ?></td>
                    <td><?php echo $prof['gender']; ?></td>
                    <td><?php echo $prof['dob']; ?></td>
                           
                                      <td><a class="btn btn-sm btn-success"
                                        href="edit.php?id=<?php echo $user["id"];?>">Edit                                  </a>
                                  </td>
                                      
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>

             </div>

            </div>

           </section>
