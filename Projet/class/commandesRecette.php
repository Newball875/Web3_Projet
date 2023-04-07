<?php

class commandesRecette{
	public function listeRecette(){ ?>
		<div> <?php
			if(isset($this->image)){
				echo "<img src='./ressources/img/$this->image' alt='<?=$this->nom?>'>";
			}
			if(isset($this->nom)){
				echo "<p>$this->nom</p>";
			}
			if(isset($this->instructions)){
				echo "<p>$this->instructions</p>";
			}
			if(isset($this->media)){
				echo '<img src="./ressources/img/'.$this->media.'" alt="'.$this->origine.'">';
			}
			if(isset($this->origine)){
				echo "<p>$this->origine</p>";
			}?>
			
		</div>
		<?php
	}
}