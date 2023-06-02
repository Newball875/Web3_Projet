<?php include "class/init.php";
if(isset($_GET["id"])){
	$id=$_GET["id"];
}else{
	header("Location: index.php");
	exit();
}
Connexion::supprimerRecette($pdo,$_SESSION["id_recette"]);
unset($_SESSION["id_recette"]);
header("Location: liste_recettes.php");
exit;
?>