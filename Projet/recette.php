<?php
include "class/init.php";
if(isset($_GET["id"])){
    $id=$_GET["id"];
}else{
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
    <script src="javascript/recette.js"></script>

</head>

<body>
<?php include "class/header.php" ?>
<div class="title"><?= Connexion::prendreNomRecette($pdo,$id) ?></div>
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
                    <div class="tag">
                        <label for="description" class="form-label"> <?php
                        $results=Connexion::prendreListeTag($pdo,$id);
                        foreach($results as $info):
                            echo "<div style='padding-bottom: 8px'>$info->tag</div>";
                        endforeach;
                        ?>
                        </label>
                    </div>
                </div>

                <div class="origines" id="origine">
                    <?php
                    $results=Connexion::prendreOrigine($pdo,$id);
                    if($results[0]!=null){
                        $results=$results[0];
                        ?>

                            <div class='description_origine'>
                                <div id='description'>
                                    <div id="or-desc">
                                        <div>Origine : </div>
                                        <div class="origine-title"><?= $results->nom ?></div>
                                        <p><?= $results->description ?></p>
                                    </div>
                                    <img src='<?= $chemin_image."/origine/". $results->image?>' alt='<?= $results->nom ?>'>
                                </div>
                            </div>
                        <?php
                    }else{
                        echo "Aucune origine";
                    }
                    ?>

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
                        ?>
                        <li>
                            <div>
                                <img src="<?=$chemin_image . "/ingredients/" . $info->image?>">
                                <div><?= $info->ingredient ?></div>
                            </div>
                        </li>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>

            <div class="ligne3">
                <div class="description">
                    <label for="name" class="form-label"> <?php
                        $results=Connexion::prendreInstructions($pdo,$id);
//                        echo "<p>$results</p>";
                        for($i = 0; $i < strlen($results); $i++){
                            if($results[$i] == "."){
                                echo $results[$i];
                                echo "<br><br>";
                            }else{
                                echo $results[$i];
                            }
                        }
                        ?>
                    </label>
                </div>
            </div>

        </div>
    </div>
</form>

    <?php include "class/footer.php" ?>

    </body>
    </html>
