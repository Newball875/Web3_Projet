function supprimer(){
	let result=confirm("Voulez-vous réellement supprimer cette recette ?");
	if(result){
		if(result){
			document.location.href="supprimer_recette.php";
		}
	}
}

document.addEventListener('DOMContentLoaded',function(){
    let bouton_suppr=document.getElementById("suppr");
	if(bouton_suppr!=null){
		bouton_suppr.addEventListener('click',function (event){
			supprimer();
		})
	}
})