<?php include_once "class/init.php";
$id=$_SESSION["id_recette"];

var_dump($_POST);
$recette=Connexion::prendreImageRecette($pdo,$id);
//Etape 1 : modifier la recette même
if($_FILES["image"]["error"]==0){
	Connexion::modifierRecette($pdo, $id, $_POST["name"], $_POST["instructions"],$_FILES["image"]["name"],$_POST["origine"]);
	$nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."recettes".DIRECTORY_SEPARATOR;
    $nom_fic=$_FILES["image"]["name"];
    $nom_final=$nom_dos.$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"],$nom_final);
}else{
	Connexion::modifierRecette($pdo, $id, $_POST["name"], $_POST["instructions"],$recette->image,$_POST["origine"]);
}

Connexion::supprimerLiensTag($pdo,$id);
Connexion::supprimerLiensIngredients($pdo,$id);

$i=0;
$liste_ingredients=[];
$liste_quantite=[];
$liste_tags=[];
$nom_liste="ingredients".$i;
while(isset($_POST[$nom_liste])){
    $liste_ingredients[$i]=$_POST[$nom_liste];
    $liste_quantite[$i]=$_POST["quantite".$i];
	$i=$i+1;
    $nom_liste="ingredients".$i;
}
$i=0;
while(isset($_POST["tags".$i])){
    $liste_tags[$i]=$_POST["tags".$i];
    $i=$i+1;
}

$i=0;
while($i<sizeof($liste_ingredients)){
    $ing_id=(int)$liste_ingredients[$i];
    $quantite=(int)$liste_quantite[$i];
    Connexion::lierIngredientRecette($pdo,$ing_id,$id,$quantite);
    $i=$i+1;
}
$i=0;
while($i<sizeof($liste_tags)){
    $tag_id=(int)$liste_tags[$i];
    Connexion::lierTagRecette($pdo,$tag_id,$id);
    $i=$i+1;
}

header("Location: recette.php?id=$id");
exit;
?>