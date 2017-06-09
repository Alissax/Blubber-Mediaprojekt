<?php
session_start();
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
        <div class="container16"><div class="column16">
                <br>
                <br>
                <br>
                <br>
                <?php
                    echo "Hallo: " .$_SESSION['username'];
                 ?>
                <br>
                <br>
                <br>
                <?php
                // Anzeigen von allen vorhandenen Tweets aus der Datenbank
                include_once("connect.php");
                try {
                $db = new PDO($dsn, $dbuser, $dbpass);
                $sql = "SELECT * FROM posts ";
                $query = $db->prepare($sql);
                $query->execute();
                while ($zeile = $query->fetchObject()) {
                    echo "<h2>Tweet Nummer: $zeile->post_id<br></h2>";
                    echo "<h3>Geschrieben am: $zeile->date</h3>";
                    echo "<h3>Geschrieben von: <a href='profil.php?user_id=$zeile->userid'>$zeile->username</a><br>";
                    echo "<h4>$zeile->post</h4>";
                    echo "<img src='$zeile->post_picture' alt=\"Mountain View\" style=\"width:304px;height:228px;\"> <br>";
                    echo "Quelle: <a href='$zeile->url'>$zeile->url</a><br><br>";
                    echo "<a href='show.php?post_id=$zeile->post_id'>zeige</a><br>";
                    if($_SESSION['user_id']==$zeile->user_id) {
                        echo "Du bist Autor dieses Posts, also kannst du folgendes machen: <br>";
                        echo "<a href='edit.php?post_id=$zeile->post_id'>editieren</a><br>";
                        echo "<a href='delete_frage.php?post_id=$zeile->post_id'>l&ouml;sche</a><br>";
                    }
                }
                ?>
                <br>
<?php
$db = null;
} catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!...".$e;
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