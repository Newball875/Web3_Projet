<?php include "class/init.php";?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <link rel="stylesheet" href="css/styleaccueil.css">
    <script src="js/script.js"></script>

</head>
<body>

<?php include "class/header.php" ?>

<div class="title"></div>
<form id="accueil" method="POST" enctype="multipart/form-data">
    <div id="conteneur">
        <div class="présentation">
            <label for="name" class="form-label">Présentation</label>
        </div>
        <div class="pré-description">
<!--            <label for="name" class="form-label">Description</label>-->
            <p>Le seul site pour tout les amateurs de jeux vidéos et de séries TV qui veulent ajouter leurs recettes préférées</p>
        </div>
        <div id="conteneur2">
            <div class="defile">
                <p>Mes dernières recettes</p>
                <div class="recette-jour">

                    <?php
                        $liste_recette  = Connexion::prendreDernieresRecettes($pdo,5);

                        foreach($liste_recette as $recette){?>
                            <a href="recette.php?id=<?php echo $recette->recette_id ?>">
                                <div class="dernieres-recettes">
                                    <img src="ressources/img/recettes/<?php echo $recette->image?>">
                                    <p><?php echo $recette->nom ?></p>
                                </div>

                            </a>
                        <?php
                        }
                    ?>
        </div>
    </div>
</form>

    <?php include "class/footer.php" ?>

    </body>
    </html>