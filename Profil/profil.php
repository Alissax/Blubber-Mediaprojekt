<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 02.07.2017
 * Time: 19:05
 */
include_once("check_session.php");
?>

<html>
<head>
    <meta charset="utf-8">
</head>

<body>

<?php
include_once("connect.php");
$geholteuserID = $_GET['user_id'];

try {
    global $dsn, $dbuser, $dbpass;
    $db = new PDO($dsn, $dbuser, $dbpass);
    $sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id=users.user_id WHERE users.user_id = :user_id";
    $query = $db->prepare($sql);
    $query->bindParam(':user_id', $geholteuserID);
    $query->execute();
    $i = false;
    while ($zeile = $query->fetchObject()) {
        if (!$i) {
            echo "<h1>Profilseite von $zeile->username</h1>";
            echo "Auf dieser Seite kannst Du dir die <a href=\"followinglist.php?user_id=$zeile->user_id'\">Abonnements anzeigen</a> lassen.";
            echo "<br>";
            echo "Außerdem kannst Du Dir die <a href=\"followerlist.php?user_id=$zeile->user_id'\">Abonnenten anzeigen lassen.</a>";
            echo" <br>";
            echo "<a href=\"followinglist.php?userid=$zeile->userid'\">Abonnements anzeigen</a>";
            echo" <br>";
            echo "<a href=\"followerlist.php?userid=$zeile->userid'\">Abonnenten anzeigen</a>";
            echo" <br>";
            echo "E-Mail Adresse: $zeile->email";
            echo" <br>";
            echo "Voller Name: $zeile->vorname $zeile->name";
            echo" <br>";
        }
        if ($_SESSION['user_id'] == $zeile->user_id and !$i) {
            echo "<a href=\"profil_edit.php\">Profil bearbeiten</a>";
            $i = true;
        }
        followButtonAjaxNeu ($_SESSION['userid'], $geholteuserID, 1);
        echo "<h3>Welle von $zeile->username</h3>";
        echo "<h5>$zeile->contentDate</h5>";
        echo "$zeile->contentTXT <br>";
        echo "<img src='$zeile->contentPicture' alt=\"Bild nicht verfügbar\" style=\"width:304px;height:228px;\"> <br>";
        echo "Quelle: <a href='$zeile->contentSource'>$zeile->contentSource</a><br><br>";
        echo "<a href='show.php?contentID=$zeile->contentID'>anzeigen</a><br>";
        if ($_SESSION['userid'] == $zeile->userID) {
            echo "<a href='edit.php?contentID=$zeile->contentID'>bearbeiten</a><br>";
            echo "<a href='delete_frage.php?contentID=$zeile->contentID'>l&ouml;schen</a><br>";
            echo "_________________________________________________________";
        }
        $db = null;
    }
}
catch
(PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!..." . $e;
    die();
}
?>
<br>



</body>
</html>
