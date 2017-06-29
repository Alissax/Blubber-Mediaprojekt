<?php

$servername="localhost";
$username="ag129";
$password="loSh5Oixuj";
$dbname="u-ag129";

$conn = mysqli_connect ($servername,$username,$password,$dbname);
if (!$conn){
    die("Connection failed:" . mysqli_connect_error());
}