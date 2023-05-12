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
//if(!Connexion::tagExiste($pdo,$_GET["id"])) {
//    header("Location: liste_tags.php");
//    exit();
//}
if(isset($_POST['name']) && isset($_GET['id'])){
    Connexion::modifierTag($pdo, $id, $_POST['name']);

}
$tag=Connexion::prendreTag($pdo, $id);


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
    <p>Modifier Tag</p>
</div>
<div>
    <form action="modifier_tags.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
        <div id="infos">
            <label for="le_fichier" class="form_label">Modifier <?= $tag ?> :</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom du tag" value="<?= $tag ?>">
            <div class="bouton_final">
                <button type="submit" class="envoyer">Envoyer</button>
            </div>
        </div>
    </form>
</div>

<?php include "class/footer.php"?>

</body>
</html>
