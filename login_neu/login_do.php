<?php
$username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
$passwordeingabe = ($_POST["pass"]);
include_once("connect.php");
$db = new PDO($dsn, $dbuser, $dbpass);
$sql = "SELECT * FROM users WHERE username = :username";
$query = $db->prepare($sql);
$query->bindParam(':username', $username);
$query->execute();
while ($zeile = $query->fetchObject()) {
    $passwordausDB = $zeile->pass;
    $userIDausDB = $zeile->user_id;
    $usernameausDB = $zeile->username;
}
if(password_verify($passwordeingabe, $passwordausDB)) {

    session_start();
    $_SESSION["username"] = $usernameausDB;
    $_SESSION["user_id"] = $userIDausDB;
    header ('Location: ../BLUBBA_Timeline/index.php');
} else {
    echo "Login fehlgeschlagen. Du wirst zurück zum Login geleitet.";
    header ("refresh:2;url=../Login_Registrierung_Seite/BLUBBA.html");
}