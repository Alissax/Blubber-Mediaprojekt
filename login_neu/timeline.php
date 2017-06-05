<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Timeline BLUBBA.</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.min.css">
</head>
<body>
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <h3 class="navbar-brand">Deine persönliche BLUBBA Timeline</h3>
        </div>
    </div>
</div>

<a href="create_blubb.php">neuer BLUBB</a><br>
<a href="/Create_user/create_user.php">neuen Benutzer anlegen</a><br>
<a href="../Fotoalbum/index2.php">Dein persönliches Blubber Fotoalbum</a><br>

<?php
session_start();
if(!isset($_SESSION['userid'])) {
    echo "<a href=\"login.html\">LogIn</a><br><br>"; }
else {
    echo "<a href=\"logout.php\">Ausloggen</a><br><br>";
    echo "Hallo Nutzer: " .$_SESSION['username'];




















}
?>

<?php // Anzeigen aller vorhandenen Tweets aus der Datenbank
include_once("connect.php");
try {
$db = new PDO($dsn, $dbuser, $dbpass);
$sql = "SELECT * FROM content_txt INNER JOIN user ON content_txt.userID=user.userid";
$query = $db->prepare($sql);
$query->execute();
while ($zeile = $query->fetchObject()) {
    echo "<h2>Tweet Nummer: $zeile->contentID<br></h2>";
    echo "<h3>Geschrieben am: $zeile->contentDate</h3>";
    echo "<h3>Geschrieben von: <a href='profil.php?userid=$zeile->userid'>$zeile->username</a> <a href='follower_do.php?user=$zeile->userID'>(Folgen)<a href='unfollow_do.php?entfolgeuser=$zeile->userID'>(Entfolgen)</a></h3>";              // Der Wert des "username" kann aufgrund des Inner Join oben ausgelesen werden!
    echo "<h4>$zeile->contentTXT</h4>";
    echo "<img src='$zeile->contentPicture' alt=\"Mountain View\" style=\"width:304px;height:228px;\"> <br>";
    echo "Quelle: <a href='$zeile->contentSource'>$zeile->contentSource</a><br><br>";
    echo "<a href='show.php?contentID=$zeile->contentID'>zeige</a><br>";
    if($_SESSION['userid']==$zeile->userID) {
        echo "Du bist Autor dieses Posts, also kannst du folgendes machen: <br>";
        echo "<a href='edit.php?contentID=$zeile->contentID'>editieren</a><br>";
        echo "<a href='delete_frage.php?contentID=$zeile->contentID'>l&ouml;sche</a><br>";
    }
    echo "_________________________________________________________";
}
?>
<br>
</body>
</html>

<?php
$db = null;
} catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!...".$e;
    die();
}
?>