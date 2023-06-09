<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['nom']) and $_POST['nom'] != '' and
        isset($_POST['prenom']) and $_POST['prenom'] != '' and
        isset($_POST['pays']) and $_POST['pays'] != '' and
        isset($_POST['genre']) and $_POST['genre'] != '' and
        isset($_POST['email']) and $_POST['email'] != '' and
        isset($_POST['tel']) and $_POST['tel'] != '' and
        isset($_POST['datenaiss']) and $_POST['datenaiss'] != ''


    ) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pays = $_POST['pays'];
        $genre = $_POST['genre'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $datenaiss = date("Y-m-d", strtotime($_POST['datenaiss']));

        include_once "connexion.php";

        $req = ("INSERT INTO contacts VALUES(NULL,'$nom','$prenom','$pays','$genre','$email','$tel','$datenaiss')");
        $req = $con->query($req);
        $rep = $req->fetchAll();
        if ($req) {

            $_SESSION['envoireussi'] = 'Données enregistrées avec succès !';


            header('Location: index.php');
        }
    } else {
        $_SESSION['ajouterror'] = "Veuillez compléter tous les champs SVP!";
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
