<?php
$path=$_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR."Web3".DIRECTORY_SEPARATOR."Web3_Projet".DIRECTORY_SEPARATOR."Projet".DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
require $path;
autoloader::register();
$pdo=connexion::connect();
$commande="SELECT * FROM recette";
$results=connexion::prendreRecettes($pdo,$commande);
echo "Salut";
foreach($results as $recette):
	$recette->listeRecette();
endforeach;