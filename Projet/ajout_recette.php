<?php include_once "class/init.php";

$tab_ingredients=Connexion::prendreTousIngredients($pdo);
$tab_origine=Connexion::prendreTousOrigines($pdo);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <link rel="stylesheet" href="css/ajout_recette.css">
    <?php
    include_once "javascript/ajout_recette_js.php";
    ?>

</head>
<body>

<?php include "class/header.html"?>

<div id="titre_ajout">
    <p>Nouvelle recette</p>
</div>
<div>
    <form action="update_recette.php" method="POST" enctype="multipart/form-data">
        <div id="infos">
            <label for="le_fichier" class="form_label">Uploader une recette :</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la recette">
            <textarea id="instructions" name="instructions" rows="5" cols="33" placeholder="Instructions"></textarea>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div id="origine">
            <label for="le_media" class="form_label" enctype="multipart/form-data">

        </div>
        <div id="liste-ingredients">
            <h1>Ingrédients</h1>
            <div>
                <select class="menu_ingredient" name="ingredients0">
                    <option value="" disabled>Ingrédients</option>
                    <?php
                    foreach($tab_ingredients as $ingredient){
                        echo "<option value='$ingredient->id'>$ingredient->nom</option>";
                    }
                    ?>
                </select>
                <input type="number" class="form-control" name="quantite0">
            </div>
        </div>
        <div id="choix-origine">
            <h1>Origine</h1>
            <div>
                <select class="origine" name="origine">
                    <option value="" disabled>Origine</option>
                    <?php
                    foreach($tab_origine as $media){
                        echo "<option value='$media->id'>$media->nom</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div id="bouton_final">
            <button type="submit" name="ok" value="1">Envoyer</button>
        </div>
    </form>
    <div id="boutons">
        <button id="moins">-</button>
        <button id="plus">+</button>
    </div>
</div>

<?php include "class/footer.php"?>

</body>
</html>