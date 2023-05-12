<?php include "class/init.php";
$message="";
if(!isset($_SESSION["nick"])){
    header("Location: accueil.php");
    exit();
}
$liste_ingredients=Connexion::prendreTousRecette($pdo);
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
    <link rel="stylesheet" href="css/styleliste.css">
    <script src="javascript/liste.js"></script>

</head>
<body>

<?php include "class/header.php";?>

<div class="page">
    <?php
    foreach($liste_recettes as $recette){
        $image=Connexion::prendreImageRecette($pdo,$recette->id);
        echo "<div class='recettes' id='$recette->id'>";
        echo "<img src='$chemin_image"."/ingredients/"."$image->image' alt='$recette->nom'>";
        echo "<p>$recette->nom</p>";
        echo "<input type='button' class='modif' value='Modifier'>";
        echo "<input type='button' class='suppr' value='Supprimer'>";
        echo "</div>";
    }?>
</div>
<?php include "class/footer.php";?>

</body>
</html>
