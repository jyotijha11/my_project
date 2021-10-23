<?php
include('header.php');
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM state where id = '$id'");
    $result = mysqli_fetch_assoc($sql);

if(isset($_POST['submit']))
{
	$state = $_POST['state'];
	$c_id = $_POST['country_id'];
	$sql = "UPDATE state SET state = '$state', country_id = '$c_id' WHERE id=".$_GET['id'];
	if (mysqli_query($conn, $sql)) 
     {
        echo "<p style='color: white;'>State edit successfully</p>";
     } 
     else 
     {
        echo "Error: " . mysqli_error($conn);
     }
}
?>
<body>
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
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                       <select name="country_id" class="form-control" id="country">
                        <option value="<?php echo $row['id'];?>">Select</option>
                        <?php $sql = mysqli_query($conn, "select id, country from country");
                        while($row=mysqli_fetch_assoc($sql))
                        {
                          ?>
                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['country']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="State" name="state" value="<?php echo $result['state']; ?>" required>  
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