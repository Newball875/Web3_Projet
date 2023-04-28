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

	public static function prendreTousIngredients(PDO $pdo):array{
		$commande="SELECT nom,ingredient_id as id
		FROM ingredient;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	public static function prendreTousOrigines(PDO $pdo):array{
		$commande="SELECT nom,origine_id as id
		FROM origine;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
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

	public static function ajouterRecette(PDO $pdo, string $nom, string $instructions, int $id ,array $fichier):int{
		$nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."recettes".DIRECTORY_SEPARATOR;
		$nom_fic=$fichier["name"];
		$nom_final=$nom_dos.$fichier["name"];
		move_uploaded_file($fichier["tmp_name"],$nom_final);
		$commande="INSERT INTO recette(nom,instructions,origine_id,image)
		VALUES('$nom','$instructions',$id,'$nom_fic');";
		$statement = $pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));

		$commande="SELECT recette_id as id
		FROM recette
		WHERE nom='$nom' and instructions='$instructions' and origine_id=$id and image='$nom_fic';";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0]->id;
	}

    public static function ajouterIngredient(PDO $pdo, string $nom, string $type, int $id ,array $fichier){
        $nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."ingredients".DIRECTORY_SEPARATOR;
        $nom_fic=$fichier["name"];
        $nom_final=$nom_dos.$fichier["name"];
        move_uploaded_file($fichier["tmp_name"],$nom_final);
        $commande="INSERT INTO ingredient(nom,type,ingredient_id,image)
		VALUES('$nom','$type',$id,'$nom_fic');";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

    public static function ajouterOrigine(PDO $pdo, string $nom, string $description, int $id ,array $fichier){
        $nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."origine".DIRECTORY_SEPARATOR;
        $nom_fic=$fichier["name"];
        $nom_final=$nom_dos.$fichier["name"];
        move_uploaded_file($fichier["tmp_name"],$nom_final);
        $commande="INSERT INTO origine(nom,description,origine_id,image)
		VALUES('$nom','$description',$id,'$nom_fic');";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

    public static function ajouterTag(PDO $pdo, string $nom, int $id){
        $commande="INSERT INTO tag(nom,tag_id)
		VALUES('$nom',$id);";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

    public static function lierIngredientRecette(PDO $pdo, int $ing_id, int $recette_id, float $quantite){
        $commande="INSERT INTO ingredient_recette(recette_id,ingredient_id,quantite)
		VALUES($recette_id,$ing_id,$quantite);";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

    public static function lierTagRecette(PDO $pdo, int $tag_id, int $recette_id){
        $commande="INSERT INTO tag_recette(recette_id,tag_id)
		VALUES($recette_id,$tag_id);";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }
}