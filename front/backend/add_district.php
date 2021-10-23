<?php
include('header.php');
if(isset($_POST['submit']))
{
    $district = $_POST['district'];
    $s_id = $_POST['state_id'];
    $sql = "INSERT INTO district(district,state_id) VALUES('$district','$s_id')";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo "<p style='color: white;'>District added successfully</p>";
    }
}
?>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>District</h3>
                <div class="d-flex justify-content-end social_icon">
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                       <select name="state_id" class="form-control" id="state">
                        <option value="<?php echo $row['id'];?>">Select</option>
                        <?php $sql = mysqli_query($conn, "select id, state from state");
                        while($row=mysqli_fetch_assoc($sql))
                        {
                          ?>
                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['state']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="District" name="district" required>  
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