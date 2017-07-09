<?php
include_once ("check_session.php");
include_once("connect.php");
include_once("../Blubb/connect.php");
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
                <br><br>

                <div id="container">
                        <?php
                        $geholteuserID = $_GET['user_id'];

                        try {
                            global $dsn, $dbuser, $dbpass;
                            $db = new PDO($dsn, $dbuser, $dbpass);
                            $sql = "SELECT * FROM users WHERE user_id = :user_id";
                            $query = $db->prepare($sql);
                            $query->bindParam(':user_id', $geholteuserID);
                            $query->execute();
                            $i = false;
                            while ($zeile = $query->fetchObject()) {
                                if (!$i) {
                                    echo "<h1>Profilseite von $zeile->username</h1>";
                                    echo "Auf dieser Seite kannst Du dir die <a href=\"followinglist.php?user_id=$zeile->user_id'\">Abonnements anzeigen</a> lassen.";
                                    echo "<br>";
                                    echo "Außerdem kannst Du Dir die <a href=\"followerlist.php?user_id=$zeile->user_id'\">Abonnenten ansehen.</a>";
                                    echo " <br>";
                                    echo " <br>";
                                    echo "E-Mail Adresse:&nbsp $zeile->email";
                                    echo " <br>";
                                    echo "Voller Name: &nbsp $zeile->vorname $zeile->name";
                                    echo "<br><br>";
                                }
                                if ($_SESSION['user_id'] == $zeile->user_id and !$i) {
                                    echo "<a href=\"profil_edit.php\">Profil bearbeiten</a><br>";
                                    echo "_________________________________________________________<br>";
                                    $i = true;
                                }


                                echo "Dies ist das aktuelle Profilbild von $zeile->username:<br>";

                                $db = new PDO($dsn, $dbuser, $dbpass);
                                $sql = "SELECT * FROM users WHERE user_id = :user_id";
                                $query = $db->prepare($sql);
                                $query->bindParam(':user_id', $geholteuserID);
                                $query->execute();
                                while ($zeile = $query->fetchObject()) {
                                    echo "<img src='../Profil/profilbilder/$zeile->profilbild_url' alt=\"\" style=\"width:300px;height:100%;\"><br>";
                                    echo "_________________________________________________________<br>";
                                }
                                echo "<br>";
                                echo "<br>";






                                global $dsn, $dbuser, $dbpass;
                                $db = new PDO($dsn, $dbuser, $dbpass);
                                $sql = "SELECT * FROM posts WHERE user_id = :user_id";
                                $query = $db->prepare($sql);
                                $query->bindParam(':user_id', $geholteuserID);
                                $query->execute();
                                $i = false;
                                while ($zeile = $query->fetchObject()) {

                                    echo "<h3>BLUBB von <a href ='../Profil/profil.php?user_id= $zeile->user_id'>$zeile->username</a></h3>";
                                    echo "<img src='../Profil/profilbilder/$zeile->profilbild_url' alt=\"\" style=\"width:75px;height:25%;\"><br>";
                                    echo "<h5>$zeile->date</h5>";
                                    echo " <br>";
                                    echo "$zeile->post<br>";
                                    echo "<img src='../Blubb/uploads/$zeile->url' alt=\"\" style=\"width:300px;height:100%;\"><br>";


                                    $i = true;


                                    if ($_SESSION['user_id'] == $zeile->user_id) {
                                        echo "<a href='edit.php?contentID=$zeile->contentID'>bearbeiten</a>&nbsp&nbsp&nbsp";
                                        echo "<a href='delete.php?contentID=$zeile->contentID'>l&ouml;schen</a><br>";
                                        echo "_________________________________________________________";
                                    }
                                    $db = null;
                                }
                                }
                        }
                        catch
                        (PDOException $e) {
                            echo "Error!: Bitte wenden Sie sich an den Administrator!..." . $e;
                            die();
                        }
                        ?>

                </div>

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
