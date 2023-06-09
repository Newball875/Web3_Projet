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
    <link rel="stylesheet" href="css/title.css">
    <script src="js/script.js"></script>

</head>
<body>

<?php include "class/header.php" ?>
<div class="title">Accueil</div>
<div id="accueil">
    <div id="conteneur">

        <div class="pré-description">
            <p>Le seul site pour tous les amateurs de jeux vidéo et de séries TV qui veulent ajouter leurs recettes préférées.</p>
        </div>
        <div id="conteneur2">
            <div class="defile">
                <p> Mes dernières recettes</p>
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
        </div>
    </div>
</div>

<?php include "class/footer.php" ?>

</body>
</html>