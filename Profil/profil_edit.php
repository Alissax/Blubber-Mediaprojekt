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
                <li> <a href="">Dein Profil</a></li>
                <li><a href="../Fotoalbum/index2.php">Dein Fotoalbum</a></li>
                <li class="active"><a href="change_pw.php">Einstellungen</a></li>
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
                    echo "E-Mail:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type='text' name='email' size='30' value='$zeile->email' /><br>";
                    echo "<input type='submit' value='Profil bearbeiten' />";
                    echo "</form>";
                } else {
                echo "Datensatz nicht gefunden oder das ist nicht dein Profil!";
                }
                $db = null;
                } catch (PDOException $e) {
                echo "Error!: Bitten wenden Sie sich an den Administrator...";
                die();
                }
                ?>


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
    <a href="http://medien-go.com" target="_blank">Developed by medien.GO</a>
</footer>
<ul class="mobile">
    <li><a href="">Startseite</a></li>
    <li><a href="">Dein Profil</a></li>
    <li><a href="../Fotoalbum/index2.php">Dein Fotoalbum</a></li>
    <li class="active"><a href="../change_pw/change_pw.php">Einstellungen</a></li>
    <?php
    if(!isset($_SESSION['user_id']))?>
    <li><a href="../login_neu/logout.php">Ausloggen</a></li>
    <li class="prevent"><a href="#"></a></li>
    <li class="closemenu"><a href="#">Menü schließen</a></li>
</ul>

</body>
</html>