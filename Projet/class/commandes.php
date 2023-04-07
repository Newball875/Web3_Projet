<?php

class commandes{
	public function listeRecette(){ ?>
		<div>
			<img src="./ressources/img/<?=$this->image?>" alt="<?=$this->nom?>">
			<p><?=$this->nom?></p>
			<p><?=$this->instructions?></p>
			<div>
				<img src="./ressources/img/<?=$this->media?>" alt="<?=$this->origine?>">
				<p><?=$this->origine?></p>
			</div>
			
		</div>
		<?php
	}
}


/*SELECT DISTINCT(recette.nom),recette.image,recette.instructions,origine.nom
FROM recette,origine,ingredient,ingredient_recette
WHERE origine.origine_id=recette.origine_id;


*/