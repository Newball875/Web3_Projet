<?php include "class/init.php";
$message="";
if(!isset($_SESSION["nick"])){
    header("Location: index.php");
    exit();
}

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    header("Location: liste_tags.php");
    exit();
}
if(!Connexion::tagExiste($pdo,$_GET["id"])) {
    header("Location: liste_tags.php");
    exit();
}
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

    <link rel="stylesheet" href="css/stylerecette.css">
    <link rel="stylesheet" href="css/title.css">



</head>
<body>

<?php include "class/header.php"?>

<div class="title">Modifier <?= $tag ?></div>
<form id="accueil" action="modification_tags.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
    <div class="origine">
        <div class="neon">
            <div class="bouton_final">
                <button type="submit" class="envoyer">Envoyer</button>
            </div>
            <div style="padding: 3%;display: flex;flex-direction: row;" id="infos">
                <label style="margin-right: 5%;margin-top: 1%">Modifier nom</label>
                <input style="padding: 1%;font-size: 1.1em" type="text" class="form-control" id="name" name="name" placeholder="Nom du tag" value="<?= $tag ?>">
            </div>
        </div>
    </div>
</form>

<?php include "class/footer.php"?>

</body>
</html>
