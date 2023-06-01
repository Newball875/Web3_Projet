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

<!--    <link rel="stylesheet" href="css/ajout_recette.css">-->

    <link rel="stylesheet" href="css/stylerecette.css">
    <link rel="stylesheet" href="css/title.css">

</head>
<body>

<?php include "class/header.php"?>

<div class="title">Modifier <?= $ingredient->nom ?></div>
<form id="accueil" action="modification_ingredients.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
    <div class="origine">
        <div class="neon">

            <div class="bouton_final">
                <button type="submit" class="envoyer">Envoyer</button>
            </div>

            <div style="padding: 3%;display: flex;flex-direction: row;" id="infos">
                <div style="margin-right: 10%;display: flex;flex-direction: column" class="image">
                    <div>
                        <img style="max-height: 6em;width: auto; margin-right: 2%;margin-bottom: 10%" src="<?= $chemin_image . "ingredients" . DIRECTORY_SEPARATOR . $ingredient->image ?>" alt="image de <?= $ingredient->nom ?>">
                    </div>
                    <label style="margin-right: 5%;margin-top: 1%" for="image" class="form_label">modifier image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div style="display: flex;flex-direction: row" class="nom">
                    <label style="margin-right: 5%;margin-top: 1%" for="le_fichier" class="form_label">modifier nom</label>
                    <input  style="height: 30%;padding: 1%;font-size: 1.1em;margin-right: 5%" type="text" class="form-control" id="name" name="name" placeholder="Nom de l'ingrédient" value="<?= $ingredient->nom ?>">
                </div>


            </div>
        </div>
    </div>
</form>

<?php include "class/footer.php"?>

</body>
</html>
