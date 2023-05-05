<script>
(function (){

let liste_ingredients = [];
let liste_options_ingredient = [];

let bouton_moins = undefined
let bouton_plus = undefined

let i=1

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

let insererIngredientBdd = function(conteneur){
    let choix;
    let options_ingredient = [];

    <?php
        foreach($tab_ingredients as $ingredient){ ?>
            choix=document.createElement("option");
            choix.innerHTML="<?=$ingredient->nom?>";
            choix.value="<?=$ingredient->id?>";
            choix.addEventListener('click',function (){
                disabledIngredient();
            })
            conteneur.appendChild(choix)
            options_ingredient.push(choix)
        <?php
        }
    ?>
    console.log(options_ingredient)
    liste_options_ingredient.push(options_ingredient)
}


let genererContenuDivIngredient = function(conteneur){
	let select = document.createElement("select");
	select.name = "ingredients"+i;
	select.class="menu_ingredient";

	let option = document.createElement("option");
	option.innerHTML = "Ingrédients";
	option.disabled = true;
	select.appendChild(option)

	insererIngredientBdd(select);

	let input=document.createElement("input");
	input.type="number";
	input.name="quantite"+i;

	conteneur.appendChild(select)
	conteneur.appendChild(input)
	i=i+1;
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

let disabledIngredient = function(){
    liste_ingredients.forEach(ingredient => {
        // console.log(ingredient.firstChild.nextElementSibling)
        let conteneur = ingredient.firstChild
        console.log(conteneur.value)
    })
}

document.addEventListener('DOMContentLoaded',function(){
	let li_premier_ingredient = document.querySelector("#liste-ingredients").firstElementChild.nextElementSibling
	liste_ingredients.push(li_premier_ingredient)
	console.log(liste_ingredients.length)
    console.log(liste_ingredients)

    insererIngredientBdd(liste_ingredients[0].firstChild.nextElementSibling)

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
        disabledIngredient()
	})

})

})()


</script>