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

<div id="bloc">
    <div id="boutons">
        <button id="moins">-</button>
        <button id="plus">+</button>
        <button><a href="https://www.google.com/">ajout ingrédient</a></button>
    </div>
    <form id="form-ingredient">

        <div id="liste-ingredients">
            <div>
                 <label>Ingredient</label><select name="Ingredient">
                    <option disabled class="form-control">Choisissez</option>
                </select>
            </div>
        </div>
        <button>Envoyer</button>
    </form>
</div>

<?php include "class/footer.php"?>

</body>
</html>