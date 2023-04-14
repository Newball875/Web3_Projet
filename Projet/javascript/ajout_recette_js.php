<script>
(function (){

let liste_ingredients = []

let bouton_moins = undefined
let bouton_plus = undefined

let creerInput = function(type_attribut,class_attribut,name_attribut,placeholder_attribut){
	let conteneur = document.createElement("input")
	conteneur.type = type_attribut
	conteneur.classList.toggle(class_attribut)
	conteneur.name = name_attribut
	conteneur.placeholder = placeholder_attribut
	return conteneur
}

let ajouterOptionSelect = function(conteneur,value){
	let option = document.createElement("option");
	option.value = value;
	option.innerHTML = value;

	conteneur.appendChild(option);
}


let genererContenuDivIngredient = function(conteneur){
	let select = document.createElement("select");
	select.name = "ingredients";
	select.class="menu_ingredient";

	let option = document.createElement("option");
	option.innerHTML = "Ingrédients";
	option.disabled = true;
	select.appendChild(option)

	let choix;

	<?php
	foreach($tab_ingredients as $ingredient){ ?>
		choix=document.createElement("option");
		choix.innerHTML="<?=$ingredient->nom?>";
		choix.value="<?=$ingredient->nom?>";
		select.appendChild(choix)
		<?php
	}
	?>

	let input=document.createElement("input");
	input.type="number";
	input.name="quantite";

	conteneur.appendChild(select)
	conteneur.appendChild(input)
}

let creerDivIngredient = function(){
	let div_ingredient = document.createElement("div")
	genererContenuDivIngredient(div_ingredient)
	return div_ingredient
}


let supprimerIngredient = function(conteneur){
	if(!bouton_moins.disabled){
		conteneur.removeChild(conteneur.lastChild)
		liste_ingredients.pop()
		if(liste_ingredients.length === 1){
			bouton_moins.disabled = true
		}
	}
}

let ajouterIngredient = function (conteneur){
	bouton_moins.disabled = false
	let nouvel_ingredient = creerDivIngredient();
	liste_ingredients.push(nouvel_ingredient)
	conteneur.appendChild(nouvel_ingredient)
}

document.addEventListener('DOMContentLoaded',function(){
	let li_premier_ingredient = document.querySelector("#liste-ingredients").firstElementChild
	liste_ingredients.push(li_premier_ingredient)
	console.log(liste_ingredients.length)

	let conteneur = document.querySelector("#liste-ingredients")

	bouton_moins = document.querySelector("#moins")
	bouton_plus = document.querySelector("#plus")

	bouton_moins.disabled = true

	bouton_moins.addEventListener('click',function (event){
		supprimerIngredient(conteneur)
		console.log(liste_ingredients.length)
		console.log(liste_ingredients)
	})

	bouton_plus.addEventListener('click',function (){
		ajouterIngredient(conteneur)
		console.log(liste_ingredients.length)
		console.log(liste_ingredients)
	})

})

})()


</script>