<?php include_once "class/init.php";
if(!isset($_SESSION)){
    header("Location: index.php");
    exit();
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
    <p>Nouvelle Origine</p>
</div>
<div>
    <form action="update_origine.php" method="POST" enctype="multipart/form-data">
        <div id="infos">
            <label for="le_fichier" class="form_label">Uploader une origine :</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de l'origine">
            <textarea id="instructions" class="form-control" name="description" rows="5" cols="33" placeholder="Description"></textarea>
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