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
			<a class="button retourAccueil" href="index.php">Accueil</a>
			<a class="button retourListeChap" href="index.php?action=listChapter">Liste des chapitres</a>
		</header>

		<main>
			<h3> Modification du mot de passe </h3>
			<form id="formMdP"  action="index.php?action=updatePassword" method="post">
				<div id="saisieMdP">
					<label for="login"> Identifiant</label>
					<input type="text" name="login"/><br/>
					<label for="oldPassword">Mot de passe </label>
					<input id="oldPassword" type="password" name="oldPassword" /><br/>
					<label for="newPassword">Nouveau mot de passe </label>
					<input id="newPassword" type="password" name="newPassword" /><br/>
					<label for="confirmNewPassword">Confirmer le nouveau mot de passe </label>
					<input id="confNewMdP" type="password" name="confirmNewPassword" /><br/>
				</div>
				<div class="submitNewPassword">
					<a class="submit" href="index.php">Annuler</a>
					<input type="submit" class="submit" value="Valider" />
				</div>
			</form>
		</main>
	</body>
</html>	