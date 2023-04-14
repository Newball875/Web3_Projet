<?php include "init.php" ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <link rel="stylesheet" href="css/stylerecherche.css">
    <script src="js/script.js"></script>

</head>
<body>

<?php include "class/header.html" ?>

<div class="title"></div>
<form id="recherche" method="POST" enctype="multipart/form-data">
    <div class="mot">
        <label for="name" class="form-label">Mot recherché</label>
    </div>
    <div class="filtre">
        <label for="name" class="form-label">Filtre</label>
    </div>

    <div class="page">
        <div class="cadre">
            <a href="recette.php">
                <img src="ressources/img/beurre_doux.png">
                <p>Nom</p>
                <p>Tag</p>
                <p>Ingrédient</p>
            </a>
        </div>
    </div>
</form>

<?php include "class/footer.php" ?>

</body>
</html>