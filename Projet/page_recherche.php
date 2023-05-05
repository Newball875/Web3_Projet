<?php include "class/init.php";
if(!isset($_POST["recherche"])){
    header("Location: accueil.php");
    exit;
}
$liste_recherche=Connexion::rechercheRecette($pdo, $_POST["recherche"]);
$liste_ingredients=[];
$liste_ingredient_unique=[];
$i=0;
while($i < sizeof($liste_recherche)){
    $liste_ingredients[$i]=Connexion::prendreListeIngredients($pdo, $liste_recherche[$i]->id);
    $i=$i+1;
}
$liste
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

<div class="title"></div>
<form id="recherche" method="POST" enctype="multipart/form-data">
    <div class="mot">
        <label for="name" class="form-label">Mot recherché</label>
        <p><?php echo $_POST["recherche"];?>
    </div>
    <div class="filtre">
        <label for="name" class="form-label">Filtres</label>
        <div class="filtre-tag">

        </div>
        <div class="filtre-ingredient">
            <ul>
            <?php
            $i=0;
            while($i<sizeof($liste_ingredient_unique)){
                echo "<li>".$liste_ingredient_unique[$i]."</li>";
                $i=$i+1;
            }
            ?>
            </ul>
        </div>
    </div>

    <div class="page">
        <?php
        $i=0;
        while($i<sizeof($liste_recherche)){
            $recette=$liste_recherche[$i];
            $j=0;
            echo "<a href=recette.php?id=$recette->id>";
            echo '<div class="recette">';
            echo "<img src='$chemin_image"."/recettes/"."$recette->image' alt='$recette->nom'>";
            echo "<p>$recette->nom</p>";
            echo "<p>";
            while($j<sizeof($liste_ingredients[$i])){
                $ingredient=$liste_ingredients[$i][$j];
                echo $ingredient->quantite."x ".$ingredient->ingredient;
                $j=$j+1;
                if($j!=sizeof($liste_ingredients[$i])){
                    echo ", ";
                }
            }
            echo "</p>";
            echo "</div>";
            echo "</a>";
            $i=$i+1;
        }
        ?>
    </div>
</form>

<?php include "class/footer.php" ?>

</body>
</html>