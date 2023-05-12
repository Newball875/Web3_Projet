<?php include_once "class/init.php";
$id=$_SESSION["id_recette"];

var_dump($_POST);

//Etape 1 : modifier la recette même

Connexion::modifierRecette(PDO $pdo, $id, $_POST["name"], string $image, int $origine_id)


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



//header("Location: ajout_recette.php");
//exit;
?>