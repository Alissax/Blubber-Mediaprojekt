<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 12.07.2017
 * Time: 09:02
 */

include_once ("connect.php");
include_once ("check_session.php");

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

                $festgelegteUserID = $_GET["user_id"];
                $db = new PDO($dsn, $dbuser, $dbpass);
                $sql = "SELECT * FROM users WHERE user_id = :festgelegteUserID";
                $query = $db->prepare($sql);
                $query->bindParam(':festgelegteUserID', $festgelegteUserID);
                $query->execute();
                while ($zeile = $query->fetchObject()) {
                    echo "<h2>$zeile->username wird von diesen Nutzern abonniert:<br></h2>";
                }
                echo "<br>";
                $db = new PDO($dsn, $dbuser, $dbpass);
                $sql = "SELECT * FROM follows INNER JOIN users ON follows.user_id=users.user_id WHERE follows.friend_id = :festgelegteUserID";       // UserID = 19 zeigt alles von Nutzer 19 an
                $query = $db->prepare($sql);
                $query->bindParam(':festgelegteUserID', $festgelegteUserID);
                $query->execute();
                while ($zeile = $query->fetchObject()) {
                    echo "<a href='profil.php?userid=$zeile->userid'>$zeile->username</a><br>";
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

    <li class="active"><a href="../change_pw/change_pw.php">Einstellungen</a></li>
    <?php
    if(!isset($_SESSION['user_id']))?>
    <li><a href="../login_neu/logout.php">Ausloggen</a></li>
    <li class="prevent"><a href="#"></a></li>
    <li class="closemenu"><a href="#">Menü schließen</a></li>
</ul>

</body>
</html>

