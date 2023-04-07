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
            <div class="image1">
                <img src="ressources/img/beurre_doux.png">
            </div>
            <div class="image2">
                <img src="ressources/img/farine.png">
            </div>
            <div class="image3">
                <img src="ressources/img/gauffre.jpg">
            </div>
            <div class="image4">
                <img src="ressources/img/lait.png">
            </div>
            <div class="image5">
                <img src="ressources/img/oeuf.png">
            </div>
        </div>
    </div>
</form>
<script>

    <?php include "class/footer.html" ?>

    </body>
    </html>