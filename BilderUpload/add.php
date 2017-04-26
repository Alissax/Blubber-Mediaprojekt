<?php
require_once ("dbConfig.php");
$upload_dir="uploads/";
if(isset ($_POST ["btnSave"])){
    $name=$_POST["name"];
    $position=$_POST["position"];

    $imgName=$_FILES["myfile"] ["name"];
    $imgTmp=$_FILES ["myfile"] ["tmp_name"];
    $imgSize=$_FILES ["myfile"] ["size"];

    if (empty ($name)){
        $errorMsg="Please input name";
    }elseif (empty ($position)){
        $errorMsg ="Please input position";
    }elseif (empty ($imgName)){
        $errorMsg="Please select photo";
    }else{
        //get image extension
        $imgExt= strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
        // allow extension
        $allowExt = array ("jpeg","jpg","png","gif");
        //random new name for photo
        $userPic =time()."_" . rand(1000,9999).".".$imgExt;
        //check a valid image
        if ( in_array($imgExt,$allowExt)){
            //Check image size less than 5MB
            if($imgSize < 5000000){
              //move_uploaded_file($imgTmp,$upload_dir.$userPic);
           }else{
                $errorMsg="Image too large";
            }

       }else{
            $errorMsg="Please select a valid image";
       }
   }
    if(!isset ($errorMsg)){
        $sql="insert into users (name,position,photo)
              values ('".$name."','".$position."','".$userPic."')";
        $result = mysqli_query($conn,$sql);
        if ($result){
            $successMsg ="New record added successfully";
            //header("refresh:5,index.php");
        }else{
            $errorMsg = "Error".mysqli_error ($conn);

        }


    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>UploadImage</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.min.css">
</head>
<body>
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <h3 class="navbar-brand">PHP Upload Image</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="page-header">
        <h3>Add New
            <a class="btn btn-default" href="add.php">
                <span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Back
            </a>
        </h3>
    </div>
    <?php
        if(isset ($errorMsg)){
    ?>
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-info">
                <strong><?php echo $errorMsg;?></strong>
            </span>
        </div>
    <?php
        }

    ?>

    <?php
    if(isset ($successMsg)){
        ?>
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-info">
                <strong><?php echo $successMsg;?>- redirecting</strong>
            </span>
        </div>
        <?php
    }

    ?>
       <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
           <div class="form-group">
               <label for="name" class="col-md-2">Name</label>
               <div class="col-md-10">
                   <input type="text" name="name" class="form-control">
               </div>
           </div>
           <div class="form-group">
               <label for="position" class="col-md-2">Position</label>
               <div class="col-md-10">
                   <input type="text" name="position" class="form-control">
               </div>
           </div>
           <div class="form-group">
               <label for="photo" class="col-md-2">Photo</label>
               <div class="col-md-10">
                   <input type="file" name="myfile">
               </div>
           </div>
           <div class="form-group">
               <label class="col-md-2"></label>
               <div class="col-md-10">
                   <button type="submit" class="btn btn-success" name="btnSave">
                       <span class="glyphicon glyphicon-save"></span>
                       Save</button>
               </div>
           </div>
       </form>
    </div>
</div>

</body>
</html>