<?php
session_start(); //http Header wird raus geschickt

if ($_SESSION ['login']==true) (
    require_once ('connect.php');
    $q = mysql_query("SELECT * FROM users WHERE benutzer=")
)

?>

<!DOCTYPE html>
<html>
<head>
    <title> Blubber - Alle Neuigkeiten auf einen Blick </title>
</head>
<body>
<h1>Login</h1>

<form action = "" method="POST">
    Nutzername: <input type="text" name="user"><br>
    Passwort: <input type="password" name="pass"><br>
    <input type="submit" value="Login">
</form>

    <?php

    if ($_POST ["login"]) {
        $user = $_POST ["user"];
        $pass = $_POST ["pass"];
        if ($user AND $pass) {
            rquire_once ("connect.php");
}
}