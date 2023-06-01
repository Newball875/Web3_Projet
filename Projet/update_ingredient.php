<?php include "class/init.php";
Connexion::ajouterIngredient($pdo, $_POST["name"], $_FILES["image"]);
header("Location: liste_ingredients.php");
exit;
?>