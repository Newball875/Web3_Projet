<?php
$path=$_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR."Web3".DIRECTORY_SEPARATOR."Web3_Projet".DIRECTORY_SEPARATOR."Projet".DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
require $path;
autoloader::register();
$pdo=connexion::connect();
$commande="SELECT DISTINCT(recette.recette_id) as id,recette.nom,recette.image,recette.instructions,origine.nom as origine
FROM recette,origine,ingredient,ingredient_recette
WHERE origine.origine_id=recette.origine_id;";
$results=connexion::prendreRecette($pdo,$commande);
foreach($results as $recette):
	$recette->listeRecette();
endforeach;