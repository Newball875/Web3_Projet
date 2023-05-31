<?php include_once "class/init.php";
Connexion::ajouterOrigine($pdo, $_POST["name"], $_POST["description"],$_FILES["image"]);
header("Location: ajout_recette.php");
exit;
?>