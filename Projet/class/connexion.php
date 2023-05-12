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

    public static function prendreListeRecette(PDO $pdo):array{
        $commande="SELECT *  
        FROM recette;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return $results;
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
		$commande="SELECT nom as ingredient, quantite
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

	public static function prendreOrigine(PDO $pdo, int $id):array{
		$commande="SELECT origine.nom, origine.description, origine.image
		FROM origine,recette
		WHERE recette.origine_id=origine.origine_id and recette.recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		if($results!=null){
			return $results;
		}
		$aux=[null];
		return $aux;
	}

	public static function prendreTousIngredients(PDO $pdo):array{
		$commande="SELECT nom,ingredient_id as id
		FROM ingredient;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	public static function prendreTousTags(PDO $pdo):array{
		$commande="SELECT nom,tag_id as id
		FROM tag;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

    public static function prendreTag(PDO $pdo, int $id):string{
        $commande="SELECT nom
		FROM tag
        WHERE tag_id = $id;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return $results[0]->nom;
    }

	public static function prendreInfosOrigine(PDO $pdo, int $id):Commandes{
		$commande="SELECT nom,image,description
		FROM origine
		WHERE origine_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0];
	}

	public static function prendreTousOrigines(PDO $pdo):array{
		$commande="SELECT nom,origine_id as id, description, image
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
		$commande='INSERT INTO recette(nom,instructions,origine_id,image)
		VALUES("'.$nom.'","'.$instructions.'",'.$id.',"'.$nom_fic.'");';
		$statement = $pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));

		$commande='SELECT recette_id as id
		FROM recette
		WHERE nom="'.$nom.'" and instructions="'.$instructions.'" and origine_id='.$id.' and image="'.$nom_fic.'";';
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0]->id;
	}

    public static function ajouterIngredient(PDO $pdo, string $nom, array $fichier){
        $nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."ingredients".DIRECTORY_SEPARATOR;
        $nom_fic=$fichier["name"];
        $nom_final=$nom_dos.$fichier["name"];
        move_uploaded_file($fichier["tmp_name"],$nom_final);
        $commande="INSERT INTO ingredient(nom,image)
		VALUES('$nom','$nom_fic');";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

    public static function ajouterOrigine(PDO $pdo, string $nom, string $description ,array $fichier){
        $nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."origine".DIRECTORY_SEPARATOR;
        $nom_fic=$fichier["name"];
        $nom_final=$nom_dos.$fichier["name"];
        move_uploaded_file($fichier["tmp_name"],$nom_final);
        $commande='INSERT INTO origine(nom,description,image)
		VALUES("'.$nom.'","'.$description.'","'.$nom_fic.'");';
		echo $commande;
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

    public static function ajouterTag(PDO $pdo, string $nom){
        $commande="INSERT INTO tag(nom)
		VALUES('$nom');";
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

	public static function rechercheRecette(PDO $pdo, string $nom, array $liste_ingredients, array $liste_tags):array{
		$commande="SELECT DISTINCT(recette.recette_id) as id,nom,image
		FROM recette,ingredient_recette,tag_recette
		WHERE nom LIKE '%$nom%'";
		$i=0;
		if(sizeof($liste_ingredients)>0){
			$commande_ingredients=" AND recette.recette_id=ingredient_recette.recette_id AND ";
			while($i<sizeof($liste_ingredients)){
				$commande_ingredients=$commande_ingredients." $liste_ingredients[$i]=ingredient_recette.ingredient_id";
				$i=$i+1;
				if($i!=sizeof($liste_ingredients)){
					$commande_ingredients=$commande_ingredients." OR";
				}
			}
			$commande=$commande.$commande_ingredients;
		}

		$i=0;
		if(sizeof($liste_tags)>0){
			$commande_tags=" AND recette.recette_id=tag_recette.recette_id AND ";
			while($i<sizeof($liste_tags)){
				$aux="".$liste_tags[$i]."=tag_recette.tag_id";
				$commande_tags=$commande_tags." ".$aux;
				$i=$i+1;
				if($i!=sizeof($liste_tags)){
					$commande_tags=$commande_tags." OR";
				}
			}
			$commande=$commande.$commande_tags;
		}
		$commande=$commande.";";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	public static function supprimerRecette(PDO $pdo, int $id){
		$commande="DELETE FROM ingredient_recette
		WHERE recette_id=$id;
		
		DELETE FROM tag_recette
		WHERE recette_id=$id;
		
		DELETE FROM recette
		WHERE recette_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	public static function supprimerTag(PDO $pdo, int $id){
		$commande="DELETE FROM tag_recette
		WHERE tag_id=$id;
		
		DELETE FROM tag
		WHERE tag_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	public static function supprimerIngredient(PDO $pdo, int $id){
		$commande="DELETE FROM ingredient_recette
		WHERE ingredient_id=$id;
		
		DELETE FROM ingredient
		WHERE ingredient_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	public static function supprimerOrigine(PDO $pdo, int $id){
		$commande="UPDATE recette
		SET origine_id=0
		WHERE origine_id=$id;
		
		DELETE FROM origine
		WHERE origine_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	public static function supprimerLiensTag(PDO $pdo, int $id){
		$commande="DELETE FROM tag_recette
		WHERE recette_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	public static function supprimerLiensIngredients(PDO $pdo, int $id){
		$commande="DELETE FROM ingredient_recette
		WHERE recette_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	public static function modifierTag(PDO $pdo,int $id, string $nom_modifie){
    	$commande="UPDATE tag
    	SET nom = '$nom_modifie'
        WHERE tag_id=$id;";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

    public static function modifierIngredient(PDO $pdo,int $id, string $nom_modifie, string $image_modifie){
        $commande="UPDATE ingredient
    	SET nom = '$nom_modifie',image = '$image_modifie'
        WHERE ingredient_id=$id;";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

	public static function modifierOrigine(PDO $pdo, int $id, string $nom, string $description,string $image){
		$commande="UPDATE origine
		SET nom='$nom',description='$description',image='$image'
		WHERE origine_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	public static function modifierRecette(PDO $pdo, int $id, string $nom, string $instructions, string $fichier, int $origine_id){
		$commande="UPDATE recette
		SET nom='$nom',instructions='$instructions',image='$fichier',origine_id=$origine_id
		WHERE recette_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

    public static function tagExiste(PDO $pdo, int $id): bool{
        $commande="SELECT tag_id as id
		FROM tag
		WHERE tag_id=$id;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return(!$results==null);
    }

	public static function origineExiste(PDO $pdo, int $id): bool{
        $commande="SELECT origine_id as id
		FROM origine
		WHERE origine_id=$id;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return(!$results==null);
    }

	public static function ingredientExiste(PDO $pdo, int $id): bool{
        $commande="SELECT ingredient_id as id
		FROM ingredient
		WHERE ingredient_id=$id;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return(!$results==null);
    }

}