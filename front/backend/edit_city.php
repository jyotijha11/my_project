<?php
include('header.php');
 	$id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM city where id = '$id'");
    $result = mysqli_fetch_assoc($sql);

if(isset($_POST['submit']))
{
    $city = $_POST['city'];
    $d_id = $_POST['district_id'];
    $sql = "UPDATE city SET city = '$city', district_id = '$d_id' WHERE id=".$_GET['id'];
    if (mysqli_query($conn, $sql)) 
     {
        echo "<p style='color: white;'>City edit successfully</p>";
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
                <h3>City</h3>
                <div class="d-flex justify-content-end social_icon">
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                       <select name="district_id" class="form-control" id="district">
                        <option value="<?php echo $row['id'];?>">Select</option>
                        <?php $sql = mysqli_query($conn, "select id, district from district");
                        while($row=mysqli_fetch_assoc($sql))
                        {
                          ?>
                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['district']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="city" name="city" value="<?php echo $result['city']; ?>" required>  
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="submit" class="btn float-right login_btn" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>