<?php include_once "class/init.php";
if(!isset($_SESSION["nick"])){
    header("Location: index.php");
    exit();
}
$tab_ingredients=Connexion::prendreTousIngredients($pdo);
$tab_origine=Connexion::prendreTousOrigines($pdo);
$tab_tags=Connexion::prendreTousTags($pdo);

$tags=[];
$ingredients=[];
$origine=[];
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

<!--    <link rel="stylesheet" href="css/ajout_recette.css">-->

    <link rel="stylesheet" href="css/stylerecette.css">
    <link rel="stylesheet" href="css/style_modifier_recette.css">
    <link rel="stylesheet" href="css/title.css">

    <script src="javascript/recette.js"></script>
    <?php include "javascript/ajout_recette_js.php"; ?>

</head>
<body>

<?php include "class/header.php"?>

<div class="title">Ajouter recette</div>

<form id="accueil" action="update_recette.php" method="POST" enctype="multipart/form-data">



    <div class="origine">

        <div class="neon">
            <div id="bouton_final">
                <button type="submit" class="envoyer">Envoyer</button>
            </div>

            <div class="ligne1">

                <div class="nom-image">
                    <div class="nom">
                        <label for="name" class="form-label">
                            <p>Modifier nom</p>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la recette" value="">
                        </label>
                    </div>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="informations">

                    <div class="taille-boutons">
                        <button type="button" id="moins-tag" class="moins">-</button>
                        <button type="button" id="plus-tag" class="plus">+</button>
                    </div>
                    <div id="liste-tags" class="liste-tags">
                        <h1>Modifier tags</h1>
                        <div class="select">
                            <select class="menu_tag" name="tags0">
                                <option value="">Tags</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="choix-origine" class="choix-origine">
                    <div class="select">
                        <select id="select-origine" name="origine">
                            <option disabled>Origine</option>
                            <?php
                            foreach($tab_origine as $media){
                                echo "<option value='$media->id'>$media->nom</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="ligne2">
                <div class="fenetre ">
                    <!--<label for="name" class="form-label">Ingrédients</label> --><?php
                    /*                    $results=Connexion::prendreListeIngredients($pdo,$id);
                                        foreach($results as $info):
                                            echo "<li>$info->ingredient</li>";
                                        endforeach;
                                        */?>

                    <div class="taille-boutons">
                        <button type="button" id="moins" class="moins">-</button>
                        <button type="button" id="plus" class="plus">+</button>
                    </div>
                    <div id="liste-ingredients" class="liste-ingredients">

                        <h1>Modifier ingrédients</h1>
                        <div class="select">
                            <select class="menu_ingredient" name="ingredients0">
                                <option>Ingrédients</option>
                            </select>
                            <input type="number" class="form-control" name="quantite0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="ligne3">
                <div class="description">
                    <label for="name" class="form-label"> <?php
                        /*                        $results=Connexion::prendreInstructions($pdo,$id);
                                                echo "<p>$results</p>";
                                                */?>
                        <textarea id="instructions" class="form-control" name="instructions" rows="12" cols="50" placeholder="Instructions"></textarea>
                    </label>
                </div>
            </div>
        </div>
    </div>

</form>


<!---->
<!---->
<!--<div class="page">-->
<!--    <form class="form" action="update_recette.php" method="POST" enctype="multipart/form-data">-->
<!--        <div id="infos">-->
<!--            <label for="le_fichier" class="form_label">Uploader une recette :</label>-->
<!--            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la recette">-->
<!--            <textarea id="instructions" class="form-control" name="instructions" rows="5" cols="33" placeholder="Instructions"></textarea>-->
<!--            <input type="file" class="form-control" id="image" name="image">-->
<!--        </div>-->
<!--        <div class="liste">-->
<!--            <div id="liste-ingredients" class="liste-ingredients">-->
<!--                <h1>Ingrédients</h1>-->
<!--                <a href="ajout_ingredient.php">Nouvel ingrédient</a>-->
<!--                <div class="select">-->
<!--                    <select class="menu_ingredient" name="ingredients0">-->
<!--                        <option value="">Ingrédients</option>-->
<!--                    </select>-->
<!--                    <input type="number" class="form-control" name="quantite0">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div id="liste-tags" class="liste-tags">-->
<!--                <h1>Tags</h1>-->
<!--                <a href="ajout_tag.php">Nouveau tag</a>-->
<!--                <div class="select">-->
<!--                    <select class="menu_tag" name="tags0">-->
<!--                        <option value="">Tags</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div id="choix-origine" class="choix-origine">-->
<!--                <h1>Origine</h1>-->
<!--                <a href="ajout_origine.php">Nouvelle origine</a>-->
<!--                <div class="select">-->
<!--                    <select class="origine" name="origine">-->
<!--                        <option value="" disabled>Origine</option>-->
<!--                        --><?php
//                        //Affiche les
//                        foreach($tab_origine as $media){
//                            echo "<option value='$media->id'>$media->nom</option>";
//                        }
//                        ?>
<!--                    </select>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="bouton_final">-->
<!--            <button type="submit" class="envoyer">Envoyer</button>-->
<!--        </div>-->
<!--    </form>-->
<!--    <div class="boutons">-->
<!--        <div class="nom_ingrédients">-->
<!--            <h1>Ingrédients :</h1>-->
<!--        </div>-->
<!--        <div class="taille-boutons">-->
<!--            <button id="moins" class="moins">-</button>-->
<!--            <button id="plus" class="plus">+</button>-->
<!--        </div>-->
<!--        <div class="nom-tags">-->
<!--            <h1>Tags:   </h1>-->
<!--        </div>-->
<!--        <div class="taille-boutons">-->
<!--            <button id="moins-tag" class="moins">-</button>-->
<!--            <button id="plus-tag" class="plus">+</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<?php include "class/footer.php"?>

</body>
</html>