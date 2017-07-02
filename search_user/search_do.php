<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 30.06.2017
 * Time: 12:43
 */
?>
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
        echo "<td>$zeile->username</td>";
    }
} catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();
}
?>

<a href="index.php">Zurück zur Startseite</a>
