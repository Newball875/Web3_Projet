<?php include_once "class/init.php";
$i=0;
$liste_ingredients=[];
$liste_quantite=[];
$nom_liste="ingredients".$i;
while(isset($_POST[$nom_liste])){
    $liste_ingredients[$i]=$_POST[$nom_liste];
    $liste_quantite[$i]=$_POST["quantite".$i];
	$i=$i+1;
    $nom_liste="ingredients".$i;
}
$recette_id=Connexion::ajouterRecette($pdo,$_POST["name"], $_POST["instructions"],$_POST["origine"],$_FILES["image"]);

$i=0;
while($i<sizeof($liste_ingredients)){
    $ing_id=(int)$liste_ingredients[$i]; // ici ça ne donne pas l'id de l'ingredient en (int)

    Connexion::lierIngredientRecette($pdo,$ing_id,$recette_id, $liste_quantite[$i]);
    $i=$i+1;
}

var_dump($_POST);
echo "<br>";
var_dump($liste_ingredients);
//header("Location: ajout_recette.php");
//exit;
?>