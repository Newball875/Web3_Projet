<?php
$path=getcwd().DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
$chemin_image="ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR;
require $path;
Autoloader::register();
$pdo=Connexion::connect(); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <link rel="stylesheet" href="css/stylerecette.css">
    <script src="js/stylerecette.js"></script>

</head>
