<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 28.05.2017
 * Time: 11:44
 */
include_once("check_session.php");


$post = htmlspecialchars($_POST["post"], ENT_QUOTES, "UTF-8");
$post_picture = htmlspecialchars($_POST["post_picture"], ENT_QUOTES, "UTF-8");
$url = htmlspecialchars($_POST["url"], ENT_QUOTES, "UTF-8");
if (!empty($post) && !empty($post_picture) && !empty($url)) {
    include_once("connect.php");
    try {
        $db = new PDO($dsn, $dbuser, $dbpass);
        $query = $db->prepare(
            "INSERT INTO posts (post, post_picture, url, date, user_id) VALUES(:post, :post_picture, :url, NOW(), :user_id)"); // Aktuelles Datum wird per NOW() Funktion geholt
        $query->execute(array("post" => $post, "post_picture" => $post_picture, "url" => $url, "user_id" => $_SESSION['userid']) );
        $db = null;
    } catch (PDOException $e) {
        echo "Error!: Bitten wenden Sie sich an den Administrator...";
        die();
    }
    header('Location: timeline.php');
}
else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}