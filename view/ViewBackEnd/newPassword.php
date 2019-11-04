<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Accès à l'interface d'administration</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Modification du mot de passe de l'administrateur">
	</head>

	<body>
		<!--En tête-->
		<header>
			<?php include("public/bandeau.php");?>
			<a class="button retourAccueil" href="accueil">Accueil</a>
			<a class="button retourListeChap" href="chapitres">Liste des chapitres</a>
		</header>

		<!--Corps de page-->
		<main>
			<!--En mode Admin-->
			<?php
				if (isset($_SESSION['auth'])) {
			?>
					<!--Formulaire de modification du mot de passe-->
					<h3> Modification du mot de passe </h3>
					<form id="formMdP" method="post">
						<div class="saisieMdP" id="saisieNewMdP">
							<label for="login"> Identifiant</label>
							<input type="text" name="login" id="login" required /><br/><br/>
							<label for="oldPassword">Mot de passe </label>
							<input id="oldPassword" type="password" name="password" required /><br/><br/>
							<label for="newPassword">Nouveau mot de passe </label>
							<input id="newPassword" type="password" name="newPassword" required /><br/><br/>
							<label for="confirmNewPassword">Confirmer le nouveau mot de passe </label>
							<input id="confirmNewPassword" type="password" name="confirmNewPassword" required /><br/>
						</div>
						<div class="submitNewPassword">
							<a class="submit" href="accueil">Annuler</a>
							<input type="submit" class="submit" value="Valider" />
						</div>
					</form>
					<!--Redirection automatique-->
					<div id="redirectionNewPsw" class="redirection">
					</div>
			<!--En mode Utilisateur-->
			<?php
				}
				else {
			?>
					<h3> Vous n'avez pas les droits sur cette page </h3>
			<?php
				}
			?>	
		</main>

		<!--Pied de page-->
		<footer>
			<?php include("public/footer.php");?>
		</footer>
		<!--Fichier Javascript-->
		<script src="public/gestionUsers.js"></script>

	</body>
</html>	