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

    <link rel="stylesheet" href="css/stylerecette.css">
    <link rel="stylesheet" href="css/title.css">

</head>
<body>

<?php include "class/header.php"?>

<div class="title">Ajouter origine</div>
<form id="accueil" action="update_origine.php" method="POST" enctype="multipart/form-data">
    <div class="origine">
        <div class="neon">
            <div class="bouton_final">
                <button type="submit" class="envoyer">Envoyer</button>
            </div>
            <div style="padding: 3%;display: flex;flex-direction: row;" id="infos">
                <div style="margin-right: 10%;display: flex;flex-direction: column" class="image">
                    <label style="margin-right: 5%;margin-top: 1%" for="image" class="form_label">Ajouter image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div>
                    <div style="display: flex;flex-direction: row;margin-bottom: 5em" class="nom">
                        <label style="margin-right: 6em;margin-top: 1%" for="le_fichier" class="form_label">Ajouter nom</label>
                        <input style="height: 30%;padding: 1%;font-size: 1.1em;margin-right: 5%" type="text" class="form-control" id="name" name="name" placeholder="Nom de l'origine" value="">
                    </div>

                    <div style="display: flex;flex-direction: row" class="descriptO">
                        <label style="margin-right: 2.3em;margin-top: 1%" for="le_fichier" class="form_label">Ajouter description</label>
                        <textarea id="instructions" class="form-control" name="description" rows="5" cols="25" placeholder="Description"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<?php include "class/footer.php"?>

</body>
</html>