<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 09.07.2017
 * Time: 09:49
 */

include_once("check_session.php");
$post_id = htmlspecialchars($_POST["post_id"], ENT_QUOTES, "UTF-8");
$post = htmlspecialchars($_POST["post"], ENT_QUOTES, "UTF-8");

if (!empty($post_id) && !empty($post)) {
    try {
        include_once("connect.php");
        $db = new PDO($dsn, $dbuser, $dbpass);
        $query = $db->prepare(
            "UPDATE posts SET post = :post WHERE post_id = :post_id");
        $query->execute(array("post" => $post,"post_id" => $post_id));
        $db = null;
        echo "Du hast erfolgreich Deinen Blubb Post geändert";
        header ("refresh:2;url=../BLUBBA_Timeline/index.php");
    } catch (PDOException $e) {
        echo "Error: Bitten wenden Sie sich an den Administrator!";
        die();
    }
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}