<?php
$path=$_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR."Web3".DIRECTORY_SEPARATOR."Web3_Projet".DIRECTORY_SEPARATOR."Projet".DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
require $path;
autoloader::register();
$pdo=connexion::connect();
$id=1;

//Nom et photo de la recette
$commande="SELECT DISTINCT(recette.recette_id) as id,recette.nom,recette.image
FROM recette,ingredient,ingredient_recette
WHERE recette.recette_id=$id;";
$results=connexion::prendreRecette($pdo,$commande);
foreach($results as $recette):
	$recette->listeRecette();
endforeach;

//Liste des tags
$commande="SELECT nom
FROM tag, tag_recette
WHERE tag_recette.tag_id=tag.tag_id and tag_recette.recette_id=$id;";
$results=connexion::prendreTags($pdo,$commande);
foreach($results as $tag):
	$tag->listeTags();
endforeach;

//Liste des ingrédients
$commande="SELECT nom,image
FROM ingredient,ingredient_recette
WHERE ingredient.ingredient_id=ingredient_recette.ingredient_id and ingredient_recette.recette_id=$id;";
$results=connexion::prendreIngredients($pdo,$commande);
foreach($results as $ingredient):
	$ingredient->listeIngredients();
endforeach;

//Liste d'instructions et média d'origine 
$commande="SELECT recette.instructions,origine.nom as origine,origine.image as media
FROM recette,origine
WHERE recette_id=1 and origine.origine_id=recette.origine_id;";
$results=connexion::prendreRecette($pdo,$commande);
foreach($results as $recette):
	$recette->listeRecette();
endforeach;