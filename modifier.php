<?php

include_once('connexion.php');


try {
    $req = $con->prepare("SELECT * FROM contacts WHERE id=:num LIMIT 1");
    $req->bindValue(':num', $_GET['id'], PDO::PARAM_INT);

    $rep = $req->execute();

    $modif = $req->fetch();
} catch (PDOException $e) {
    die("Error" . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <section class="section modifier">
        <h3 class="parah3">Modifier un contact</h3>
        <form action="traitement-modif.php" class="fmodifier" id="monform" method="POST">
            <label for="">Nom
                <div>
                    <input type="text" name="nom" class="champs" id="nom" autocomplete="off" value="<?php echo $modif['nom']; ?>" />
                </div>
            </label>

            <label for="">Prénom
                <div>
                    <input type="text" id="prenom" name="prenom" class="champs" autocomplete="off" value="<?php echo $modif['prenom']; ?>" />
                </div>
            </label>

            <label for="pays">Pays
                <div>
                    <input type="text" name="pays" class="champs" autocomplete="off" value="<?php echo $modif['pays']; ?>" />
                </div>
            </label>

            <label for="genre">Genre
                <div>
                    <input type="text" name="genre" class="champs" autocomplete="off" value="<?php echo $modif['genre']; ?>" />
                </div>
            </label>

            <label for="">Email
                <div>
                    <input type="email" name="email" id="email" class="champs" autocomplete="off" value="<?php echo $modif['email']; ?>" />
                </div>
            </label>

            <label for="">Téléphone
                <div>
                    <input type="tel" name="tel" id="tel" class="champs" autocomplete="off" value="<?php echo $modif['phone']; ?>" />
                </div>
            </label>

            <label for="">Date de naissance
                <div>
                    <input type="text" name="datenaiss" id="ndate" class="items champs" value="<?php echo date("d-m-Y", strtotime($modif['naissdate'])); ?>" />
                </div>
            </label>

            <label for="fichier">Photo
                <div>
            </label><input type="file" accept="image/jpeg, image/png, image/jpg" name="fichier" id="fichier" class="champs-photo" />
            </label>

            <div>
                <input type="text" hidden name="id" class="champs" id="nom" autocomplete="off" value="<?php echo $modif['id']; ?>" />
            </div>

            <div id="">
                <button class="btn modif" id="btnajout">
                    Modifier ce contact
                </button>
            </div>
            <div>
        </form>
        </div>
        </div>
    </section>

</body>

</html>