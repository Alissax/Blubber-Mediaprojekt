<?php
include_once "check_session.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Albumsystem - BLUBBA</title>
    <link rel="stylesheet" href="style.css"/>

</head>
<body>
<?php include "connect.php";?>
<div id="body">
    <?php include "title_bar.php"?>
    <div id = "container">
        <?php
        $user_id = $_SESSION["user_id"];
        $sql="SELECT id, name FROM album WHERE user_id = $user_id";
        $result = mysqli_query($conn,$sql);
        while ($run = mysqli_fetch_array ($result)) {
            $album_id = $run ["id"];
            $album_name = $run ["name"];

            $sql2 = "SELECT url FROM bilder WHERE album_id = $album_id";
            $result2 = mysqli_query($conn, $sql2);
            $run1 = mysqli_fetch_array($result2);
            $pic = $run1 ["url"];
            ?>
            <a href="view.php?id=<?php echo $album_id; ?>">
                <div id="view_box">
                    <img src="uploads/unnamed.png"/>
                    <br/><br/>
                    Album: <br/>
                    <?php echo $album_name ?>

                </div>
            </a>
            <?php
                 }
            ?>
        <div class = "clear"></div>

    </div>

</div>
</body>
</html>