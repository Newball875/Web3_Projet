<?php include "class/init.php";
if(isset($_GET["id"])){
	$id=$_GET["id"];
}else{
	header("Location: index.php");
	exit();
}

Connexion::supprimerOrigine($pdo,$id);
header("Location: liste_origines.php");
exit;
?>