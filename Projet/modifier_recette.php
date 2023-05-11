<?php include_once "class/init.php";

$tab_ingredients=Connexion::prendreTousIngredients($pdo);
$tab_origine=Connexion::prendreTousOrigines($pdo);
$tab_tags=Connexion::prendreTousTags($pdo);

$id=$_SESSION["id_recette"];
$recette=Connexion::prendreImageRecette($pdo,$id);
$instructions=Connexion::prendreInstructions($pdo,$id);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <link rel="stylesheet" href="css/modifier_recette.css">
    <?php include "javascript/ajout_recette_js.php"; ?>

</head>
<body>

<?php include "class/header.php"?>

<div id="titre_ajout">
    <p>Modification de la recette : <?=$recette->nom?></p>
</div>
<div class="page">
    <form class="form" action="update_recette.php" method="POST" enctype="multipart/form-data">
        <div id="infos">
            <label for="le_fichier" class="form_label">Changer la recette :</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la recette" value="<?=$recette->nom?>">
            <textarea id="instructions" class="form-control" name="instructions" rows="5" cols="33" placeholder="Instructions"><?=$instructions?></textarea>
            <input type="file" class="form-control" id="image" name="image"><?php
	        echo "<img src='$chemin_image"."/recettes/"."$recette->image' alt='$recette->nom'>";?>
        </div>
        <div class="liste">
            <div id="liste-ingredients" class="liste-ingredients">
                <h1>Ingrédients</h1>
                <div>
                    <select class="menu_ingredient" name="ingredients0">
                        <option value="">Ingrédients</option>
                    </select>
                    <input type="number" class="form-control" name="quantite0">
                </div>
            </div>
            <div id="liste-tags" class="liste-tags">
                <h1>Tags</h1>
                <div>
                    <select class="menu_tag" name="tags0">
                        <option value="">Tags</option>
                    </select>
                </div>
            </div>
            <div id="choix-origine" class="choix-origine">
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
        </div>
        <div id="bouton_final">
            <button type="submit" class="envoyer">Envoyer</button>
        </div>
    </form>
    <div class="boutons">
        <div class="nom_ingrédients">
            <h1>Ingrédients :</h1>
        </div>
        <div class="taille-boutons">
            <button id="moins" class="moins">-</button>
            <button id="plus" class="plus">+</button>
        </div>
        <div class="nom-tags">
            <h1>Tags:   </h1>
        </div>
        <div class="taille-boutons">                 
            <button id="moins-tag" class="moins">-</button>
            <button id="plus-tag" class="plus">+</button>
        </div>
    </div>
</div>

<?php include "class/footer.php"?>

</body>
</html>

<?php // à faire :
//click() en js (appuyer sur les boutons)
//selected sur les select pour mettres les ingrédients, tags et origines par défaut