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

    let ajouterOptionSelect(conteneur,value){
        let option = document.createElement("option");
        option.value = value;

    }
    let genererContenuDivIngredient = function(conteneur){
        let label = document.createElement("label");
        label.innerHTML = "Ingrédient";

        let select = document.createElement("select");
        select.name = label.innerHTML;

        let option = document.createElement("option");
        option.selected = true;
        option.disabled = true;


        // <select name="pay" className="form-control">
        //     <option selected disabled>Choisissez...</option>
        //     <option value="carte">Carte</option>
        //     <option value="paypal">Paypal</option>
        // </select>

        conteneur.appendChild(h1_ingredient)
        conteneur.appendChild(input_nom_ingredient)
        conteneur.appendChild(input_type_ingredient)
        conteneur.appendChild(input_image_ingredient)
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