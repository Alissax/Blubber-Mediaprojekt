<?php
include_once("check_session.php");
require_once ("connect.php");
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Albumsystem - BLUBBA</title>
    <link rel="stylesheet" href="style.css"/>

</head>
<body>
<div id="body">
    <?php include "title_bar.php"?>
    <div id="container">
        <h3>Erstelle Dein Album</h3>
        <form method="post">
            <?php
                if (isset ($_POST ['name'])){
                    $name = $_POST ['name']; // Value der Textbox
                    $random_name = rand();
                    $user_id = $_SESSION['user_id'];
                    $username = $_SESSION ['username'];
                    if (empty ($name)){
                        echo "Bitte gebe dem Album einen Namen <br/><br/>";
                    } else{
                        //mysqli_query("INSERT INTO album VALUE ('','$name','$text')");
                        //$sql="INSERT INTO album (name) VALUES ($name)";
                        //echo "Album erfolgreich erstellt!<br/><br/>";
                        $sql="insert into album (name, url,user_id)values ('".$name."','".$random_name."','".$user_id."')"; //Das ist der Code!!!!!!
                        $result = mysqli_query($conn,$sql);
                        echo "Album erfolgreich erstellt!<br/><br/>";
                    }
                }

            ?>
            Name des Albums: <input type="text" name="name"/>
            <input type="submit" value="Create"/>

        </form>

    </div>

</div>
</body>
</html>