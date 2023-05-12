<?php
include "class/init.php";
if(isset($_GET["id"])){
    $id=$_GET["id"];
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
    <script src="javascript/recette.js"></script>

</head>
<body>
<?php include "class/header.php" ?>

<div class="title"></div>
<form id="accueil" method="POST" enctype="multipart/form-data">
    <div class="origine">
        <div class="neon">
            <div class="ligne1">
                <div class="image"> <?php
                    $results=Connexion::prendreImageRecette($pdo,$id);
                    echo "<img src='$chemin_image"."/recettes/"."$results->image' alt='$results->nom'>";
                    ?>
                </div>
                <div class="informations">
                    <div class="nom">
                        <label for="name" class="form-label"><?php
                            echo Connexion::prendreNomRecette($pdo,$id);
                        ?>
                        </label>
                    </div>
                    <div class="tag">
                        <label for="description" class="form-label"> <?php
                        $results=Connexion::prendreListeTag($pdo,$id);
                        foreach($results as $info):
                            echo $info->tag." ";
                        endforeach;
                        ?>
                        </label>
                    </div>
                </div>
                <?php
                if(isset($_SESSION["nick"])){
                    $_SESSION["id_recette"]=$id;?>
                    <div class="modifications">
                        <input type="button" id="modif" value="Modifier">
                        <input type="button" id="suppr" value="Supprimer">
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="ligne2">
                <div class="fenetre">
                    <label for="name" class="form-label">Ingrédients</label> <?php
                    $results=Connexion::prendreListeIngredients($pdo,$id);
                    foreach($results as $info):
                        echo "<li>$info->ingredient</li>";
                    endforeach;
                    ?>
                </div>
                <div class="fenetre">
                    <label for="name" class="form-label">Ustensiles</label>
                    <li>.</li>
                    <li>.</li>
                    <li>.</li>
                </div>
            </div>
            <div class="ligne3">
                <div class="description">
                    <label for="name" class="form-label"> <?php
                    $results=Connexion::prendreInstructions($pdo,$id);
                    echo "<p>$results</p>";
                    ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="origine" id="origine">
        <?php
        $results=Connexion::prendreOrigine($pdo,$id);
        if($results!=null){
            echo "Origine : ".$results->nom;
            echo "<div class='description_origine'>";
            echo "<div id='description'>";
            echo "<img src='$chemin_image"."/origine/"."$results->image' alt='$results->nom'>";
            echo "<p>$results->description</p>";
        }
        ?>
        </div>
        </div>
    </div>
</form>

    <?php include "class/footer.php" ?>

    </body>
    </html>
