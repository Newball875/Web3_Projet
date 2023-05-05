<?php include_once "class/init.php";

if(isset($_POST['name']) and isset($_POST['type']) and isset($_POST['image'])){
    $name = $_POST['name'];
    $type = $_POST['type'];
    $image = $_POST['image'];
}
$tab_ingredients= Connexion::ajouterIngredient($pdo,);
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

<?php include "class/header.html"?>

<div id="titre_ajout">
    <p>Nouvel Ingrédient</p>
</div>
<div>
    <form action="ajout_recette.php" method="POST" enctype="multipart/form-data">
        <div id="infos">
            <label for="le_fichier" class="form_label">Uploader un ingredient :</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de l'ingrédient">
            <input type="text" class="form-control" id="type" name="type" placeholder="type">
            <input type="file" class="form-control" id="image" name="image">
        </div>
    </form>
</div>

<?php include "class/footer.php"?>

</body>
</html>