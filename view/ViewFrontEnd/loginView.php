<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Interface de connexion - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/Alaska.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>

	<body>
		<header>
			<?php include("public/bandeau.php");?>
		</header>

		<main>
			<h3> Se connecter </h3>
			<form id="formConnexion"  method="post">
				<div id="saisieMdP">
					<label for="login"> Identifiant</label>
					<input type="text" name="login" id="loginUser"/><br/><br/>
					<label for="password">Mot de passe </label>
					<input id="passwordUser" type="password" name="password" /><br/>
				</div>
				<button class="button" id="connectButton" type="submit" value="Se connecter">Se connecter</button>
				<a class="button" id="connectRetourAccueil" href="index.php">Retour à la page d'accueil</a>
			</form>
			<div id="redirectionConnect">
			</div>
		</main>
	</body>
	<script src="public/gestionUsers.js"> </script>
</html>	