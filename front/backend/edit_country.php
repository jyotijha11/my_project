<?php
include('header.php');
    $id = $_GET['id'];
  	$sql = mysqli_query($conn, "SELECT * FROM country where id = '$id'");
 	$result = mysqli_fetch_assoc($sql);

if(isset($_POST['submit']))
{
	$country = $_POST['country'];
	$sql = "UPDATE country SET country = '$country' WHERE id=".$_GET['id'];
	 if (mysqli_query($conn, $sql)) 
     {
         echo "<p style='color: white;'>Country edit successfully</p>";
     } 
     else 
     {
        echo "Error: " . mysqli_error($conn);
     }
}
?>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Country</h3>
                <div class="d-flex justify-content-end social_icon">
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Country" name="country" value="<?php echo $result['country']; ?>">
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="submit" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>
