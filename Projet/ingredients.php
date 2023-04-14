<?php
include "class/init.php";?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <link rel="stylesheet" href="css/styleingredients.css">
    <script src="js/form_ingredients.js"></script>

</head>
<body>

<?php include "class/header.html" ?>

<div class="title"></div>
<form id="accueil" method="POST" enctype="multipart/form-data">
    <div class="origine">
        <div class="neon">
            <div class="image">
                <img src="ressources/img/ingredients/farine.png">
            </div>
            <div class="nom">
                <label for="name" class="form-label"> Nom
                </label>
            </div>
            <div class="bouton">
                <button>Envoyer</button>
            </div>
        </div>
    </div>

</form>

<?php include "class/footer.php" ?>

</body>
</html>
