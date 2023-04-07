<?php

class commandesIngredients{
	public function listeIngredients(){ ?>
		<div>
			<img src="./ressources/img/<?=$this->image?>" alt="<?=$this->nom?>">
			<p><?=$this->nom?></p>
		</div>
		<?php
	}
}