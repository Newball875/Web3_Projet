<?php include "class/init.php";
if(isset($_GET["id"])){
	$id=$_GET["id"];
}else{
	header("Location: accueil.php");
	exit();
}

Connexion::supprimerOrigine($pdo,$id);
header("Location: accueil.php");
exit;
?>