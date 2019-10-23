<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Suppression du chapitre <?= htmlspecialchars($chap['numChapter']); ?>  - Billet simple pour l'Alaska</title>
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
					<h3> Etes-vous certain de vouloir supprimer ce chapitre? </h3>
					<a href="index.php?action=deleteChapter&id=<?= htmlspecialchars($chap['id']); ?>" 
					   class="editButton deleteConfirmChap">Confirmer la suppression</a>
					<a class="button deleteListChap" href="index.php?action=listChapter">Liste des chapitres</a>
					<a class="button deleteAccueil" href="index.php">Retour à la page d'accueil</a>
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
</html>	