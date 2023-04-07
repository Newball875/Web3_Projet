<?php

class commandes{
	public function affichage(string $mode=""){
		switch ($mode){
			case "image":
				echo "<img src='./ressources/img/$this->image' alt='<?=$this->nom?>'>";
				break;
			case "tag":
				echo $this->nom." ";
				break;
			case "nom":
				echo $this->nom;
				break;
			case "liste":
				echo "<li>$this->nom</li>";
				break;
			default:
				echo "<p>$this->text</p>";
				break;
		}
	}
}