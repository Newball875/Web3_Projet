//Demande à la personne s'il veut réellement supprimer la recette et la supprime si le client confirme
function supprimer(){
	let result=confirm("Voulez-vous réellement supprimer cette recette ?");
	if(result){
		if(result){
			document.location.href="supprimer_recette.php";
		}
	}
}

//Envoie vers la page correspondante à la page de modification de la recette

function modifier(){
	document.location.href="modifier_recette.php";
}

/*Quand la page charge, elle applique à chacun des boutons "modifier" et "supprimer" un événement qui appelle
Les fonction modifier() et supprimer() quand ils sont cliqués*/
document.addEventListener('DOMContentLoaded',function(){
    let bouton_suppr=document.getElementById("suppr");
	let bouton_modif=document.getElementById("modif");
	if(bouton_suppr!=null){
		bouton_suppr.addEventListener('click',function (event){
			supprimer();
		})
	}

	if(bouton_modif!=null){
		bouton_modif.addEventListener("click",function(event){
			modifier();
		})
	}
})