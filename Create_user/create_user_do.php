<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 27.05.2017
 * Time: 17:15
 */

include_once("connect.php");
$username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$passno = htmlspecialchars($_POST["pass"], ENT_QUOTES, "UTF-8");
$pass = password_hash($passno, PASSWORD_DEFAULT);

if (!empty($username) && !empty($name) && !empty($vorname) && !empty($email)) {
    try {
        $db = new PDO($dsn, $dbuser, $dbpass);
        $query = $db->prepare(
            "INSERT INTO users (username, name,vorname, email, pass) VALUES(:username, :name, :vorname, :email, :pass)");
        $query->execute(array("username" => $username, "name" => $name, "vorname" => $vorname,"email" => $email, "pass" => $pass) );
        $db = null;
    } catch (PDOException $e) {
        echo "Error!: Bitten wenden Sie sich an den Administrator...";
        die();
    }
    header('Location: create_user_done.php');
}
else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}