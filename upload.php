<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename ($_FILES["fileToUpload"]["name"]);
$uploadOK = 1;
$imageFileType = pathinfo ($target_file, PATHINFO_EXTENSION);
//Checken ob Image Datei ein Fake ist
if (isset ($POST ["submit"])) {
    $check = getimagesize($_FILES ["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check ["mime"] . ".";
        $uploadOK = 1 ;
    } else {
        echo "File is not an image . ";
        $uploadOK = 0;
    }
}

// Checken ob Image schon existiert
if (file_exists($target_file)) {
    echo "Sorry, file already exists .";
    $uploadOK = 0;
}
// Checken ob $uploadOk auf 0 gesetzt wird bei einem Error
if ($uploadOK == 0) {
    echo "Sorry, your file was not uploaded .";
}
// Wenn alles okay ist, uploade das File
else {
    if (move_uploaded_file($_FILES ["fileToUpload"] ["tmp_name"], $target_file)){
        echo "The file " . basename ($_FILES ["fileToUpload"] ["name"]). "has been uploaded.";
    } else {
        echo "Sorry there was an error uploading your file .";
    }
}
?>