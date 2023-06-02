<script>
(function (){

let liste_ingredients = [];
let liste_options_ingredient = [];

let bouton_moins_ing = undefined
let bouton_plus_ing = undefined
let bouton_moins_tag = undefined
let bouton_plus_tag = undefined

let i_ingredient=0
let i_tag=0

//Permet de mettre tout les choix d'ingrédients possible dans un conteneur
function mettreTousIngredients(conteneur){
	let choix;
	<?php
	foreach($tab_ingredients as $ingredient){ ?>
		choix=document.createElement("option");
		choix.innerHTML="<?=$ingredient->nom?>";
		choix.value="<?=$ingredient->id?>";
		choix.classList.toggle("menu_ingredient");
		choix.addEventListener('click',function (){
			disabledIngredient();
		})
		conteneur.appendChild(choix)
	<?php
	}
	?>
}

//Permet de mettre tout les choix de tags possible dans un conteneur
function mettreTousTags(conteneur){
	let choix;
	<?php
	foreach($tab_tags as $tag){ ?>
		choix=document.createElement("option");
		choix.innerHTML="<?=$tag->nom?>";
		choix.value="<?=$tag->id?>";
		choix.classList.toggle("menu_tag");
		choix.addEventListener('click',function (){
			disabledIngredient();
		})
		conteneur.appendChild(choix)
	<?php
	}
	?>
}

//Permet d'ajouter une nouvelle interface de choix d'un ingrédient avec les éléments d'un conteneur
function ajouterIngredient(conteneur){
	let select=document.createElement("select");
	select.classList.add("menu_ingredient");
	select.name="ingredients"+i_ingredient;
	i_ingredient++;
	mettreTousIngredients(select);
	conteneur.appendChild(select);
}

//Retire un ingrédient d'un conteneur et rend le bouton disable si il ne reste qu'un seul ingrédient
function supprimerIngredient(conteneur){
	conteneur.removeChild(conteneur.lastChild);
	i_ingredient--;
	if(conteneur.childElementCount==0){
		bouton_moins_ing.disabled=true;
	}
}

//Permet d'ajouter une nouvelle interface de choix d'un Tag avec les éléments d'un conteneur
function ajouterTag(conteneur){
	let select=document.createElement("select");
	select.classList.add("menu_tag");
	select.name="tags"+i_tag;
	i_tag++;
	mettreTousTags(select);
	conteneur.appendChild(select);
}

//Retire un Tag d'un conteneur et rend le bouton disable si il ne reste qu'un seul Tag
function supprimerTag(conteneur){
	conteneur.removeChild(conteneur.lastChild);
	i_tag--;
	if(conteneur.childElementCount==0){
		bouton_moins_tag.disabled=true;
	}
}

/*Quand la page charge, elle applique à chacun des boutons "plus" et "moins" et des événements sur les boutons qui permettent d'ajouter
ou enlever des selects avec les ingrédients ou tag*/
document.addEventListener('DOMContentLoaded',function(){
	let menu_ingredient=document.getElementById("ingredients");
	let menu_tag=document.getElementById("tags");
	
	bouton_moins_ing = document.getElementById("moins_ing")
	bouton_plus_ing = document.getElementById("plus_ing")
	bouton_moins_tag = document.getElementById("moins_tag")
	bouton_plus_tag = document.getElementById("plus_tag")

	bouton_moins_ing.disabled = true
	bouton_moins_tag.disabled = true

	bouton_moins_ing.addEventListener('click',function (event){
		supprimerIngredient(menu_ingredient)
	})

	bouton_plus_ing.addEventListener('click',function (){
		ajouterIngredient(menu_ingredient);
		bouton_moins_ing.disabled=false;
	})

	bouton_moins_tag.addEventListener('click',function (event){
		supprimerTag(menu_tag);
	})

	bouton_plus_tag.addEventListener('click',function (){
		ajouterTag(menu_tag);
		bouton_moins_tag.disabled=false;
	})

})

})()
</script>