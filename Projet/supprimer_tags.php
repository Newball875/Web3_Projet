<?php include "class/init.php";
if(isset($_GET["id"])){
	$id=$_GET["id"];
}else{
	header("Location: accueil.php");
	exit();
}

Connexion::supprimerTag($pdo,$id);
header("Location: accueil.php");
exit;
?>