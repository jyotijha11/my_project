<?php
if(!empty($_POST['country'])){
  require('conn.php');
   
   $country_id = $_POST['country'];
   $sql = mysqli_query($conn, 'SELECT * FROM state WHERE country_id = "'.$country_id.'" ORDER BY state');
   //exit;
   echo "<option>Select State...</option>";
   while($state = mysqli_fetch_array($sql)){
      echo "<option value='" . $state['id'] . "'>" . $state['state'] . "</option>";
   }
}
?>