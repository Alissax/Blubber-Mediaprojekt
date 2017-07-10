<html>
<head>
    <meta charset="UTF-8">
    <title>Albumsystem - BLUBBA</title>
    <link rel="stylesheet" href="style.css"/>

</head>
<body>
<?php include "connect.php";
include_once("check_session.php");?>
<div id="body">
    <?php include "title_bar.php"?>
    <div id = "container">
        <?php
        $album_id = $_GET ["id"];

        $sql="SELECT id, name, url FROM bilder WHERE album_id=$album_id";
        $result = mysqli_query($conn,$sql);
        while ($run = mysqli_fetch_array ($result)) {
            $name = $run ["name"];
            $url = $run ["url"];
            ?>
            <div id="view_box">
                <img src = "uploads/<?php echo $url ?>"/>
                <br/><br/>
                <b><?php echo $name?></b>
            </div>
            <?php
                }
            ?>
        <div class = "clear"></div>

        </div>
</div>

</body>
</html>