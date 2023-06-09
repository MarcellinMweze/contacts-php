<?php
session_start();
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
  <section class="section">
    <div class="sect-contact">
      <div>
        <h1>Mes contacts</h1>
      </div>
      <button class="btn">Ajouter</button>
    </div>
    <div class="contact">
      <div class="list-contact">
        <p class="paraListe"><?php if (isset($message)) {
                                echo $message;
                              } ?></p>
        <div class="ajoutelements">

          <?php
          try {
            include_once "connexion.php";

            $req = ("SELECT * FROM contacts ORDER BY id DESC  ");
            $rep = $con->query($req);

            if ($rep->rowCount() > 0) {
              $contacts = $rep->fetchAll(PDO::FETCH_ASSOC);

              foreach ($contacts as $contact) {

                $dateauj = explode('-', date("Y-m-d"));
                $dateutili = explode("-", $contact['naissdate']);
                $age = $dateauj[0] - $dateutili[0];

          ?>

                <div class="elements-bloc">
                  <div class="phototext-icones">
                    <div class="photo-contact">
                      <img src="photos/imgcontact.png" alt="" />
                    </div>
                    <div class="nom-contact">
                      <h4><?= $contact['nom'] . " " . $contact['prenom'] ?></h4>
                      <h5><?= $contact['pays'] ?></h5>
                      <p><?= $contact['phone'] ?></p>
                      <p><?= $contact['email'] ?></p>
                      <p><?= $contact['genre'] . " " . $age . " an(s)" ?></p>
                    </div>
                  </div>
                  <div class="icones">
                    <div class="iconemodif">
                      <a href="modifier.php?id=<?= $contact['id'] ?>"><button class="btnic edit" type="submit">
                          <i class="fa-solid fa-pen-to-square"></i>
                      </a></button>
                    </div>
                    <div class="iconesupp">
                      <a href="supprimer.php?id=<?= $contact['id'] ?>"><button class="btnic sup" type="submit">
                          <i class="fa-solid fa-trash-can"></i>
                        </button>
                      </a>
                    </div>
                  </div>
                </div>


          <?php
              }
            } else {
              $message = 'La liste est vide';
            }
          } catch (PDOException $e) {
            die("Error" . $e->getMessage());
          }

          ?>

        </div>
      </div>

      <hr />

      <div class="ajout-contact" id="ajoutcont">
        <h3 class="parah3">Ajouter un contact</h3>
        <div class="msgerror">
          <p><?php
              if (isset($_SESSION['ajouterror'])) {
                echo $_SESSION['ajouterror'];
              } ?></p>
        </div>
        <div class="msgenvoie">
          <p><?php
              if (isset($_SESSION['envoireussi'])) {
                echo $_SESSION['envoireussi'];
              } ?></p>
        </div>
        <form action="traitement-ajout.php" class="fcontact" id="monform" method="POST">
          <label for="">Nom
            <div>
              <input type="text" name="nom" class="champs" id="nom" autocomplete="off" />
            </div>
          </label>

          <label for="">Prénom
            <div>
              <input type="text" id="prenom" name="prenom" class="champs" autocomplete="off" />
            </div>
          </label>

          <label for="pays">Pays
            <div>
              <select name="pays" id="pays" class="items champs">
                <option selected disabled>Choisir un pays</option>
                <option value="RDC">RDC</option>
                <option value="Tunisie">Tunisie</option>
                <option value="Maroc">Maroc</option>
                <option value="Cameroun">Cameroun</option>
                <option value="Togo">Togo</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Kenya">Kenya</option>
              </select>
            </div>
          </label>

          <label for="genre">Genre
            <div>
              <select name="genre" id="genre" class="items champs">
                <option selected disabled>Choisir le genre</option>
                <option value="Féminin">Féminin</option>
                <option value="Masculin">Masculin</option>
              </select>
            </div>
          </label>

          <label for="">Email
            <div>
              <input type="email" name="email" id="email" class="champs" placeholder="@gmail.com" autocomplete="off" />
            </div>
          </label>

          <label for="">Téléphone
            <div>
              <input type="tel" name="tel" id="tel" class="champs" placeholder="090000000" autocomplete="off" />
            </div>
          </label>

          <label for="">Date de naissance
            <div>
              <input type="date" name="datenaiss" id="ndate" class="items champs" />
            </div>
          </label>

          <label for="fichier">Photo

            <div>
          </label><input type="file" accept="image/jpeg, image/png, image/jpg" name="fichier" id="fichier" class="champs-photo" />
      </div>
      </label>

      <div id="">
        <button class="btn ajout" id="btnajout">
          Ajouter ce contact
        </button>
      </div>
      <div>
        <button class="btn ann" id="btnannuler">Annuler</button>
      </div>
      </form>
    </div>
    </div>

  </section>

  <?php
  unset($_SESSION['ajouterror']);
  unset($_SESSION['envoireussi']);
  ?>
  <script src="script.js"></script>
</body>

</html>