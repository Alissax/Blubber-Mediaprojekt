<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 28.05.2017
 * Time: 11:36
 */
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
    <div id="container">
        <h3>Neuer BLUBB </h3>
        <form enctype="multipart/form-data" method="post">
            <?php
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if (isset ($_POST ["upload"])) { //upload ist der name welcher der submit Button trägt, siehe unten
                $post = $_POST ["post"];
                $post_picture = $_FILES ["post_picture"] ["name"];
                $file_type = $_FILES ["file"] ["type"];
                $file_size = $_FILES ["file"] ["size"];
                $file_tmp = $_FILES ["file"] ["tmp_name"];
                $random_name = rand(); // falls mehrere User Bilder unter dem selben Namen speichern
                $user_id = $_SESSION['user_id'];
                $username = $_SESSION ['username'];

                if (empty ($post) or empty ($post_picture)) {
                    echo "Bitte befülle alle Felder mit Inhalten ! <br/><br/>";
                }else {
                    //move_uploaded_file($file_tmp, 'uploads/'.$random_name. '.jpg');
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    $sql="insert into posts (post,post_picture,url,date,user_id,username) values ('".$post."','".$post_picture."','".$random_name."',NOW(),'".$user_id."','".$username."')";
                    echo $sql;
                    $result = mysqli_query($conn,$sql);


                    echo "Bild erfolgreich hochgeladen!! <br/><br/>";
                }
            }
            ?>

            <input type="text" name="post" placeholder="Gebe hier deinen Post ein"/>
            <br/><br/>

            Wähle das Foto aus, welches du hochladen möchtest: <br/>
            <input type ="file" name="post_picture"/>
            <br/><br/>
            <input type ="submit" name="upload" value="Upload"/>
        </form>
    </div>

</div>
</body>
</html>