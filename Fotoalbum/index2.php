
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
        $sql="SELECT id, name FROM album";
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
                    <img src="uploads/<?php echo $pic; ?>"/>
                    <br/>
                    <b><?php echo $album_name ?></b>

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