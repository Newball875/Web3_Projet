<?php

$default="default.png";
//Class qui gère toutes les commandes de
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

	//Fonction qui permet de prendre le nom d'une recette dont l'id est passé en paramètre
	public static function prendreNomRecette(PDO $pdo, int $id):string{
		$commande="SELECT nom
		FROM recette
		WHERE recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0]->nom;
	}

	//Fonction qui permet de prendre l'image d'une recette dont l'id est passé en paramètre
	public static function prendreImageRecette(PDO $pdo, int $id):commandes{
		$commande="SELECT image,nom
		FROM recette
		WHERE recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0];
	}

	//Fonction qui permet de prendre toutes les informations de toutes les recettes
    public static function prendreListeRecette(PDO $pdo):array{
        $commande="SELECT *  
        FROM recette;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return $results;
    }

	//Fonction qui permet de prendre les i dernières recettes, i étant un entier réel positif passé en paramètre
    public static function prendreDernieresRecettes(PDO $pdo,int $i){
        $commande="SELECT * 
        FROM `recette`
        ORDER BY recette_id 
        DESC LIMIT $i;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return $results;
    }

	//Fonction qui permet de prendre tous les tags d'une recette dont l'id est passé en paramètre
	public static function prendreListeTag(PDO $pdo, int $id):array{
		$commande="SELECT nom as tag
        FROM tag,tag_recette
        WHERE tag.tag_id=tag_recette.tag_id and recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	//Fonction qui permet de prendre tous les ingrédients d'une recette dont l'id est passé en paramètre
	public static function prendreListeIngredients(PDO $pdo, int $id):array{
		$commande="SELECT nom as ingredient, quantite
        FROM ingredient,ingredient_recette
        WHERE ingredient_recette.ingredient_id=ingredient.ingredient_id and recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	//Fonction qui permet de prendre les instructions d'une recette dont l'id est passé en prarmètre
	public static function prendreInstructions(PDO $pdo, int $id):string{
		$commande="SELECT instructions
        FROM recette
        WHERE recette_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0]->instructions;
	}

	//Fonction qui permet de prendre toutes les informations de l'origine d'une recette dont l'id est passée en paramètre
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

	//Fonction qui permet de prendre toutes les informations de tous les ingrédients
	public static function prendreTousIngredients(PDO $pdo):array{
		$commande="SELECT nom,ingredient_id as id
		FROM ingredient;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	//Fonction qui permet de prendre tous les tags
	public static function prendreTousTags(PDO $pdo):array{
		$commande="SELECT nom,tag_id as id
		FROM tag;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	//Fonction qui permet de prendre le nom d'un tag dont l'id est passé en paramètre
    public static function prendreTag(PDO $pdo, int $id):string{
        $commande="SELECT nom
		FROM tag
        WHERE tag_id = $id;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return $results[0]->nom;
    }

	//Fonction qui permet de prendre les infos d'une origine dont l'id est passé en paramètre
	public static function prendreInfosOrigine(PDO $pdo, int $id):Commandes{
		$commande="SELECT nom,image,description
		FROM origine
		WHERE origine_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0];
	}

	//Fonction qui permet de prendre toutes les origines
	public static function prendreTousOrigines(PDO $pdo):array{
		$commande="SELECT nom,origine_id as id, description, image
		FROM origine;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}
	
	//Fonction qui permet de prendre l'image d'un ingrédient dont l'id est passé en paramètre
	public static function prendreImageIngredient(pdo $pdo, int $id){
		$commande="SELECT nom,image
		FROM ingredient
		WHERE ingredient_id=$id;";
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results[0];
	}

	//Fonction qui permet d'ajouter une recette à la base de données et d'obtenir son id
	public static function ajouterRecette(PDO $pdo, string $nom, string $instructions, int $id ,array $fichier):int{
		//On vérifie déjà si une image a été donnée
		if($fichier["name"]!=""){
			//Si c'est le cas, on l'upload
			$nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."recettes".DIRECTORY_SEPARATOR;
			$nom_fic=$fichier["name"];
			$nom_final=$nom_dos.$fichier["name"];
			move_uploaded_file($fichier["tmp_name"],$nom_final);
		}else{
			//Sinon, on indique que l'image de la recette est l'image pas défaut
			$nom_fic=$default;
		}
		//On insère la recette
		$commande='INSERT INTO recette(nom,instructions,origine_id,image)
		VALUES("'.$nom.'","'.$instructions.'",'.$id.',"'.$nom_fic.'");';
		$statement = $pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		//Ensuite, on va récupérer l'id de la recette nouvellement créée
		$commande='SELECT recette_id as id
		FROM recette
		WHERE nom="'.$nom.'" and instructions="'.$instructions.'" and origine_id='.$id.' and image="'.$nom_fic.'";';
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		//Et on la retourne
		return $results[0]->id;
	}

	//Fonction qui permet d'ajouter un ingrédient à la base de données
    public static function ajouterIngredient(PDO $pdo, string $nom, array $fichier){
		//On vérifie si un fichier a été donné
		if($fichier["name"]!=""){
			//Si c'est le cas, on l'upload
			$nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."ingredients".DIRECTORY_SEPARATOR;
        	$nom_fic=$fichier["name"];
        	$nom_final=$nom_dos.$fichier["name"];
        	move_uploaded_file($fichier["tmp_name"],$nom_final);
		}else{
			//Sinon, on indique que l'ingrédient dispose de l'image par défaut
			$nom_fic=$default;
		}
		//Et on insère les infos dans la base de données
        $commande="INSERT INTO ingredient(nom,image)
		VALUES('$nom','$nom_fic');";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

	//Fonction qui permet d'ajouter une origine dans la base de données
    public static function ajouterOrigine(PDO $pdo, string $nom, string $description ,array $fichier){
		//On vérifie si un fichier a été donnée
		if($fichier["name"]!=""){
			//Si c'est le cas, on l'upload
			$nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."origine".DIRECTORY_SEPARATOR;
        	$nom_fic=$fichier["name"];
        	$nom_final=$nom_dos.$fichier["name"];
        	move_uploaded_file($fichier["tmp_name"],$nom_final);
		}else{
			//Sinon, on lui met le fichier par défaut
			$nom_fic=$default;
		}
		//Et on l'insère dans la base de données
        $commande='INSERT INTO origine(nom,description,image)
		VALUES("'.$nom.'","'.$description.'","'.$nom_fic.'");';
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

	//Fonction qui permet d'ajouter un tag à la base de données
    public static function ajouterTag(PDO $pdo, string $nom){
        $commande="INSERT INTO tag(nom)
		VALUES('$nom');";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

	//Fonction qui permet de lier un ingrédient avec une recette
    public static function lierIngredientRecette(PDO $pdo, int $ing_id, int $recette_id, float $quantite){
        $commande="INSERT INTO ingredient_recette(recette_id,ingredient_id,quantite)
		VALUES($recette_id,$ing_id,$quantite);";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

	//Fonction qui permet de lier un tag avec une recette
    public static function lierTagRecette(PDO $pdo, int $tag_id, int $recette_id){
        $commande="INSERT INTO tag_recette(recette_id,tag_id)
		VALUES($recette_id,$tag_id);";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

	//Fonction de recherche des recettes en fonction du nom, des ingrédients et des tags passés en filtre
	public static function rechercheRecette(PDO $pdo, string $nom, array $liste_ingredients, array $liste_tags):array{
		//Début de la commande
		$commande="SELECT DISTINCT(recette.recette_id) as id,nom,image
		FROM recette,ingredient_recette,tag_recette
		WHERE nom LIKE '%$nom%'";
		$i=0;
		//on vérifie si on a des ingrédients en filtre
		if(sizeof($liste_ingredients)>0){
			//Si oui, on les rajoute dans la commande
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

		//on vérifie si on a des tags en filtre
		$i=0;
		if(sizeof($liste_tags)>0){
			//Si oui, on les rajoute dans la commande
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
		//et on exécute la commande
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}

	//Fonction pour supprimer une recette
	public static function supprimerRecette(PDO $pdo, int $id){
		//On supprime les liens, puis la recette
		$commande="DELETE FROM ingredient_recette
		WHERE recette_id=$id;
		
		DELETE FROM tag_recette
		WHERE recette_id=$id;
		
		DELETE FROM recette
		WHERE recette_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	//Fonction pour supprimer un tag
	public static function supprimerTag(PDO $pdo, int $id){
		//on supprime d'abord les liens, puis le tag
		$commande="DELETE FROM tag_recette
		WHERE tag_id=$id;
		
		DELETE FROM tag
		WHERE tag_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	//Fonction pour supprimer un ingrédient
	public static function supprimerIngredient(PDO $pdo, int $id){
		//On supprime les liens, puis l'ingrédient
		$commande="DELETE FROM ingredient_recette
		WHERE ingredient_id=$id;
		
		DELETE FROM ingredient
		WHERE ingredient_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	//Fonction pour supprimer l'origine
	public static function supprimerOrigine(PDO $pdo, int $id){
		//On met d'abord à 0 les origines des recettes correspondantes, puis on supprime l'origine
		$commande="UPDATE recette
		SET origine_id=0
		WHERE origine_id=$id;
		
		DELETE FROM origine
		WHERE origine_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	//Fonction pour supprimer les liens entre une recette et ses tags
	public static function supprimerLiensTag(PDO $pdo, int $id){
		$commande="DELETE FROM tag_recette
		WHERE recette_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	//Fonction pour supprimer les liens entre une recette et ses ingrédients
	public static function supprimerLiensIngredients(PDO $pdo, int $id){
		$commande="DELETE FROM ingredient_recette
		WHERE recette_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	//Fonction pour modifier le nom d'un tag
	public static function modifierTag(PDO $pdo,int $id, string $nom_modifie){
    	$commande="UPDATE tag
    	SET nom = '$nom_modifie'
        WHERE tag_id=$id;";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

	//Fonctionn pour modifier le nom et l'image d'un ingrédient
    public static function modifierIngredient(PDO $pdo,int $id, string $nom_modifie, string $image_modifie){
        $commande="UPDATE ingredient
    	SET nom = '$nom_modifie',image = '$image_modifie'
        WHERE ingredient_id=$id;";
        $statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
    }

	//Fonction pour modifier le nom, la description et l'image d'une origine
	public static function modifierOrigine(PDO $pdo, int $id, string $nom, string $description,string $image){
		$commande="UPDATE origine
		SET nom='$nom',description='$description',image='$image'
		WHERE origine_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	//Fonction pour modifier le nom, les instructions, l'image et l'origine d'une recette
	public static function modifierRecette(PDO $pdo, int $id, string $nom, string $instructions, string $fichier, int $origine_id){
		$commande="UPDATE recette
		SET nom='$nom',instructions=\"$instructions\",image='$fichier',origine_id=$origine_id
		WHERE recette_id=$id;";
		$statement = $pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
	}

	//Fonction qui vérifie si un tag dont l'id est passé en paramètre existe
    public static function tagExiste(PDO $pdo, int $id): bool{
        $commande="SELECT tag_id as id
		FROM tag
		WHERE tag_id=$id;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return(!$results==null);
    }

	//Fonction qui vérifie si une origine dont l'id est passé en paramètre existe
	public static function origineExiste(PDO $pdo, int $id): bool{
        $commande="SELECT origine_id as id
		FROM origine
		WHERE origine_id=$id;";
        $statement=$pdo->prepare($commande);
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
        return(!$results==null);
    }

	//Fonction qui vérifie si un ingrédient dont l'id est passé en paramètre existe
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