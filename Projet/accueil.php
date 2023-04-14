<!doctype html>
<html lang="en">
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

<?php include "class/header.html" ?>

<div class="title"></div>
<form id="accueil" method="POST" enctype="multipart/form-data">
        <div class="présentation">
            <label for="name" class="form-label">Présentation</label>
        </div>
        <div class="pré-description">
            <label for="name" class="form-label">Description</label>
        </div>

        <div class="defile">
            <div class="recette-jour">
                <a href="recette.php">
                    <img src="ressources/img/recettes/gauffre.jpg">
                </a>
                <a href="recette.php">
                <img src="ressources/img/recettes/gauffre.jpg">
                </a>
                <a href="recette.php">
                <img src="ressources/img/recettes/gauffre.jpg">
                </a>
                <a href="recette.php">
                <img src="ressources/img/recettes/gauffre.jpg">
                </a>
                <a href="recette.php">
                <img src="ressources/img/recettes/gauffre.jpg">
                </a>
            </div>
        </div>
        <div class="roulette">
            <img src="ressources/img/recettes/gauffre.jpg">
            <img src="ressources/img/recettes/gauffre.jpg">
            <img src="ressources/img/recettes/gauffre.jpg">
            <img src="ressources/img/recettes/gauffre.jpg">
            <img src="ressources/img/recettes/gauffre.jpg">
        </div>
</form>

    <?php include "class/footer.php" ?>

    </body>
    </html>