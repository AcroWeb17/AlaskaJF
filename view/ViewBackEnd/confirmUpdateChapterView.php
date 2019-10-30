<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Modifications - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>

	<body>
		<!--En tête-->
		<header>
			<?php include("public/bandeau.php"); ?>
		</header>

		<!--Corps de page-->
		<main>
			<!--En mode Admin-->
			<?php
				if (isset($_SESSION['auth'])) {
			?>
					<!--Confirmation de la modification d'un chapitre-->
					<h3> La modification a bien été effectuée </h3>
					<a class="button" id="modifAccueil" href="accueil">Retour à la page d'accueil</a>
					<a class="button" id="modifListChap" href="chapitres">Liste des chapitres</a>

			<!--En mode Utilisateur-->
			<?php
				} else {
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
		
	</body>
</html>	