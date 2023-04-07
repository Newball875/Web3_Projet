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

    let genererContenuDivIngredient = function(conteneur){
        let hi_ingredient = document.createElement("h1")
        let input_nom_ingredient = document.createElement("input")
        let input_type_ingredient = document.createElement("input")
        let input_image_ingredient = document.createElement("input")

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

        let boutton_envoyer = document.createElement("button")
        boutton_envoyer.innerHTML = "Envoyer"

    }

    document.addEventListener('DOMContentLoaded',function(){
        let form_ingredient = document.querySelectorAll("#form-ingredient")
        genererContenuForm(form_ingredient)
    })

})()