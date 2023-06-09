<?php

include_once('connexion.php');

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pays = $_POST['pays'];
$genre = $_POST['genre'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$naissdate = date("Y-m-d", strtotime($_POST['datenaiss']));


try {
    $req = $con->prepare("UPDATE contacts SET nom='$nom', prenom='$prenom', pays='$pays', genre='$genre', email='$email', phone='$tel', naissdate='$naissdate' WHERE  id='$id' LIMIT 1");
    $req->execute();

    if ($req) {

        header('Location: index.php');
    } else {
    }
} catch (PDOException $e) {
    die("Error" . $e->getMessage());
}
