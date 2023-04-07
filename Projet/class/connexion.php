<?php

class connexion{
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

	public static function prendreRecettes(PDO $pdo, string $commande):array{
		$statement=$pdo->prepare($commande);
		$statement->execute() or die(var_dump($statement->errorInfo()));
		$results=$statement->fetchAll(PDO::FETCH_CLASS,"commandes");
		return $results;
	}
}