<?php include "class/init.php";
if(isset($_GET["id"])){
	$id=$_GET["id"];
}else{
	header("Location: index.php");
	exit();
}

Connexion::supprimerTag($pdo,$id);
header("Location: index.php");
exit;
?>