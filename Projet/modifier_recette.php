<?php include_once "class/init.php";
if(!isset($_SESSION["nick"])){
    header("Location: liste_recettes.php");
    exit();
}

$tab_ingredients=Connexion::prendreTousIngredients($pdo);
$tab_origine=Connexion::prendreTousOrigines($pdo);
$tab_tags=Connexion::prendreTousTags($pdo);
$id=$_SESSION["id_recette"];
$recette=Connexion::prendreImageRecette($pdo,$id);
$instructions=Connexion::prendreInstructions($pdo,$id);
$tags=Connexion::prendreListeTag($pdo,$id);
$ingredients=Connexion::prendreListeIngredients($pdo,$id);
$origine=Connexion::prendreOrigine($pdo,$id);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <link rel="stylesheet" href="css/stylerecette.css">
    <link rel="stylesheet" href="css/style_modifier_recette.css">
    <link rel="stylesheet" href="css/title.css">
    <style>
        .lien{
            color: black;
            text-decoration: none;
        }
    </style>

    <script src="javascript/recette.js"></script>
    <?php include "javascript/modif_recette_js.php"; ?>

</head>
<body>
<?php include "class/header.php" ?>

<div class="title">Modifier <?= Connexion::prendreNomRecette($pdo,$id) ?></div>
<form id="accueil" action="modification_recette.php" method="POST" enctype="multipart/form-data">



    <div class="origine">

        <div class="neon">
            <div id="bouton_final">
                <button type="submit" class="envoyer">Envoyer</button>
            </div>

            <div class="ligne1">

                <div class="nom-image">
                    <div class="image"> <?php
                        $results=Connexion::prendreImageRecette($pdo,$id);
                        echo "<img src='$chemin_image"."/recettes/"."$results->image' alt='$results->nom'>";
                        ?>
                    </div>
                    <div class="nom">
                        <label for="name" class="form-label">
                            <p>Modifier nom</p>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la recette" value="<?=$recette->nom?>">
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
                        <a class="lien" href="ajout_tag.php">Nouveau tag</a>
                        <h1>Modifier tags</h1>
                        <div class="select">
                            <select class="menu_tag" name="tags0">
                                <option value="">Tags</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="choix-origine" class="choix-origine">
                    <?php
                    $results=Connexion::prendreOrigine($pdo,$id);
                    if($results[0]!=null){
                        $results=$results[0];
                        ?>

                        <div class='description_origine'>
                            <a class="lien" href="ajout_origine.php">Nouvelle origine</a>
                            <div id='description'>
                                <div id="or-desc">

                                    <div>Modifier origine : </div>
                                    <div class="origine-title"><?= $results->nom ?></div>
                                    <p><?= $results->description ?></p>
                                </div>
                                <img src='<?= $chemin_image."/origine/". $results->image?>' alt='<?= $results->nom ?>'>
                            </div>
                        </div>
                        <?php
                    }else{
                        echo "Aucune origine";
                    }
                    ?>
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

                    <div class="taille-boutons">
                        <button type="button" id="moins" class="moins">-</button>
                        <button type="button" id="plus" class="plus">+</button>
                    </div>
                    <div id="liste-ingredients" class="liste-ingredients">
                        <a class="lien" href="ajout_ingredient.php">Nouvel ingrédient</a>
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
                        <textarea id="instructions" class="form-control" name="instructions" rows="12" cols="50" placeholder="Instructions"><?=$instructions?></textarea>
                    </label>
                </div>
            </div>
        </div>
    </div>

</form>

<?php include "class/footer.php" ?>

</body>
</html>
