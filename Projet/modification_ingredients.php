<?php include "class/init.php";
if(!isset($_SESSION["nick"])){
    header("Location: accueil.php");
    exit();
}
if(isset($_GET["id"]) || !(Connexion::ingredientExiste($pdo,$_GET["id"]))){
    $id = $_GET["id"];
}else{
    header("Location: liste_tags.php");
    exit();
}

$ingredient=Connexion::prendreImageIngredient($pdo,$id);
if(isset($_FILES["image"])){
	Connexion::modifierIngredient($pdo, $id, $_POST['name'],$_FILES['image']['name']);
    $nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."ingredients".DIRECTORY_SEPARATOR;
    $nom_fic=$_FILES["image"]['name'];
    $nom_final=$nom_dos.$_FILES["image"]['name'];
    move_uploaded_file($_FILES['image']["tmp_name"],$nom_final);
}
else{
    Connexion::modifierIngredient($pdo, $id, $_POST['name'],$ingredient->image);
}

header("Location: liste_ingredients.php");
exit();