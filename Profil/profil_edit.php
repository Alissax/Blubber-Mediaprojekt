<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 05.07.2017
 * Time: 16:00
 */

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
            <a href="../BLUBBA_Timeline/index.php"><img class="logo" src="media/img/logo2.png"/></a>
            <ul>
                <li><a href="../BLUBBA_Timeline/index.php">Startseite</a></li>
                <?php
                $user_id = $_SESSION['user_id'];
                echo "<li><a href=\"../Profil/profil.php?user_id=$user_id\">Mein Profil</a></li>"; ?>
                <li><a href="../Fotoalbum/index2.php">Mein Fotoalbum</a></li>
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
                <br>
                <br>
                <?php
                try {

                $user_id = $_SESSION["user_id"];
                $db = new PDO($dsn, $dbuser, $dbpass);
                $sql = "SELECT * FROM users WHERE user_id = $user_id";
                $query = $db->prepare($sql);
                $query->bindParam('user_id', $user_id);
                $query->execute();
                if (($zeile = $query->fetchObject()) && ($_SESSION['user_id']==$zeile->user_id)) { // Abgleichen der UserID mit der Session --> Kann nur von jeweiliger Person verändert werden
                echo "<form action='profil_edit_do.php' method='post'>";
                    echo "<input type='hidden' name='user_id' value='$zeile->user_id' />";
                    echo "Vorname:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' name='vorname' size='30' value='$zeile->vorname' /><br>";
                    echo "Nachname:&nbsp <input type='text' name='name' size='30' value='$zeile->name' /><br>";
                    echo "E-Mail:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type='text' name='email' size='30' value='$zeile->email' /><br>";
                    echo "<input type='submit' value='Profil bearbeiten' />";
                    echo "</form><br>";
                } else {
                echo "Datensatz nicht gefunden oder das ist nicht dein Profil!";
                }
                $db = null;
                } catch (PDOException $e) {
                echo "Error!: Bitten wenden Sie sich an den Administrator...";
                die();
                }
                ?>
                Hier kannst Du Dein Profilbild aktualisieren <br>
                <form enctype="multipart/form-data" method="post">
                    <input type="file" name="profilbild"/>
                    <br/>
                    <input type="submit" name = "upload" value="Upload"/>
                    <br/>
                    <br/>
                </form>
                <?php
                if (isset ($_POST ["upload"])) { //upload ist der name welcher der submit Button trägt
                    $name = $_POST ["profilbild"];
                    $file = $_FILES ["profilbild"] ["name"];
                    $file_type = $_FILES ["profilbild"] ["type"];
                    $file_size = $_FILES ["profilbild"] ["size"];
                    $file_tmp = $_FILES ["profilbild"] ["tmp_name"];
                    $random_name = rand(); // falls mehrere User Bilder unter dem selben Namen speichern
                    $user_id = $_SESSION['user_id'];
                    $username = $_SESSION ['username'];


                    move_uploaded_file($file_tmp, 'profilbilder/' . $random_name . '.jpg');
                    $db = new PDO($dsn, $dbuser, $dbpass);
                    $sql = "update users set profilbild_url=$random_name where user_id = :user_id";
                    $query = $db->prepare($sql);
                    $query->bindParam(':user_id', $user_id);
                    $query->execute();



                    echo "Dein Profilbild wurde erfolgreich hochgeladen.";
                    echo "<br>";


                }
                ?>


                <div class="clear"></div>
            </div></div>
    </div>


    <div id="about">
        <div class="container16"><div class="column16">



                <div class="clear"></div>
            </div></div>
    </div>


</section>

<footer id="footer">
    <a href="#" target="_blank">BLUBBA-Gruppe</a>  &nbsp  &nbsp  &nbsp
</footer>
<ul class="mobile">
    <li><a href="../BLUBBA_Timeline/index.php">Startseite</a></li>
    <?php
    $user_id = $_SESSION['user_id'];
    echo "<li><a href=\"../Profil/profil.php?user_id=$user_id\">Mein Profil</a></li>"; ?>

    <li><a href="../change_pw/change_pw.php">Einstellungen</a></li>
    <?php
    if(!isset($_SESSION['user_id']))?>
    <li><a href="../login_neu/logout.php">Ausloggen</a></li>
    <li class="prevent"><a href="#"></a></li>
    <li class="closemenu"><a href="#">Menü schließen</a></li>
</ul>

</body>
</html>