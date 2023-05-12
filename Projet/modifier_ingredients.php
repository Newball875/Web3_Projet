<?php include "class/init.php";
$message="";
if(!isset($_SESSION["nick"])){
    header("Location: accueil.php");
    exit();
}

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    header("Location: liste_tags.php");
    exit();
}
if(!Connexion::ingredientExiste($pdo,$_GET["id"])) {
    header("Location: liste_ingredients.php");
    exit();
}
$ingredient=Connexion::prendreImageIngredient($pdo,$id);
if(isset($_POST['name']) && isset($_GET['id']) && isset($_FILES['image'])){
    Connexion::modifierIngredient($pdo, $id, $_POST['name'],$_FILES['image']['name']);
    $nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."ingredients".DIRECTORY_SEPARATOR;
    $nom_fic=$_FILES["image"]['name'];
    $nom_final=$nom_dos.$_FILES["image"]['name'];
    move_uploaded_file($_FILES['image']["tmp_name"],$nom_final);
}
elseif (isset($_POST['name']) && isset($_GET['id'])){
    Connexion::modifierIngredient($pdo, $id, $_POST['name'],$ingredient->image);
}


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
    <form action="modifier_ingredients.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
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
