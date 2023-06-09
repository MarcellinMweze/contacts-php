<?php

include_once('connexion.php');

try {
    $req = $con->prepare("DELETE FROM contacts WHERE id=:num LIMIT 1");
    $req->bindValue(':num', $_GET['id'], PDO::PARAM_INT);

    $rep = $req->execute();

    if ($rep) {
        header('Location: index.php');
    } else {
    }
} catch (PDOException $e) {
    die("Error" . $e->getMessage());
}
