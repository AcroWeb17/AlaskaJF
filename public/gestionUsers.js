if (document.getElementById("formConnexion")){
	document.getElementById("formConnexion").addEventListener("submit",verifUser,false)
}
else if(document.getElementById("formMdP")){
	document.getElementById("formMdP").addEventListener("submit",verifPassword,false)
};

function ajaxPost(url, data, callback){
    var req = new XMLHttpRequest();
    req.open("POST", url);
    req.addEventListener("load",function(){
    	callback(req.responseText);
    }); 
    req.send(data);
}

function verifUser(e){
	e.preventDefault();
	var data = new FormData(document.getElementById("formConnexion"));
	ajaxPost("index.php?action=interfaceAdmin",data, callUser);
}

function callUser(reponse){
	if (reponse == "echec"){
		document.getElementById("redirectionConnect").innerHTML="Echec de la connexion";
	}
	else if (reponse == "succes")
	{
		document.getElementById("redirectionConnect").innerHTML="Vous êtes maintenant connecté.<br/> Vous allez être redirigé vers la page d'accueil dans quelques instants...";
		setTimeout(function(){window.location = "index.php";},3000);
	}
}

function verifPassword(e){
	e.preventDefault();
	var data = new FormData(document.getElementById("formMdP"));
	ajaxPost("index.php?action=updatePassword",data, callPassword);
}

function callPassword(reponse){
	console.log(reponse);
	if (reponse == "echec"){
		document.getElementById("redirectionNewPsw").innerHTML="Echec de la connexion";
	}
	else if (reponse == "succes")
	{
		document.getElementById("redirectionNewPsw").innerHTML="Votre mot de passe a bien été mofifié.<br/> Vous allez être redirigé vers la page d'accueil dans quelques instants...";
		setTimeout(function(){window.location = "index.php";},3000);
	}
}