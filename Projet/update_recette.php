<?php include_once "class/init.php";
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

$recette_id=Connexion::ajouterRecette($pdo,$_POST["name"], $_POST["instructions"],$_POST["origine"],$_FILES["image"]);

$i=0;
while($i<sizeof($liste_ingredients)){
    $ing_id=(int)$liste_ingredients[$i];
    $quantite=(int)$liste_quantite[$i];
    Connexion::lierIngredientRecette($pdo,$ing_id,$recette_id,$quantite);
    $i=$i+1;
}
$i=0;
while($i<sizeof($liste_tags)){
    $tag_id=(int)$liste_tags[$i];
    Connexion::lierTagRecette($pdo,$tag_id,$recette_id);
    $i=$i+1;
}

var_dump($_POST);
echo "<br>";
header("Location: liste_recettes.php");
exit;
?>