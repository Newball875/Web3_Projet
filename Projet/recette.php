<?php
$id=$_GET["id"];
include "class/head.php";
?>

<body>
<?php include "class/header.html" ?>

<div class="title"></div>
<form id="accueil" method="POST" enctype="multipart/form-data">
    <div class="origine">
        <div class="neon">
            <div class="image"> <?php
                $results=Connexion::prendreImageRecette($pdo,$id);
                echo "<img src='$chemin_image"."/recettes/"."$results->image' alt='$results->nom'>";
            ?>
            </div>
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
            <div class="description">
                <label for="name" class="form-label"> <?php
                $results=Connexion::prendreInstructions($pdo,$id);
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
