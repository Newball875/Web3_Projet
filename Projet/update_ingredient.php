<?php include_once "class/init.php";
$i=0;

Connexion::ajouterIngredient($pdo, $_POST["name"], $_FILES["image"]);
echo "<br>";
header("Location: ajout_recette.php");
exit;
?>