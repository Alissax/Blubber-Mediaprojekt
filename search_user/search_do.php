<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 30.06.2017
 * Time: 12:43
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

                <h1>
    <?php
    $suchbegriff = $_POST['search']; #Suchbegriff aus Formular dem Parameter $suchbegriff zuweisen
    echo "Deine Suchergebnisse für: ". $suchbegriff?>
                </h1>

                <?php
                include_once("connect.php");
                try {
                    $db = new PDO($dsn, $dbuser, $dbpass);
                    $sql = "SELECT * FROM users WHERE username LIKE '%$suchbegriff%'";
                    $query = $db->prepare($sql);
                    $query->execute();
                    while ($zeile = $query->fetchObject()) {
                        echo "<tr>";
                        echo "Besuche das Profil von :<h2><td><a href ='../Profil/profil.php?user_id= $zeile->user_id'>$zeile->username</a></td></h2><br>";
                    }
                } catch (PDOException $e) {
                    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
                    die();
                }
                ?>

                <a href="../BLUBBA_Timeline/index.php">Zurück zur Startseite</a>


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
    <a href="#" target="_blank">BLUBBA-Gruppe</a>  &nbsp  &nbsp  &nbsp
</footer>
<ul class="mobile">
    <li><a href="../BLUBBA_Timeline/index.php">Startseite</a></li>
    <?php
    $user_id = $_SESSION['user_id'];
    echo "<li><a href=\"../Profil/profil.php?user_id=$user_id\">Mein Profil</a></li>"; ?>
    <li><a href="../Fotoalbum/index2.php">Mein Fotoalbum</a></li>
    <li><a href="../change_pw/change_pw.php">Einstellungen</a></li>
    <?php
    if(!isset($_SESSION['user_id']))?>
    <li><a href="../login_neu/logout.php">Ausloggen</a></li>
    <li class="prevent"><a href="#"></a></li>
    <li class="closemenu"><a href="#">Menü schließen</a></li>
</ul>

</body>
</html>


