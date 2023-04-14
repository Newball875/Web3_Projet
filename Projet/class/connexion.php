<?php

class Connexion{
	public static function connect():PDO{
		$db_name="bdd";
		$db_host="127.0.0.1";
		$db_port="3306";

		$db_user="root";
		$db_pwd="";

		try{
			$dsn="mysql:dbname=".$db_name.";host=".$db_host.";port=".$db_port;

			$pdo=new PDO($dsn,$db_user,$db_pwd);
		}

		catch(\Exception $ex){ 
			die("Erreur : ".$ex->getMessage());
		}
		return $pdo;
	}

	public static function prendreNomRecette(PDO $pdo, int $id):string{
		$commande="SELECT nom
		FROM recette
		WHERE recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0]->nom;
	}

	public static function prendreImageRecette(PDO $pdo, int $id):commandes{
		$commande="SELECT image,nom
		FROM recette
		WHERE recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0];
	}

	public static function prendreListeTag(PDO $pdo, int $id):array{
		$commande="SELECT nom as tag
        FROM tag,tag_recette
        WHERE tag.tag_id=tag_recette.tag_id and recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	public static function prendreListeIngredients(PDO $pdo, int $id):array{
		$commande="SELECT nom as ingredient
        FROM ingredient,ingredient_recette
        WHERE ingredient_recette.ingredient_id=ingredient.ingredient_id and recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	public static function prendreInstructions(PDO $pdo, int $id):string{
		$commande="SELECT instructions
        FROM recette
        WHERE recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0]->instructions;
	}

	
	public static function prendreImageIngredient(pdo $pdo, int $id){
		$commande="SELECT nom,image
		FROM ingredient
		WHERE ingredient_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0];
	}

	public static function ajouterRecette(PDO $pdo, string $nom, string $instructions, int $id ,array $fichier){
		$nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."test".DIRECTORY_SEPARATOR;
		echo $nom_dos;
		$nom_fic=$fichier["name"];
		$nom_final=$nom_dos.$fichier["name"];
		move_uploaded_file($fichier["tmp_name"],$nom_final);

		$commande="INSERT INTO recette(nom,instructions,origine_id,image)
		VALUES('$nom','$instructions',$id,'$nom_fic');";
		$statement = $pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
	}
}