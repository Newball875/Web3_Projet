(function (){

    let liste_ingredients = []

    let genererContenuDivBouttonMoinsPlus = function(conteneur){
        let boutton_moins = document.createElement("button")
        boutton_moins.innerHTML = "-"

        let boutton_plus = document.createElement("button")
        boutton_plus.innerHTML = "+"

        div_bouttons_moins_plus.appendChild(boutton_moins)
        div_bouttons_moins_plus.appendChild(boutton_plus)
    }

    let creerInput = function(type_attribut,class_attribut,name_attribut,placeholder_attribut){
        let conteneur = document.createElement("input")
        conteneur.type = type_attribut
        conteneur.classList.toggle(class_attribut)
        conteneur.name = name_attribut
        conteneur.placeholder = placeholder_attribut
        return conteneur
    }

    let genererContenuDivIngredient = function(conteneur){
        let hi_ingredient = document.createElement("h1")

        let input_nom_ingredient = creerInput("text","form-control","nom","nom ingredient")

        let input_type_ingredient = creerInput("text","form-control","type","type ingredient")

        let input_image_ingredient = creerInput("text","form-control","image","image ingredient")

        conteneur.appendChild(hi_ingredient)
        conteneur.appendChild(input_nom_ingredient)
        conteneur.appendChild(input_type_ingredient)
        conteneur.appendChild(input_image_ingredient)
    }

    let creerDivIngredient = function(){
        let div_ingredient = document.createElement("div")
        genererContenuDivIngredient(div_ingredient)
        liste_ingredients.push(div_ingredient)
        return div_ingredient
    }

    let genererContenuForm = function(conteneur){
        // le conteneur est un formulaire
        let div_bouttons_moins_plus = document.createElement("div")

        genererContenuDivBouttonMoinsPlus(div_bouttons_moins_plus)

        conteneur.appendChild(div_bouttons_moins_plus)

        let div_liste_ingredients = document.createElement("div")
        div_liste_ingredients.appendChild(creerDivIngredient())

        conteneur.appendChild(div_liste_ingredients)

        let boutton_envoyer = document.createElement("button")
        boutton_envoyer.innerHTML = "Envoyer"

        conteneur.appendChild(boutton_envoyer)

    }

    document.addEventListener('DOMContentLoaded',function(){
        let form_ingredient = document.querySelector("#form-ingredient")
        genererContenuForm(form_ingredient)
    })

})()