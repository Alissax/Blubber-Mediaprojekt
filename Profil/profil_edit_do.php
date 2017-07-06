<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 05.07.2017
 * Time: 16:16
 */

include_once("check_session.php");
$user_id = htmlspecialchars($_POST["user_id"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
if (!empty($vorname) && !empty($name) && !empty($email)) {
    try {
        include_once("connect.php");
        $db = new PDO($dsn, $dbuser, $dbpass);
        $query = $db->prepare(
            "UPDATE users SET vorname = :vorname,name = :name, email = :email WHERE user_id = :user_id");
        $query->execute (array("vorname" => $vorname,"name" => $name, "email" => $email, "user_id" => $user_id));
        $db = null;
        echo "Profildaten erfolgreich geändert!";
        header ("refresh:2;url=profil_edit.php");
    } catch (PDOException $e) {
        echo "Error: Bitten wenden Sie sich an den Administrator!";
        die();
    }
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}