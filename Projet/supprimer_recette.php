<?php include "class/init.php";
Connexion::supprimerRecette($pdo,$_SESSION["id_recette"]);
unset($_SESSION["id_recette"]);
header("Location: liste_recettes.php");
exit;
?>