<?php
if(!empty($_POST['states'])){
  require('conn.php');
   
   $state_id = $_POST['states'];
   $sql = mysqli_query($conn, 'SELECT * FROM city WHERE state_id = "'.$state_id.'" ORDER BY city');
   //exit;
   echo "<option>Select city...</option>";
   while($city = mysqli_fetch_array($sql)){
      echo "<option value='" . $city['id'] . "'>" . $city['city'] . "</option>";
   }
}
?>