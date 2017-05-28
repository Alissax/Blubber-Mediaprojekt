<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" data-no-instant></script>
</head>
<body>
<h1>Neuer Benutzer</h1>
<form action="create_user_do.php" method="post">
    Benutzername: <input type="text" name="username" /><br>
    Name: <input type="text" name="name" /><br>
    Vorname: <input type="text" name="vorname" /><br>
    Email Adresse: <input type="text" name="email" /><br>
    Passwort: <input type="password" name="pass" /><br>

    <input type="submit" value="Benutzer erstellen" />
</form>
</body>
</html>
