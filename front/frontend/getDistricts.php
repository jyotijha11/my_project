<?php
if(!empty($_POST['state'])){
  require('conn.php');
   
   $state_id = $_POST['state'];
   $sql = mysqli_query($conn, 'SELECT * FROM district WHERE state_id = "'.$state_id.'" ORDER BY district');
   //exit;
   echo "<option>Select State...</option>";
   while($district = mysqli_fetch_array($sql)){
      echo "<option value='" . $district['id'] . "'>" . $district['district'] . "</option>";
   }
}
?>