<script>
(function (){

let liste_ingredients = [];
let liste_options_ingredient = [];

let liste_tags = [];
let liste_options_tag = [];

let bouton_moins = undefined
let bouton_plus = undefined

let i=1
let nombre_ingredients = 0;
let i_tag=1;

//Compte le nombre d'ingrédients contenus dans la base de donnée
let compterIngredientBdd = function(){
    <?php
    foreach ($tab_ingredients as $ingredient){ ?>
        nombre_ingredients++;
        <?php
        }
    ?>
}

//Insère dans une option le choix des ingrédients présents dans la base de donnée
let insererIngredientsBdd = function(conteneur){
    let choix;
    let options_ingredient = [];

    <?php
        foreach($tab_ingredients as $ingredient){ ?>
            choix=document.createElement("option");
            choix.innerHTML="<?=$ingredient->nom?>";
            choix.value="<?=$ingredient->id?>";
            choix.classList.toggle("menu_ingredient");
            choix.addEventListener('click',function(){
                conteneur.firstElementChild.disabled = true;
                disabledIngredient();
            })
            conteneur.appendChild(choix)
            options_ingredient.push(choix)
        <?php
        }
    ?>
    // console.log(options_ingredient)
    liste_options_ingredient.push(options_ingredient)
    // console.log(liste_options_ingredient)
}

//Insère dans une option le choix des tags présents dans la base de donnée
let insererTagsBdd = function(conteneur){
    let choix;
    let options_tag = [];
    <?php
    foreach($tab_tags as $tag){ ?>
        choix=document.createElement("option");
        choix.innerHTML="<?=$tag->nom?>";
        choix.value="<?=$tag->id?>";
        choix.classList.toggle("menu_tag");
        choix.addEventListener('click',function (){
            conteneur.firstElementChild.disabled = true;
            disabledTag();
        })
        conteneur.appendChild(choix)
        options_tag.push(choix);
        <?php
    }
    ?>
    liste_options_tag.push(options_tag);
}

//Génére toutes les options d'ingrédients dans un select
let genererContenuDivIngredient = function(conteneur){
	let select = document.createElement("select");
	select.classList.toggle("menu_ingredient");
    select.name = "ingredients"+i;

	let option = document.createElement("option");
	option.innerHTML = "Ingrédients";
	option.disabled = false;
	select.appendChild(option)

	insererIngredientsBdd(select);

	let input=document.createElement("input");
	input.type="number";
    input.classList.add("form-control");
	input.name="quantite"+i;

	conteneur.appendChild(select)
	conteneur.appendChild(input)
	i=i+1;
}

//Génére toutes les options de tag dans un select
let genererContenuDivTag = function(conteneur){
    let select = document.createElement("select");
    select.classList.toggle("menu_tag");
    select.name = "tags"+i_tag;

    let option = document.createElement("option");
    option.innerHTML = "Tags";
    option.disabled = false;
    select.appendChild(option)

    insererTagsBdd(select);
    conteneur.appendChild(select)
    i_tag = i_tag + 1
}

//Créer une div pour le contenu des ingrédients
let creerDivIngredient = function(){
	let div_ingredient = document.createElement("div")
	genererContenuDivIngredient(div_ingredient)
	return div_ingredient
}

//Créer une div pour le contenu des tags
let creerDivTag = function(){
    let div_tag = document.createElement("div")
    div_tag.classList.toggle("select")
    genererContenuDivTag(div_tag)
    return div_tag
}

//Permet de supprimer un ingrédient afin qu'il ne puisse pas être choisi à nouveau
let supprimerIngredient = function(conteneur){
	if(!bouton_moins.disabled){
        bouton_plus.disabled = false;
		conteneur.removeChild(conteneur.lastChild)
		liste_ingredients.pop()
		if(liste_ingredients.length === 1){
			bouton_moins.disabled = true
		}
	}
}

//Ajoute un ingrédient dans le conteneur
let ajouterIngredient = function (conteneur){
    if(!(bouton_plus.disabled === true)){
        bouton_moins.disabled = false
        let nouvel_ingredient = creerDivIngredient();
        liste_ingredients.push(nouvel_ingredient)
        conteneur.appendChild(nouvel_ingredient)

        // console.log(nombre_ingredients);
        // console.log(liste_options_ingredient[0].length);

        if(nombre_ingredients === liste_ingredients.length){
            bouton_plus.disabled = true;
        }
    }

}

//Ajoute un Tag dans le conteneur
function ajouterTag(conteneur){
    let nouveau_tag = creerDivTag();
    liste_tags.push(nouveau_tag);
    conteneur.appendChild(nouveau_tag);

    /*let div = document.createElement('div');

    let select = document.createElement("select");
    select.classList.add("menu_tag");
    select.name="tags"+i_tag;
    i_tag++;
    mettreTousTags(select);

    div.appendChild(select);
    conteneur.appendChild(div);
    liste_tags.push(div);*/
}

//Rend un ingrédient impossible à sélectionner
let disabledIngredient = function(){
    let liste_value = []
    liste_ingredients.forEach(ingredient => {
        let conteneur = ingredient.firstElementChild
        console.log(conteneur.value)
        if(!(conteneur.value === "" || conteneur.value === "Ingrédients")){
            liste_value.push(conteneur.value)
        }

    })

    console.log(liste_value)

    for(let i = 0; i < liste_options_ingredient.length;i++){ // pour chaque ingrédient
        for(let j = 0; j < liste_options_ingredient[i].length;j++){
            liste_options_ingredient[i][j].disabled = false;
        }
        for(let j = 0; j < liste_value.length; j++){
            if(j !== i){
                liste_options_ingredient[i][liste_value[j]-1].disabled = true;
            }

        }
    }
}

//Rend un Tag impossible à sélectionner
function disabledTag(){
    let liste_value_tag = []
    console.log( "liste des tags du départ : ")
    console.log(liste_tags)
    liste_tags.forEach(tag => {
        console.log(tag)
        let conteneur = tag.firstElementChild
        console.log(conteneur.value)
        if(!(conteneur.value === "" || conteneur.value === "Tags")){
            liste_value_tag.push(conteneur.value)
        }
    })

    console.log(liste_value_tag)

    for(let i = 0; i < liste_options_tag.length;i++){ // pour chaque ingrédient
        for(let j = 0; j < liste_options_tag[i].length;j++){
            liste_options_tag[i][j].disabled = false;
        }
        for(let j = 0; j < liste_value_tag.length; j++){
            if(j !== i){
                liste_options_tag[i][liste_value_tag[j]-1].disabled = true;
            }

        }
    }
}

//Supprime un Tag du conteneur
function supprimerTag(conteneur){
    liste_tags.pop();
	conteneur.removeChild(conteneur.lastChild);
	i_tag--;
	if(conteneur.childElementCount==2){
		bouton_moins_tag.disabled=true;
	}
}


//Quand la page se charge, elle compte le nombre d'ingrédient dans la base de donnée et organise les
document.addEventListener('DOMContentLoaded',function(){

    compterIngredientBdd()

    let li_premier_ingredient = document.querySelector("#liste-ingredients").querySelector('div')
	liste_ingredients.push(li_premier_ingredient)
	// console.log(liste_ingredients.length)
    // console.log(liste_ingredients)
    // console.log(liste_ingredients[0].querySelector('select'))
    insererIngredientsBdd(liste_ingredients[0].querySelector('select'))

	let conteneur = document.querySelector("#liste-ingredients")

    let menu_tag=document.getElementById("liste-tags");
    let li_premier_tag =document.querySelector("#liste-tags").querySelector('div');

    // console.log(elements[0])
    liste_tags.push(li_premier_tag)

    insererTagsBdd(liste_tags[0].querySelector('select'))

	bouton_moins = document.querySelector("#moins")
	bouton_plus = document.querySelector("#plus")

	bouton_moins.disabled = true

	bouton_moins.addEventListener('click',function (event){
		supprimerIngredient(conteneur)
		// console.log(liste_ingredients.length)
		// console.log(liste_ingredients)
        disabledIngredient()
	})

	bouton_plus.addEventListener('click',function (){

		ajouterIngredient(conteneur)
		// console.log(liste_ingredients.length)
		// console.log(liste_ingredients)
        disabledIngredient()
	})

    bouton_moins_tag = document.getElementById("moins-tag")
	bouton_plus_tag = document.getElementById("plus-tag")
    bouton_moins_tag.disabled = true

    bouton_moins_tag.addEventListener('click',function (event){
		supprimerTag(menu_tag);
        disabledTag();
	})

	bouton_plus_tag.addEventListener('click',function (){
		ajouterTag(menu_tag);
		bouton_moins_tag.disabled=false;
        disabledTag();
	})


})

})()


</script>