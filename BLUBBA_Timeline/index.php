<?php
include_once ("check_session.php");
include_once("connect.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>BLUBBA</title>
    <link rel="stylesheet" href="media/css/reset.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="media/css/1140.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="media/css/jquery.modal.min.css" type="text/css" media="screen" charset="utf-8">


    <link rel="stylesheet" href="media/css/style.css" type="text/css" media="screen" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope' rel='stylesheet' type='text/css'>



    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="media/js/jquery.min.js"></script>
    <script src="media/js/jquery.form.min.js"></script>
    <script src="media/js/jquery.modal.min.js"></script>
    <script src="media/js/javascript.js"></script>
</head>
<body>
<header id="header">
    <div class="conhe">
        <div class="container16"><div class="column16">
                <span>HERZLICH WILLKOMMEN</span>
                <div class="clear"></div>
            </div></div>
    </div>
    <div class="container16"><div class="column16">
            <a href="../BLUBBA_Timeline/index.php"><img class="logo" src="media/img/logo2.png"/></a>

            <ul>
                <li class="active"><a href="index.php">Startseite</a></li>
                <?php
                $user_id = $_SESSION['user_id'];
                echo "<li><a href=\"../Profil/profil.php?user_id=$user_id\">Mein Profil</a></li>"; ?>

                <li><a href="../Fotoalbum/index2.php">Mein Fotoalbum</a></li>
                <li><a href="../change_pw/change_pw.php">Einstellungen</a></li>
                <?php
                if(!isset($_SESSION['user_id']))?>
                <li><a href="../login_neu/logout.php">Ausloggen</a></li>

            </ul>
            <a href="#"><img class="menu" src="media/img/menu.png" /></a>
            <div class="clear"></div>
        </div></div>
</header>
<section id="content">
    <div id="about">
        <div class="container16">
            <div class="column16">
                <br>
                <form action="../search_user/search_do.php" method=post>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                    <input type=text name="search" size= 30  placeholder="Suche nach Usern">
                    <input type=submit name="SUBMIT" value="suchen">
                    </form>
                <?php
                    echo "Hallo " .$_SESSION['username'];
                 ?>

                <br>
                <br>
                <h2>Neuer BLUBB</h2>
                <div id="container">
                    <form enctype="multipart/form-data" method="post">
                        <?php
                        if (isset ($_POST ["upload"])) { //upload ist der name welcher der submit Button trägt, siehe unten
                            $post = $_POST ["post"];
                            $post_picture = $_FILES ["post_picture"] ["name"];
                            $file = $_FILES ["post_picture"] ["name"];
                            $file_type = $_FILES ["post_picture"] ["type"];
                            $file_size = $_FILES ["post_picture"] ["size"];
                            $file_tmp = $_FILES ["post_picture"] ["tmp_name"];
                            if (!empty($post_picture)){
                                $random_name = rand(); // falls mehrere User Bilder unter dem selben Namen speichern
                            }
                            else {
                                $random_name = "0";
                            }

                            $user_id = $_SESSION['user_id'];
                            $username = $_SESSION ['username'];

                            if (empty ($post)) {
                                echo "Bitte gebe einen Post ein, du kannst nicht nur ein Bild hochladen ! <br/><br/>";
                            }else {
                                move_uploaded_file($file_tmp, '../Blubb/uploads/'.$random_name. '.jpg');
                                $sql="insert into posts (post,post_picture,url,date,user_id,username) values ('".$post."','".$post_picture."','".$random_name."',NOW(),'".$user_id."','".$username."')";
                                include ("../Blubb/connect.php");
                                $result = mysqli_query($conn,$sql);


                                echo "Erfolgreich geblubbert!! <br/>";
                            }
                        }
                        ?>

                        <textarea name="post" rows="5" cols= "30" maxlength="150" placeholder="Teile der Welt mit was dich bewegt..."></textarea>

                        <br/>
                        Wähle das Foto aus, welches du hochladen möchtest: <br/>
                        <input type ="file" name="post_picture"/>
                        <br/>
                        <input type ="submit" name="upload" value="Upload"/>
                    </form>
                </div>
                <br><br>
                <?php
                try {
                $db = new PDO($dsn, $dbuser, $dbpass);
                $sql = "SELECT posts.user_id, posts.username, posts.date, posts.post, posts.url, users.profilbild_url FROM posts LEFT JOIN users ON posts.user_id=users.user_id";
                $query = $db->prepare($sql);
                $query->execute();

                while ($zeile = $query->fetchObject()) {
                    echo "<h3>BLUBB von <a href ='../Profil/profil.php?user_id= $zeile->user_id'>$zeile->username</a></h3>";
                    echo "<img src='../Profil/profilbilder/$zeile->profilbild_url' alt=\"\" style=\"width:75px;height:25%;\"><br>";
                    echo "<h5>$zeile->date</h5>";
                    echo "$zeile->post<br>";
                    if ($zeile -> url !=0){
                    echo "<img src='../Blubb/uploads/$zeile->url' alt=\"Es wurde kein Bild gepostet\" style=\"width:300px;height:100%;\"><br>";}
                    echo "___________________________________________________";
                }
                ?>


                    <?php
                    $db = null;
                } catch (PDOException $e) {
                    echo "Error!: Bitte wenden Sie sich an den Administrator!?...".$e;
                    die();
                }
                ?>

                <div class="clear"></div>
            </div></div>
    </div>


    <div id="about">
        <div class="container16"><div class="column16">



        <div class="clear"></div>
            </div></div>
    </div>


</section>

<footer id="footer">
    <a href="#" target="_blank">BLUBBA-Gruppe</a>  &nbsp  &nbsp  &nbsp
</footer>
<ul class="mobile">
    <li class="active"><a href="index.php">Startseite</a></li>
    <?php
    $user_id = $_SESSION['user_id'];
    echo "<li><a href=\"../Profil/profil.php?user_id=$user_id\">Mein Profil</a></li>"; ?>

    <li><a href="../Fotoalbum/index2.php">Mein Fotoalbum</a></li>
    <li><a href="../change_pw/change_pw.php">Einstellungen</a></li>
    <?php
    if(!isset($_SESSION['user_id']))?>
    <li><a href="../login_neu/logout.php">Ausloggen</a></li>
    <li class="prevent"><a href="#"></a></li>
    <li class="closemenu"><a href="#">Menü schließen</a></li>
</ul>

</body>
</html>