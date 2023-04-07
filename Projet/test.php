<?php
$path=$_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR."Web3".DIRECTORY_SEPARATOR."Web3_Projet".DIRECTORY_SEPARATOR."Projet".DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
require $path;
autoloader::register();
$pdo=connexion::connect();
$id=1;
$commande="SELECT origine_id as id
FROM recette
WHERE recette_id=$id;";
$results=connexion::prendreInfos($pdo,$commande);
$origine_id=$results[0]->id;

$commande="SELECT nom
FROM recette
WHERE origine_id=$origine_id and recette_id!=$id;";
$results=connexion::prendreInfos($pdo,$commande);
foreach($results as $info):
	$info->affichage("nom");
endforeach;