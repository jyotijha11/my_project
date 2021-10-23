<?php
if(!empty($_POST['district'])){
  require('conn.php');
   
   $district_id = $_POST['district'];
   $sql = mysqli_query($conn, 'SELECT * FROM city WHERE district_id = "'.$district_id.'" ORDER BY city');
   //exit;
   echo "<option>Select city...</option>";
   while($city = mysqli_fetch_array($sql)){
      echo "<option value='" . $city['id'] . "'>" . $city['city'] . "</option>";
   }
}
?>