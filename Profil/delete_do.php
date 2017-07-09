<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 09.07.2017
 * Time: 10:44
 */

include_once ('check_session.php');
include_once("connect.php");
$post_id = $_GET["post_id"];
$user_id = $_SESSION['user_id'];

try {
    include_once("connect.php");
    $db = new PDO($dsn, $dbuser, $dbpass);
    $sql = "DELETE FROM posts WHERE post_id=$post_id";
    $db->prepare($sql)->execute();
    $db = null;
} catch (PDOException $e) {
    echo "Error!: Bitten wenden Sie sich an den Administrator...";
    die();
}
header('Location: ../BLUBBA_Timeline/index.php');