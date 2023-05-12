<?php include_once "class/init.php";
$i=0;

Connexion::ajouterTag($pdo, $_POST["name"]);
header("Location: ajout_recette.php");
exit;
?>