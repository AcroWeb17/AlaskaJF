<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Accès à l'interface d'administration</title>
		<link rel="shortcut icon" href="Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/Alaska.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>

	<body>
		<header>
			<?php include("public/bandeau.php");?>
		</header>

		<main>
			<h3> Modification du mot de passe </h3>
			<form id="formConnexion"  action="index.php?action=interfaceAdmin" method="post">
				<div id="saisieMdP">
					<label for="login"> Identifiant</label>
					<input type="text" name="login"/><br/>
					<label for="password">Mot de passe </label>
					<input id="motDePasse" type="password" name="password" /><br/>
					<label for="password">Nouveau mot de passe </label>
					<input id="motDePasse" type="password" name="password" /><br/>
				</div>
				<button id="connectButton" type="submit" value="Se connecter">Valider</button>
				<a class="retourAccueil" id="accueilConnexion" href="index.php">Retour à la page d'accueil</a>
			</form>
		</main>
	</body>
</html>	