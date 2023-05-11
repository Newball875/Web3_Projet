<?php include "class/init.php";
$i=0;
$liste_recherche=[];
$tab_ingredients=Connexion::prendreTousIngredients($pdo);
$tab_tags=Connexion::prendreTousTags($pdo);
if(isset($_POST["recherche"])){
    $liste_ingredients=[];
    $liste_tags=[];
    while(isset($_POST["ingredients".$i])){
        array_push($liste_ingredients,$_POST["ingredients".$i]);
        $i=$i+1;
    }
    $i=0;
    while(isset($_POST["tags".$i])){
        array_push($liste_tags,$_POST["tags".$i]);
        $i=$i+1;
    }
    $liste_recherche=Connexion::rechercheRecette($pdo,$_POST["recherche"],$liste_ingredients,$liste_tags);
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
    <?php include_once "javascript/page_recherche_js.php"?>

</head>
<body>

<?php include "class/header.php" ?>

<div class="page">
    <div class="border">
        <div class="titre-recherche">
            RECHERCHE
        </div>
        <div id="barre-recherche">
            <form class="form" action="page_recherche.php" method="POST" enctype="multipart/form-data">
                <div class="recherche">
                    <input type="text" class="form-control" id="recherche" name="recherche" placeholder="Nom de la recette" value="<?=$_POST["recherche"]?>">
                </div>
                <div class="filtre">
                    <div id="ingredients">
                    </div>
                    <div id="tags">
                    </div>
                </div>
                <div class="envoyer">
                    <button type="submit" class="envoyer">Envoyer</button>
                </div>
            </form>
            <div class="boutons-ingredients">
                <div class="nom-ingrédients">
                    <p>Ingrédients :</p>
                </div>
                <div class="taille-boutons">
                    <button id="moins_ing" class="moins">-</button>
                    <button id="plus_ing" class="plus">+</button>
                </div>
            </div>
            <div class="boutons-tags">
                <div class="nom-tags">
                    <p>Tags :</p>
                </div>
                <div class="taille-boutons">
                    <button id="moins_tag" class="moins">-</button>
                    <button id="plus_tag" class="plus">+</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="resultats-recherche">
    <?php
        foreach($liste_recherche as $recette){
            echo "<a href='recette.php?id=$recette->id'>";
            echo '<div class="page-recette">';
            echo '<div class="image-recette">';
            echo "<img src='$chemin_image"."/recettes/"."$recette->image' alt='$recette->nom'>";
            echo "</div>";
            echo '<div class="nom-recette">';
            echo "<p>$recette->nom</p>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
        }
    ?>
</div>
    

<?php include "class/footer.php"; ?>

</body>
</html>