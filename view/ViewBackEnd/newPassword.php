<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Accès à l'interface d'administration</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
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
			<?php
				if (isset($_SESSION['auth'])) {
			?>
					<h3> Modification du mot de passe </h3>
					<form id="formMdP" method="post">
						<div class="saisieMdP" id="saisieNewMdP">
							<label for="login"> Identifiant</label>
							<input type="text" name="login"/><br/><br/>
							<label for="oldPassword">Mot de passe </label>
							<input id="oldPassword" type="password" name="password" /><br/><br/>
							<label for="newPassword">Nouveau mot de passe </label>
							<input id="newPassword" type="password" name="newPassword" /><br/><br/>
							<label for="confirmNewPassword">Confirmer le nouveau mot de passe </label>
							<input id="confirmNewPassword" type="password" name="confirmNewPassword" /><br/>
						</div>
						<div class="submitNewPassword">
							<a class="submit" href="index.php">Annuler</a>
							<input type="submit" class="submit" value="Valider" />
						</div>
					</form>
					<div id="redirectionNewPsw" class="redirection">
					</div>
			<?php
				}else {
			?>
					<h3> Vous n'avez pas les droits sur cette page </h3>
			<?php
				}
			?>	
		</main>
		<footer>
			<?php include("public/footer.php");?>
		</footer>
	</body>
	<script src="public/gestionUsers.js"> </script>
</html>	