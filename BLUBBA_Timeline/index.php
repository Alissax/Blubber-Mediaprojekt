<?php
include_once ("check_session.php");
include_once("connect.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>BLUBBA</title>
    <link rel="stylesheet" href="media/css/reset.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="media/css/1140.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="media/css/jquery.modal.min.css" type="text/css" media="screen" charset="utf-8">

    <link rel="stylesheet" href="media/css/style.css" type="text/css" media="screen" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope' rel='stylesheet' type='text/css'>



    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="media/js/jquery.min.js"></script>
    <script src="media/js/jquery.form.min.js"></script>
    <script src="media/js/jquery.modal.min.js"></script>
    <script src="media/js/javascript.js"></script>
</head>
<body>
<header id="header">
    <div class="conhe">
        <div class="container16"><div class="column16">
                <span>HERZLICH WILLKOMMEN</span>
                <div class="clear"></div>
            </div></div>
    </div>
    <div class="container16"><div class="column16">
           <img class="logo" src="media/img/logo2.png" />
            <ul>
                <li class="active"><a href="">Startseite</a></li>
                <li> <a href="">Dein Profil</a></li>
                <li><a href="../Fotoalbum/index2.php">Dein Fotoalbum</a></li>
                <li><a href="../change_pw/change_pw.php">Einstellungen</a></li>
                <?php
                if(!isset($_SESSION['user_id']))?>
                <li><a href="../login_neu/logout.php">Ausloggen</a></li>
            </ul>
            <a href="#"><img class="menu" src="media/img/menu.png" /></a>
            <div class="clear"></div>
        </div></div>
</header>
<section id="content">
    <div id="about">
        <div class="container16">
            <div class="column16">
                <br><br>
                <?php
                    echo "Hallo " .$_SESSION['username'];
                 ?>
                <br>
                <br>
                <h2>Neuer BLUBB</h2>
                <div id="container">
                    <form enctype="multipart/form-data" method="post">
                        <?php
                        if (isset ($_POST ["upload"])) { //upload ist der name welcher der submit Button trägt, siehe unten
                            $post = $_POST ["post"];
                            $post_picture = $_FILES ["post_picture"] ["name"];
                            $file = $_FILES ["post_picture"] ["name"];
                            $file_type = $_FILES ["post_picture"] ["type"];
                            $file_size = $_FILES ["post_picture"] ["size"];
                            $file_tmp = $_FILES ["post_picture"] ["tmp_name"];
                            $random_name = rand(); // falls mehrere User Bilder unter dem selben Namen speichern
                            $user_id = $_SESSION['user_id'];
                            $username = $_SESSION ['username'];

                            if (empty ($post) or empty ($post_picture)) {
                                echo "Bitte befülle alle Felder mit Inhalten ! <br/><br/>";
                            }else {
                                move_uploaded_file($file_tmp, 'uploads/'.$random_name. '.jpg');
                                $sql="insert into posts (post,post_picture,url,date,user_id,username) values ('".$post."','".$post_picture."','".$random_name."',NOW(),'".$user_id."','".$username."')";
                                echo $sql;
                                $result = mysqli_query($conn,$sql);


                                echo "Bild erfolgreich hochgeladen!! <br/><br/>";
                            }
                        }
                        ?>

                        <textarea name="post" rows="5" cols= "30" maxlength="150" placeholder="Gebe hier deinen Post ein"></textarea>

                        <br/>
                        Wähle das Foto aus, welches du hochladen möchtest: <br/>
                        <input type ="file" name="post_picture"/>
                        <br/>
                        <input type ="submit" name="upload" value="Upload"/>
                    </form>
                </div>
                <br><br>
                <?php
                try {
                $db = new PDO($dsn, $dbuser, $dbpass);
                $sql = "SELECT * FROM posts";
                $query = $db->prepare($sql);
                $query->execute();

                while ($zeile = $query->fetchObject()) {
                    echo "<h2>Blubb Nummer: $zeile->post_id<br></h2>";
                    echo "<h3>Geschrieben am: $zeile->date</h3>";
                    echo "<h3>Geschrieben von:$zeile->username</h3>";
                    echo "<h4>$zeile->post</h4>";
                    echo "<img src='$zeile->post_picture' alt=\"Das Bild kann nicht angezeigt werden\" style=\"width:300px;height:220px;\"><br><br><br>";
                }
                ?>

                    <?php
                    $db = null;
                } catch (PDOException $e) {
                    echo "Error!: Bitte wenden Sie sich an den Administrator!?...".$e;
                    die();
                }
                ?>
                HIER KOMMT EIN TEXT REIN!
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>



                <div class="clear"></div>
            </div></div>
    </div>


    <div id="about">
        <div class="container16"><div class="column16">

                HIER WIEDER TEXT

        <div class="clear"></div>
            </div></div>
    </div>


</section>

<footer id="footer">
    <a href="http://medien-go.com" target="_blank">Developed by medien.GO</a>  &nbsp  &nbsp  &nbsp
</footer>
<ul class="mobile">
    <li class="active"><a href="">Startseite</a></li>
    <li><a href="">Dein Profil</a></li>
    <li><a href="../Fotoalbum/index2.php">Dein Fotoalbum</a></li>
    <li><a href="../change_pw/change_pw.php">Einstellungen</a></li>
    <?php
    if(!isset($_SESSION['user_id']))?>
    <li><a href="../login_neu/logout.php">Ausloggen</a></li>
    <li class="prevent"><a href="#"></a></li>
    <li class="closemenu"><a href="#">Menü schließen</a></li>
</ul>

</body>
</html>