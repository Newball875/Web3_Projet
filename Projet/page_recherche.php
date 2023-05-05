<?php include "class/init.php";
$i=0;
$liste_recherche=[];
if(isset($_POST["recherche"])){
    if(isset($_POST["tags"])){
        
    }
    $liste_recherche=Connexion::rechercheRecette($pdo,$_POST["recherche"]);
}else{
    $_POST["recherche"]="";
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

    <link rel="stylesheet" href="css/stylerecherche.css">
    <script src="js/script.js"></script>

</head>
<body>

<?php include "class/header.php" ?>

<div class="titre-recherche">
    RECHERCHE
</div>
<div id="barre-recherche">
    <form class="form" action="page_recherche.php" method="POST" enctype="multipart/form-data">
        <input type="text" class="form-control" id="recherche" name="recherche" placeholder="Nom de la recette" value="<?=$_POST["recherche"]?>">
        <div id="filtre">
            <input type="text" class="form-control" id="ingredients" name="ingredients" placeholder="Ingrédients">
            <input type="text" class="form-control" id="tags" name="tags" placeholder="Tags">
        </div>
        <button type="submit" class="envoyer">Envoyer</button>
    </form>
</div>

<div id="resultats-recherche"> <?php
    foreach($liste_recherche as $recette){
        echo "<a href='recette.php?id=$recette->id'>";
        echo '<div class="recette">';
        echo "<img src='$chemin_image"."/recettes/"."$recette->image' alt='$recette->nom'>";
        echo "<p>$recette->nom</p>";
        echo "</div>";
        echo "</a>";
    }
?>
</div>
<?php include "class/footer.php"; ?>

</body>
</html>