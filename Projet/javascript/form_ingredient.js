(function (){

    let liste_ingredients = []

    let bouton_moins = undefined
    let bouton_plus = undefined

    //Génére une selection qui prend toutes les options d'ingrédients
    let genererContenuDivIngredient = function(conteneur){
        let label = document.createElement("label");
        label.innerHTML = "Ingredient";

        let select = document.createElement("select");
        select.name = label.innerHTML;

        let option = document.createElement("option");
        option.innerHTML = "Choisissez";
        option.disabled = true;

        select.appendChild(option)

        conteneur.appendChild(label)
        conteneur.appendChild(select)
    }

    //Créer une div pour la sélection des ingrédients
    let creerDivIngredient = function(){
        let div_ingredient = document.createElement("div")
        genererContenuDivIngredient(div_ingredient)
        return div_ingredient
    }

    //Supprime un ingrédient de la liste d'ingrédients, c'est-à-dire un ingrédient déjà créer
    let supprimerIngredient = function(conteneur){
        if(!bouton_moins.disabled){
            conteneur.removeChild(conteneur.lastChild)
            liste_ingredients.pop()
            if(liste_ingredients.length === 1){
                bouton_moins.disabled = true
            }
        }
    }

    //Ajoute un ingrédient dans la liste d'ingrédients, c'est-à-dire un nouveau choix d'ingrédients
    let ajouterIngredient = function (conteneur){
        bouton_moins.disabled = false
        let nouvel_ingredient = creerDivIngredient();
        liste_ingredients.push(nouvel_ingredient)
        conteneur.appendChild(nouvel_ingredient)
    }

    /*Au moment du chargement de la page, les boutons + et - pour les ingrédients et les tags peuvent être utilisés afin d'ajouter un nouveau ingrédient ou Tag*/
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
            bouton_moins.preventDefault()
        })

        bouton_plus.addEventListener('click',function (){
            ajouterIngredient(conteneur)
            console.log(liste_ingredients.length)
            console.log(liste_ingredients)
        })

    })

})()