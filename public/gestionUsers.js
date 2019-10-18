document.getElementById("formConnexion").addEventListener("submit",verifUser,false);

function verifUser(e){
	e.preventDefault();
	var data = new FormData(document.getElementById("formConnexion"));
	ajaxPost("index.php?action=interfaceAdmin",data, callPassword);
}

function ajaxPost(url, data, callback){
    var req = new XMLHttpRequest();
    req.open("POST", url);
    req.addEventListener("load",function(){
    	callback(req.responseText);
    }); 
    req.send(data);
}

function callPassword(reponse){
	console.log(reponse);
	if (reponse == "echec"){
		document.getElementById("redirectionConnect").innerHTML="Echec de la connexion";

	}
	else if (reponse == "succes")
	{
		document.getElementById("redirectionConnect").innerHTML="Vous êtes maintenant connecté. Vous allez être redirigé vers la page d'accueil.";
		setTimeout(function(){window.location = "index.php";},3000);
	}
}