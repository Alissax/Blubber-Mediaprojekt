<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 11.07.2017
 * Time: 09:30
 */
include_once ('check_session.php');
include_once("connect.php");
$friend_id = $_GET["user_id"];
$user_id = $_SESSION['user_id'];

try {
    include_once("connect.php");
    $db = new PDO($dsn, $dbuser, $dbpass);
    $sql="DELETE FROM follows WHERE 
(user_id, friend_id) values ('".$user_id."','".$friend_id."')";
    include ("../Blubb/connect.php");
    $result = mysqli_query($conn,$sql);

} catch (PDOException $e) {
    echo "Error!: Bitten wenden Sie sich an den Administrator...";
    die();
}
header('Location: ../BLUBBA_Timeline/index.php');