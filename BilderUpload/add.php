<?php
$upload_dir="uploads/";
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
       </form>
    </div>
</div>

</body>
</html>