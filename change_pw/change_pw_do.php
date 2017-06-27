<?php
include_once ("check_session.php");
$user_id = $_SESSION['user_id'];
$passwort_alt = $_POST["passwort_alt"];
$passwort_neu = ($_POST["passwort_neu"]);
include_once("connect.php");

$passno = htmlspecialchars($_POST["passwort_neu"], ENT_QUOTES, "UTF-8");
$pass = password_hash($passno, PASSWORD_DEFAULT);


$db = new PDO($dsn, $dbuser, $dbpass);
$sql = "SELECT * FROM users WHERE user_id = :user_id";
$query = $db->prepare($sql);
$query->bindParam(':user_id', $user_id);
$query->execute();
while ($zeile = $query->fetchObject()) {
    $passwordausDB = $zeile->pass;

}
if(password_verify($passwort_alt, $passwordausDB)) {

    try {
        $db = new PDO($dsn, $dbuser, $dbpass);
        $query = $db->prepare(
            "UPDATE users SET pass = :pass WHERE user_id = :user_id");
        $query->execute(array("pass" => $pass, "user_id" => $user_id));
        $db = null;
        echo "Password erfolgreich geändert!";
    } catch (PDOException $e) {
        echo "Error: Bitten wende Dich an die Admins!";
        die();
    }
    header ("refresh:2;url=../change_pw/change_pw.php");
}
else {
    echo "Bitte überprüfe dein eingegebenes Passwort nochmals<br/>";
}
