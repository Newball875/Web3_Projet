<?php
$path=$_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR."Web3".DIRECTORY_SEPARATOR."Web3_Projet".DIRECTORY_SEPARATOR."Projet".DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
require $path;
Autoloader::register();
$pdo=connexion::connect();
echo "Salut";