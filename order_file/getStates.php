<?php
require('conn.php');
if(!empty($_POST['country'])){
   
   $country_id = $_POST['country'];
   $sql = mysqli_query($conn, 'SELECT * FROM state WHERE country_id = "'.$country_id.'" ORDER BY state_name');
   
   echo "<option>Select State...</option>";
   while($state = mysqli_fetch_array($sql)){
      echo "<option value='" . $state['id'] . "'>" . $state['state_name'] . "</option>";
   }
}
?>