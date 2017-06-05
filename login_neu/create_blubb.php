<?php
/**
 * Created by PhpStorm.
 * User: Alissa
 * Date: 28.05.2017
 * Time: 11:36
 */
//include_once("check_session.php");
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="mystyle.css" media="screen"/>
</head>
<body>
<h1>Neuer Blubb.</h1>
<form action="create_do.php" method="post">
    Text des Tweets: <br>
    <input type="text" name="post" size="80" maxlength="255" /> <br><br>
    Tweet Bild: <input type="file" name="post_picture" /><br>
    Tweet Quelle: <input type="text" name="url" /><br>
    <input type="submit" value="BLUBBERN" />
</form>
</body>
</html>