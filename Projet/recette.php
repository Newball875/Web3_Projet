<?php
$path=getcwd().DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
$chemin_image="ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR;
require $path;
autoloader::register();
$pdo=connexion::connect();
$id=$_GET["id"];
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
    <script src="js/stylerecette.js"></script>

</head>
<body>

<?php include "class/header.html" ?>

<div class="title"></div>
<form id="accueil" method="POST" enctype="multipart/form-data">
    <div class="origine">
        <div class="neon">
            <div class="image"> <?php
                $results=connexion::prendreImageRecette($pdo,$id);
                echo "<img src='$chemin_image"."$results->image' alt='$results->nom'>";
            ?>
            </div>
            <div class="nom">
                <label for="name" class="form-label"><?php
                    echo connexion::prendreNomRecette($pdo,$id);
                ?>
                </label>
            </div>
            <div class="tag">
                <label for="description" class="form-label"> <?php
                $results=connexion::prendreListeTag($pdo,$id);
                foreach($results as $info):
                    echo $info->tag." ";
                endforeach;
                ?>
                </label>
            </div>
            <div class="fenetre">
                <label for="name" class="form-label">Ingrédients</label> <?php
                $results=connexion::prendreListeIngredients($pdo,$id);
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
            <div class="description">
                <label for="name" class="form-label"> <?php
                $results=connexion::prendreInstructions($pdo,$id);
                echo "<p>$results</p>";
                ?>
                </label>
            </div>
        </div>
    </div>
</form>

    <?php include "class/footer.php" ?>

    </body>
    </html>
