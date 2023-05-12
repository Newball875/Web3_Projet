
//Envoie vers la page correspondante à la bonne liste et au bon id
function modifier(id,liste){
	document.location.href="modifier_"+liste+".php?id="+id;
}

//Demande à la personne s'il veut réellement supprimer la liste choisi, et la supprime si le client confirme
function supprimer(id,liste){
	let result=confirm("Voulez-vous réellement supprimer cette instance des : "+liste+" ?");
	if(result){
		if(result){
			document.location.href="supprimer_"+liste+".php?id="+id;
		}
	}
	
}

/*Quand la page charge, elle applique à chacun des boutons "modifier" et "supprimer" un événement qui appelle
Les fonction modifier() et supprimer() quand ils sont cliqués*/
document.addEventListener('DOMContentLoaded', function (){
	let liste=["tags","ingredients","origines"];
	let i=0;
	while(i<liste.length){
		let la_liste=liste[i];
		let tag=document.getElementsByClassName(la_liste);
   		let j=0;
		while(j<tag.length){
			let id=tag[j].id;

			let modif=tag[j].getElementsByClassName("modif")[0];
			let suppr=tag[j].getElementsByClassName("suppr")[0];

			modif.addEventListener("click",function(event){
				modifier(id,la_liste);
			})
			suppr.addEventListener("click",function(event){
				supprimer(id,la_liste);
			})

			j++;
		}
		i=i+1;
	}
})
