let form = undefined

let pNick = undefined
let pMDP = undefined

let message = undefined
let serverMsg = undefined

const empty_string = "..."

document.addEventListener('DOMContentLoaded', function (){

    form = document.getElementById("user-form")
    message = document.getElementById("message")
    serverMsg = document.getElementById("server-msg")

    pNick = document.getElementById("preview-nick")
    pMDP = document.getElementById("preview-MDP")

    form.nick.addEventListener('keyup', function (){
        let val = this.value.trim()
    })
    form.mdp.addEventListener('keyup', function (){
        let val2 = this.value.trim()
    })

    form.addEventListener('submit', function (event){
        event.preventDefault()
        if (checkLogin()){
            sendRequest()
        }
    })
})

function sendRequest(){
    let url = form.action
    // préparation des données à envoyer
    let data = new FormData(form)
    let options = {
        method: 'POST',
        body: data // ajout des données pour le POST
    }
    fetch(url, options).then(response => {
        if (response.ok) {
            response.text().then(data => { // json() parse les données
                serverMsg.innerHTML = data
            })
        } else {
            alert("ERREUR avec la requête.", response.statusText);
        }
    }).catch(error => {
        console.log("ERREUR avec le fetch.", error)
    })
}

/**
 * Vérifie le formuaire
 * @returns {boolean} : true si le form est bien rempli
 */
function checkLogin(){
    let msg = ""
    let ok = true

    form.nick.value = form.nick.value.trim()
    form.MDP.value = form.MDP.value.trim()

    if(form.nick.value == "didier"){
        form.nick.classList.remove("error")
    }else {
        msg += "<div>Nickname n'est pas bon.</div>"
        form.nick.classList.add("error")
        ok = false
        console.log("error")
    }

    if(form.MDP.value =="1234"){
        form.MDP.classList.remove("error")

    }else{
        msg += "<div>Mot de passe n'est pas bon.</div>"
        form.MDP.classList.add("error")
        ok = false
    }

    if (ok){
        message.innerHTML = ""
        message.classList.add("hidden")
        serverMsg.classList.remove("hidden")
    }else{
        message.innerHTML = msg
        message.classList.remove("hidden")
        serverMsg.innerHTML = ""
        serverMsg.classList.add("hidden")
    }

    return ok
}