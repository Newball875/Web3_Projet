function supprimer(){
	let result=confirm("Voulez-vous réellement supprimer cette recette ?");
	if(result){
		if(result){
			document.location.href="supprimer_recette.php";
		}
	}
}

function modifier(){
	console.log("Oui");
	document.location.href="modifier_recette.php";
}

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