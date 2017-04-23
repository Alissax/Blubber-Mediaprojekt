<?php
$msg = "";
// if upload button is pressed
if (isset ($_POST ["upload"])) {
    //the path to store the uploaded image
    $target = "images/" .basename ($_FILES ["image"] ["name"]);
    //connect to DB
    $db = mysqli_connect ("localhost","ag129","loSh5Oixuj","u-ag129");
    //Get all the submitted data from the form
    $image=$_FILES ["image"] ["name"];
    $text=$_POST ["text"];

    $sql ="INSERT INTO bilder (bilder_id) VALUES ("$bilder_id")";
    mysqli_query ($db, $sql);
    //move the uploaded image into the folder:images
    if (move_uploaded_file($_FILES ["tmp_name"] ["name"], $target)) {
        $msg ="Image uploaded successfully";
    } else {
        $msg = "There was a problem uploading image"
    }
}