//Permet de déconnecter l'utilisateur
function deco(){
	document.location.href="log.php";
}
//Quand la page se charge, elle attend un click de souris sur un bouton "log out" afin de lancer la fonction "deco()"
document.addEventListener('DOMContentLoaded', function (){
    let logout=document.getElementById("logout");
    if(logout!=null){
		logout.addEventListener("click",function(event){
			deco();
		})
	}
})