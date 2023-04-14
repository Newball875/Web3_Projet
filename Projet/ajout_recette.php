<?php include_once "class/init.php";

$tab_ingredients=Connexion::prendreTousIngredients($pdo);
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
    <?=include_once "javascript/ajout_recette_js.php"?>

</head>
<body>

<?php include "class/header.html"?>

<div id="titre_ajout">
    <p>Nouvelle recette</p>
</div>
<div id="boutons">
    <button id="moins">-</button>
    <button id="plus">+</button>
</div>
<div>
    <form action="ajout_recette.php" method="POST" enctype="multipart/form-data">
	    <div id="infos">
		    <label for="le_fichier" class="form_label">Uploader une recette :</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la recette">
    		<input type="text" class="form-control" id="instructions" name="instructions" placeholder="Instructions">
	    	<input type="file" class="form-control" id="image" name="image">
	    </div>
        <div>
            <div id="liste-ingredients">
                <h1>Ingrédient</h1>
                    <select class="menu_ingredient" name="ingredients">
                        <option value="">Ingrédients</option>
                        <?php
                        foreach($tab_ingredients as $ingredient){
                            echo "<option value='$ingredient->nom'>$ingredient->nom</option>";
                        }
                        ?>
                    </select>
            </div>
        </div>
	    <div id="bouton_final">
		    <button type="submit">Envoyer</button>
    	</div>
    </form>
</div>

<?php include "class/footer.php"?>

</body>
</html>