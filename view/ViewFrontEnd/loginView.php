<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Interface de connexion - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Interface de connexion">
	</head>

	<body>
		<!--En tête-->
		<header>
			<?php include("public/bandeau.php");?>
		</header>

		<!--Corps de page-->
		<main>
			<h3> Se connecter </h3>
			<form id="formConnexion"  method="post">
				<div class="saisieMdP" id="connectMdP">
					<label for="loginUser"> Identifiant</label>
					<input type="text" name="login" id="loginUser"/><br/><br/>
					<label for="passwordUser">Mot de passe </label>
					<input id="passwordUser" type="password" name="password" /><br/>
				</div>
				<button class="button" id="connectButton" type="submit" value="Se connecter">Se connecter</button>
				<a class="button" id="connectRetourAccueil" href="accueil">Retour à la page d'accueil</a>
			</form>
			<div id="redirectionConnect" class="redirection">
			</div>
		</main>

		<!--Pied de page-->
		<footer>
			<?php include("public/footer.php");?>
		</footer>

		<!--Fichier Javascript-->
		<script src="public/gestionUsers.js"> </script>
		
	</body>
</html>	