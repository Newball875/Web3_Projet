<?php
$path=$_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR."Web3".DIRECTORY_SEPARATOR."Web3_Projet".DIRECTORY_SEPARATOR."Projet".DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
require $path;
autoloader::register();
$pdo=connexion::connect();
$id=1;

$commande="SELECT DISTINCT(recette.recette_id) as id,recette.nom,recette.image
FROM recette,ingredient,ingredient_recette
WHERE recette.recette_id=$id;";
$results=connexion::prendreRecette($pdo,$commande);
foreach($results as $recette):
	$recette->listeRecette();
endforeach;

$commande="SELECT nom,image
FROM ingredient,ingredient_recette
WHERE ingredient.ingredient_id=ingredient_recette.ingredient_id and ingredient_recette.recette_id=$id;";
$results=connexion::prendreIngredients($pdo,$commande);
foreach($results as $ingredient):
	$ingredient->listeIngredients();
endforeach;

$commande="SELECT recette.instructions,origine.nom as origine,origine.image as media
FROM recette,origine
WHERE recette_id=1 and origine.origine_id=recette.origine_id;";
$results=connexion::prendreRecette($pdo,$commande);
foreach($results as $recette):
	$recette->listeRecette();
endforeach;