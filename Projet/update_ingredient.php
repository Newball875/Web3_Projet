<?php include "class/init.php";
Connexion::ajouterIngredient($pdo, $_POST["name"], $_FILES["image"]);
header("Location: ajout_recette.php");
exit;
?>