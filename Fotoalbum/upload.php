<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 28.05.2017
 * Time: 11:36
 */
include_once("check_session.php");
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
    <div id="container">
        <h3>Lade Deine persönlichen Fotos hier hoch: </h3>
        <form enctype="multipart/form-data" method="post">
            <?php
            if (isset ($_POST ["upload"])) { //upload ist der name welcher der submit Button trägt, siehe unten
               $name = $_POST ["name"];
               $album_id = $_POST ["album"];
               $file = $_FILES ["file"] ["name"];
               $file_type = $_FILES ["file"] ["type"];
               $file_size = $_FILES ["file"] ["size"];
               $file_tmp = $_FILES ["file"] ["tmp_name"];
               $random_name = rand(); // falls mehrere User Bilder unter dem selben Namen speichern
                $user_id = $_SESSION['user_id'];
                $username = $_SESSION ['username'];

               if (empty ($name) or empty ($file)) {
                   echo "Bitte befülle alle Felder mit Inhalten ! <br/><br/>";
               }else {
                   move_uploaded_file($file_tmp, 'uploads/'.$random_name. '.jpg');
                   $sql="insert into bilder (name,album_id,url,user_id) values ('".$name."','".$album_id."','".$random_name."','".$user_id."')";
                   $result = mysqli_query($conn,$sql);

                   echo "Bild erfolgreich hochgeladen!! <br/><br/>";
               }
            }
            ?>
            Name: <br/>
            <input type="text" name="name"/>
            <br/><br/>
            Wähle das Album aus, in dem Dein Foto gespeichert werden soll: <br/>
            <select name="album">
                <?php
                $user_id = $_SESSION["user_id"];
                    $sql="SELECT id, name FROM album WHERE user_id = $user_id";
                    $result = mysqli_query($conn,$sql);
                    //$query = mysqli_query("SELECT * FROM album");
                    while ($run = mysqli_fetch_array ($result)){
                        $album_id = $run ["id"];
                        $album_name = $run ["name"];
                        echo "<option value='$album_id'>$album_name</option>";
                    }
                ?>

            </select>
            <br/><br/>
            Wähle das Foto aus, welches du hochladen möchtest: <br/>
            <input type ="file" name="file"/>
            <br/><br/>
            <input type ="submit" name="upload" value="Upload"/>
        </form>
    </div>

</div>
</body>
</html>