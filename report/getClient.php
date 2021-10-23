<?php
require('conn.php');
if(!empty($_POST['report_front'])){
  
   $client_id = $_POST['report_front'];
   $sql = mysqli_query($conn, 'SELECT * FROM client_details WHERE id = '.$client_id);
   //echo "<option>Select client...</option>";
   while($client = mysqli_fetch_assoc($sql)){
      //print_r($client);
      echo $client['client_address'];
   }
}
?>