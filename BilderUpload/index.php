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
        <h3>User List
        <a class="btn btn-default" href="add.php">
            <span class="glyphicon glyphicon-plus"></span> &nbsp; Add New
        </a>
        </h3>
        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>borey</td>
                <td>Developer</td>
                <td><img src="<?php echo $upload_dir?>17241-200.png" height="40"</td>
                <td>
                    <a class="btn btn-info" href=""><span class="glyphicon glyphicon-edit"></span>Edit</a>
                    <a class="btn btn-info" href=""><span class="glyphicon glyphicon-remove"></span>Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>