<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Confirmation de la suppression - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/Alaska.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>

	<body>
		<header>
			<?php include("public/bandeau.php"); ?>
		</header>

		<main>
			<?php
				if (isset($_SESSION['auth'])) {
			?>	
					<h3> Le chapitre a bien été supprimé</h3>
					<a class="button deleteChapAccueil" href="index.php">Retour à la page d'accueil</a>
					<a class="button deleteChapRetourList" href="index.php?action=listChapter">Liste des chapitre</a>

		</main>
			<?php
				}else {
			?>
					<h3> Vous n'avez pas les droits sur cette page </h3>
			<?php
				}
			?>
		<footer>
			<?php include("public/footer.php");?>
		</footer>
	</body>
</html>	