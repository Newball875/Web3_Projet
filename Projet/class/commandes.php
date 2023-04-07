<?php

class commandes{
	public function listeRecette(){ ?>
		<div>
			<p><?=$this->recette_id?></p>
			<p><?=$this->nom?></p>
			<p><?=$this->description?></p>
			<p><?=$this->instructions?></p>
			<img src="./ressources/img/<?=$this->image?>" alt="<?=$this->nom?>">
		</div>
		<?php
	}
}