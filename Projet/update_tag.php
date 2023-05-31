<?php include_once "class/init.php";
Connexion::ajouterTag($pdo, $_POST["name"]);
header("Location: ajout_recette.php");
exit;
?>