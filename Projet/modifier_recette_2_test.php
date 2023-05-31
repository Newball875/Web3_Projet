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
    <script src="javascript/recette.js"></script>
    <?php include "javascript/ajout_recette_js.php"; ?>

</head>
<body>
<?php include "class/header.php" ?>

<div class="title"></div>
<form id="accueil" action="modification_recette.php" method="POST" enctype="multipart/form-data">

    <div id="bouton_final">
        <button type="submit" class="envoyer">Envoyer</button>
    </div>

    <div class="origine">
        <div class="neon">
            <div class="ligne1">
                <div class="image"> <?php
                    $results=Connexion::prendreImageRecette($pdo,$id);
                    echo "<img src='$chemin_image"."/recettes/"."$results->image' alt='$results->nom'>";
                    ?>
                </div>
                <div class="informations">
                    <div class="nom">
                        <label for="name" class="form-label"><?php
/*                            echo Connexion::prendreNomRecette($pdo,$id);
                            */?>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la recette" value="<?=$recette->nom?>">
                        </label>
                    </div>
                    <div class="taille-boutons">
                        <button type="button" id="moins-tag" class="moins">-</button>
                        <button type="button" id="plus-tag" class="plus">+</button>
                    </div>
                    <div id="liste-tags" class="liste-tags">
                        <h1>Tags</h1>
                        <div class="select">
                            <select class="menu_tag" name="tags0">
                                <option value="">Tags</option>
                            </select>
                        </div>
                    </div>
                    <input type="file" class="form-control" id="image" name="image">
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

                        <h1>Ingrédients</h1>
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
        <div id="choix-origine" class="choix-origine">
            <h1>Origine</h1>
            <?php
            if($origine[0]!=null){
                $origine=$origine[0];
                echo "Origine : ".$origine->nom;
                echo "<div class='description_origine'>";
                echo "<div id='description'>";
                echo "<img src='$chemin_image"."/origine/"."$origine->image' alt='$origine->nom'>";
                echo "<p>$origine->description</p>";
            }else{
                echo "Aucune origine";
            }
            ?>
            <div class="select">
                <select class="origine" name="origine">
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
    </div>
</form>

<?php include "class/footer.php" ?>

</body>
</html>
