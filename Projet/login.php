<?php include "class/init.php";
$message="";
if(isset($_GET["nick"]) and $_GET["nick"]==0){
    $message="Pseudo incorrect !";
}elseif(isset($_GET["pwd"]) and $_GET["pwd"]==0){
    $message="Mot de passe incorrect !";
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/title.css">
    <link rel="stylesheet" href="css/stylelogin.css">
    <script src="javascript/login.js"></script>

</head>
<body>

<?php include "class/header.php";
if(!isset($_SESSION["nick"])){?>
<div class="title">Login</div>
<form id="login-form" action="log.php" method="post">
    <div id="content">
        <div id="inputs">
            <div class="form-group">
                <label for="nick">Pseudo</label>
                <input type="text" class="form-control" name="nick" id="nick" value="recette">
            </div>
            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" class="form-control" name="password" id="password" value="1234">
            </div>
        </div>
        <p id="message-erreur"><?=$message?></p>
    </div>
    <div id="buttons">
        <button type="submit" class="envoyer">Envoyer</button>
        <div style="width: 1em"></div>
    </div>
</form>
<?php
}else{?>
    <div class="title">Bienvenue <?= $_SESSION["nick"]?></div>
    <div class="page-admin">
        <div id="admin" class="admin">
            <a href="ajout_recette.php">Ajouter une recette</a>
        </div>
        <div id="admin" class="admin">
            <a href="liste_tags.php">Liste des tags</a>
            <a href="liste_ingredients.php">Liste des ingrédients</a>
            <a href="liste_origines.php">Liste des origines</a>
        </div>
        <div class="logout">
            <input type="button" id="logout" value="LOG OUT">
        </div>
    </div>
    <?php
}
?>
<?php include "class/footer.php" ?>

</body>
</html>
