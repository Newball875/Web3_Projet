function deco(){
	document.location.href="log.php";
    console.log("Oui");
}

document.addEventListener('DOMContentLoaded', function (){
    let logout=document.getElementById("logout");
    if(logout!=null){
		logout.addEventListener("click",function(event){
			deco();
		})
	}
})