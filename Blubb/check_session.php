<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 28.05.2017
 * Time: 11:52
 */
session_start();
if(!isset($_SESSION['user_id'])) {
    session_destroy ();
    header('Location:../Login_Registrierung_Seite/BLUBBA.html');
}
?>