<?php

if(is_array($_FILES)) {
    if(is_uploaded_file($_FILES['file']['tmp_name'])) {
    $sourcePath = $_FILES['file']['tmp_name'];
    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $targetPath = "upload/".$newfilename;
        if(move_uploaded_file($sourcePath,$targetPath)) {
        ?>
        <img src="<?php echo $targetPath; ?>" width="100px" height="100px" hspace=15 />
        <input type="hidden" name="imagename" value="<?php echo $newfilename; ?>">
        <?php
        }
    }
}