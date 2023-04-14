<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <link rel="stylesheet" href="css/ajout_recette.css">
    <script src="javascript/form_ingredient.js"></script>

</head>
<body>

<?php include "class/header.html"?>


<form id="form-ingredient">
    <div id="boutons">
        <button id="moins">-</button>
        <button id="plus">+</button>
    </div>
    <div id="liste-ingredients">
        <div>
            <h1>Ingrédient</h1>
            <input type="text" class="form-control" name="nom" placeholder="nom ingredient">
            <input type="text" class="form-control" name="type" placeholder="type ingredient">
            <input type="text" class="form-control" name="image" placeholder="image ingredient">
        </div>
    </div>
    <button>Envoyer</button>
</form>

<?php include "class/footer.php"?>
</body>
</html>