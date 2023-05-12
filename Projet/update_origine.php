<?php include_once "class/init.php";
$i=0;


var_dump($_POST);
var_dump($_FILES["image"]);
echo "<br>";
Connexion::ajouterOrigine($pdo, $_POST["name"], $_POST["description"],$_FILES["image"]);
header("Location: ajout_recette.php");
exit;
?>