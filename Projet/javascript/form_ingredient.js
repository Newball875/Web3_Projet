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

    let genererContenuDivIngredient = function(conteneur){
        let h1_ingredient = document.createElement("h1")
        h1_ingredient.innerHTML = "Ingredient"

        let input_nom_ingredient = creerInput("text","form-control","nom","nom ingredient")

        let input_type_ingredient = creerInput("text","form-control","type","type ingredient")

        let input_image_ingredient = creerInput("text","form-control","image","image ingredient")

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