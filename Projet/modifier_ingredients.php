<?php include "class/init.php";
if(!isset($_SESSION["nick"])){
    header("Location: index.php");
    exit();
}
if(!isset($_GET["id"]) || (Connexion::ingredientExiste($pdo,$_GET["id"]))){
    $id = $_GET["id"];
}else{
    header("Location: liste_ingredients.php");
    exit();
}
$ingredient=Connexion::prendreImageIngredient($pdo,$id);


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
    <?php include_once "javascript/ajout_recette_js.php"?>

</head>
<body>

<?php include "class/header.php"?>

<div id="titre_ajout">
    <p>Modifier Ingrédient</p>
</div>
<div>
    <form action="modification_ingredients.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
        <div id="infos">
            <label for="le_fichier" class="form_label">modifier <?= $ingredient->nom ?> :</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de l'ingrédient" value="<?= $ingredient->nom ?>">
            <img src="<?= $chemin_image . "ingredients" . DIRECTORY_SEPARATOR . $ingredient->image ?>" alt="image de <?= $ingredient->nom ?>">
            <input type="file" class="form-control" id="image" name="image">
            <div class="bouton_final">
                <button type="submit" class="envoyer">Envoyer</button>
            </div>
        </div>
    </form>
</div>

<?php include "class/footer.php"?>

</body>
</html>
