<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <link rel="stylesheet" href="css/stylerecette.css">
    <script src="js/stylerecette.js"></script>

</head>
<body>

<?php include "class/header.html" ?>

<div class="title"></div>
<form id="accueil" method="POST" enctype="multipart/form-data">
    <div class="origine">
        <div class="neon">
            <div class="image">
                <img src="ressources/img/logoweb3.png">
            </div>
            <div class="nom">
                <label for="name" class="form-label">Nom</label>
            </div>
            <div class="tag">
                <label for="description" class="form-label">Tag</label>
            </div>
            <div class="fenetre">
                <label for="name" class="form-label">Ingrédients</label>
                <li>.</li>
                <li>.</li>
                <li>.</li>
            </div>
            <div class="fenetre">
                <label for="name" class="form-label">Ustensiles</label>
                <li>.</li>
                <li>.</li>
                <li>.</li>
            </div>
            <div class="description">
                <label for="name" class="form-label">Bonjour, je m'appellle Robin, je viens d'Arcachon et mon talent c'est les bains moussants</label>
            </div>
        </div>
    </div>
</form>
<script>

    <?php include "class/footer.html" ?>

    </body>
    </html>