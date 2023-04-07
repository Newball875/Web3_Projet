<?php
$path=getcwd().DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."autoloader.php";
require $path;
autoloader::register();
$pdo=connexion::connect();
$id=1;
?>

<form action="test.php" method="POST" enctype="multipart/form-data">
	<div>
		<label for="le_fichier" class="form_label">Uploader une recette :</label>
		<input type="text" class="form-control" id="name" name="name">
		<input type="text" class="form-control" id="instructions" name="instructions">
		<input type="file" class="form-control" id="image" name="image">
	</div>
	<div>
		<button type="submit">Submit</button>
	</div>
</form>

<?php
$commande="Oui";
if(isset($_POST["name"])){
	connexion::ajouterInfos($pdo,$commande);
}

/*
$commande="SELECT origine_id as id
FROM recette
WHERE recette_id=$id;";
$results=connexion::prendreInfos($pdo,$commande);
$origine_id=$results[0]->id;

$commande="SELECT nom
FROM recette
WHERE origine_id=$origine_id and recette_id!=$id;";
$results=connexion::prendreInfos($pdo,$commande);
foreach($results as $info):
	$info->affichage("nom");
endforeach;

$commande="SELECT origine.image,origine.nom
FROM origine,recette
WHERE recette_id=2 and origine.origine_id=recette.origine_id;";
$results=connexion::prendreInfos($pdo,$commande);
foreach($results as $info):
	$info->affichage("image");
endforeach;
*/