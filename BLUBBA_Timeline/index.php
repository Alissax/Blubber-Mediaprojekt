<?php
session_start();
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                <li><a href="">Dein Profil</a></li>
                <li><a href="">Einstellungen</a></li>
                <li><a href="">Dein Fotoalbum</a></li>
                <?php
                if(!isset($_SESSION['user_id']))?>
                <li><a href=\"logout.php\">Ausloggen</a></li>

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
                <br>
                <br>
                <?php
                    echo "Hallo " .$_SESSION['username'];
                 ?>
                <br>
                <br>
                <br>
                <h1>Neuer Blubb.</h1>
                <form action="../Blubb/create_do.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="post" size="80" maxlength="255" placeholder="Blubber los ..." /> <br><br>
                    Blubb Bild: <input type="file" name="post_picture" /><br><br>
                    <input type="submit" value="BLUBBERN" />
                    <input type="reset" value="Reset">
                </form>
                <br><br><br>

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

    </div>
</section>

<footer id="footer">
    <a href="http://medien-go.com" target="_blank">Developed by medien.GO</a>
</footer>
<ul class="mobile">
    <li class="active"><a href="">Startseite</a></li>
    <li><a href="">Profil</a></li>
    <li><a href="">Einstellungen</a></li>
    <li class="prevent"><a href="#">-</a></li>
    <li class="closemenu"><a href="#">Menü schließen</a></li>
</ul>

</body>
</html>