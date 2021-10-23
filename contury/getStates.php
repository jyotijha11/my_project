<?php
if(!empty($_POST['country'])){
   require('conn.php');
   $countryId = $_POST['country'];
   $sql = mysqli_query($conn, 'SELECT * FROM states WHERE countryId = "'.$countryId.'" ORDER BY stateName');
   
   echo "<option>Select State...</option>";
   while($state = mysqli_fetch_array($sql)){
      echo "<option value='" . $state['id'] . "'>" . $state['stateName'] . "</option>";
   }
}
?>