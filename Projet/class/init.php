<?php
$path=getcwd().DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
$chemin_image="ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR;
require $path;
Autoloader::register();
$pdo=Connexion::connect();
session_start();
?>
