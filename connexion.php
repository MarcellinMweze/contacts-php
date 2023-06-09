<?php
// connexion à la base de données

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbport = "3306";
$dbname = "utilisateur";


$con = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpassword);

if ($con == null) {
    die("Erreur de connexion");
}
