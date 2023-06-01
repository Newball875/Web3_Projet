<?php include "class/init.php";
if(!isset($_SESSION["nick"])){
	header("Location: index.php");
	exit();
}
$liste_ingredients=Connexion::prendreTousIngredients($pdo);
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
    <link rel="stylesheet" href="css/title.css">
	<script src="javascript/liste.js"></script>

</head>
<body>

<?php include "class/header.php";?>
<div class="title">Liste des ingrédients</div>

<div class="page">
    <?php
    foreach($liste_ingredients as $ingredient){
        $image=Connexion::prendreImageIngredient($pdo,$ingredient->id);
        echo "<div class='ingredients' id='$ingredient->id'>";
        echo "<img src='$chemin_image"."/ingredients/"."$image->image' alt='$ingredient->nom'>";
        echo "<p>$ingredient->nom</p>";
        echo "<input type='button' class='modif' value='Modifier'>";
        echo "<input type='button' class='suppr' value='Supprimer'>";
        echo "</div>";
    }?>
</div>
<?php include "class/footer.php";?>

</body>
</html>
