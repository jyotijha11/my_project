<?php
require('conn.php');
$servername = "localhost";
$username = "root";
$password = "";
$db = "report";
if(isset($_POST['submit']))
{
//print_r($_FILES); die;
$client_name = $_POST['client_name'];
$client_address = $_POST['client_address'];
$occupier_name = $_POST['occupier_name'];
$occupier_number = $_POST['occupier_number'];
$landloard_name = $_POST['landloard_name'];
$landloard_number = $_POST['landloard_number'];
$report_date = $_POST['report_date'];
$property_address = $_POST['property_address'];
$imagename= $_POST["imagename"];

$sql = "INSERT INTO report_front(client_name,client_address,occupier_name,occupier_number,landloard_name,landloard_number,report_date,property_address,img) VALUES('$client_name', '$client_address','$occupier_name','$occupier_number','$landloard_name','$landloard_number','$report_date','$property_address','$imagename')";
if (mysqli_query($conn, $sql)) 
{
echo "New record created successfully";
} 
else 
{
echo "Error: " . mysqli_error($conn);
}      
}
$conn = mysqli_connect($servername, $username, $password, $db);

$sql = mysqli_query($conn, "SELECT * FROM client_details ORDER BY client_address ASC");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Report Front Cover</title>
<link rel="stylesheet" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
function getClients(client_id){
//$("#client").show();
//$("#clientDropdown").html('<option>Loading...</option>');
$.ajax({
method: "POST",
url: "getClient.php",
dataType: "html",
data: {report_front: client_id}
})
.done(function(data){
$("#clientDropdown").val(data);
});
}  
</script>
<!-- <script type="text/javascript">
$('.file-upload').file_upload();
</script> -->
<script type="text/javascript">
var fileobj;
function upload_file(e) {
e.preventDefault();
fileobj = e.dataTransfer.files[0];
ajax_file_upload(fileobj);
}

function file_explorer() {
document.getElementById('selectfile').click();
document.getElementById('selectfile').onchange = function() {
fileobj = document.getElementById('selectfile').files[0];
ajax_file_upload(fileobj);
};
}

function ajax_file_upload(file_obj) {
if(file_obj != undefined) {
var form_data = new FormData();                  
form_data.append('file', file_obj);
var xhttp = new XMLHttpRequest();
xhttp.open("POST", "upload.php", true);
xhttp.onload = function(event) {
oOutput = document.querySelector('.img-content');
if (xhttp.status == 200) {
oOutput.innerHTML = this.responseText;
} else {
oOutput.innerHTML = "Error " + xhttp.status + " occurred when trying to upload your file.";
}
}

xhttp.send(form_data);
}
}
</script>
</head>
<body>
<div class="row">
<div class="form-holder">
<div class="form-content">
<div class="form-items">
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
                <div class="card-body p-4 p-md-5">
                    <h3>Report Front Cover</h3>
                    
                    <form enctype="multipart/form-data" class="px-md-2" method="post" action="">
                        <div class="row">
                        <div class="form-group files">
                        <div class="col-sm-4">
                            <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
                                <div id="drag_upload_file">
                                    <label class="form-label" for="form3Example1q">Upload Your File </label>
                                    <p class="form-label" for="form3Example1q">or</p>
                                    <p class="form-label" for="form3Example1q"><input type="button" value="Select File" onclick="file_explorer();" /></p>
                                    <input type="file" id="selectfile" style="display: none;"/>
                                </div>
                            </div>
                            <div class="img-content"></div>
                        </div>
                        </div>
                        </div>
                            <div class="form-outline mb-4">
                            <h3>Client Details</h3>
                            <div class="row">
                             <div class="col-sm-4">
                            <label class="form-label" for="form3Example1q">Client Name</label>
                           <select class="form-control" id="client" name="client_name" onChange="getClients(this.value)">
                            <option value=" ">Select Client Name</option>
                            <?php 
                            $sql = "SELECT * FROM client_details";
                            $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($result))
                            {
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['client_name']; ?></option>
                            <?php
                            }
                            ?>
                            </select><!-- <input type="text"  class="form-control" name="client_name" id="exampleDatepicker1"> -->                                               
                           </div>
                        <div class="row">
                        <div class="col-sm-4" id="client">
                        <label for="client" class="col-sm-2 control-label">Client Address</label>
                           <div class="col-sm-4">               
                              <input type="text" name="client_address" class="form-control" id="clientDropdown">
                           </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="form-outline mb-4">
                        <h3><b>Property Details</b></h3>
                        <div class="row">
                        <div class="col-sm-4">                                      
                         <label for="exampleDatepicker1" class="form-label">Occupier Name</label>
                        <input type="text" class="form-control" id="exampleDatepicker1" name="occupier_name" required />
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-4">                                        
                            <label for="exampleDatepicker1" class="form-label">Occupier Number</label>
                        <input type="text" class="form-control" id="exampleDatepicker1" name="occupier_number"required  />
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-4">                                        
                            <label for="exampleDatepicker1" class="form-label">Landloard Name</label>
                        <input type="text" class="form-control" id="exampleDatepicker1" name="landloard_name" required />
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-4">                                       
                            <label for="exampleDatepicker1" class="form-label">Landloard Number</label>
                        <input type="text" class="form-control" id="exampleDatepicker1" name="landloard_number"required  />
                        </div>
                        </div>
                         <div class="row">
                        <div class="col-sm-4">
                        <div class="form-outline">
                             <label class="form-label" for="form3Example1q"><b>Date</b></label>
                            <input type="text" id="report_date" name="report_date">
                            <br><br>
                            <script>
                            var today = new Date();
                            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                            document.getElementById("report_date").value = date;
                            </script>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-4">                                           
                        <label for="exampleDatepicker1" class="form-label">Property Address</label>
                        <input type="text" class="form-control" id="exampleDatepicker1" name="property_address" required />
                        
                        </div>
                        </div>
                         <button type="submit" name="submit" class="btn btn-success btn-block"> Submit <i class="fa fa-send"></i> </button>
                        </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>