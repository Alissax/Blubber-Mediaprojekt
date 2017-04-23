<?php
/**
 * Created by PhpStorm.
 * User: Jenny
 * Date: 23.04.2017
 * Time: 11:17
 */


require_once 'messages.php';

//$inputText="";
$inputUser="Jenny";
$writtenMessage=new messages();

include ("startSeite.html");
echo "<br><br>";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $inputText=($_POST["message"]);

    $writtenMessage->setText($inputText);
    $writtenMessage->setAuthor($inputUser);
    $writtenMessage->setImage("");
    // sent writtenMessage to server for storage
}



include ("visualiseMessages.php");