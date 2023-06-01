<?php include "class/init.php";
if(isset($_GET["id"])){
	$id=$_GET["id"];
}else{
	header("Location: index.php");
	exit();
}

Connexion::supprimerIngredient($pdo,$id);
header("Location: liste_ingredients.php");
exit;
?>