<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Nouveau chapitre - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Rédaction d'un nouveau chapitre">
	</head>
	
	<body>
		<!--En-tête-->
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
					<!--Formulaire de création d'un nouveau chapitre-->
					<h3 id="newChapterTitle">Nouveau Chapitre</h3>
					<form id="newChapitre" action="index.php?action=addChapter" method="post">
						<div class="styleForm">
							<label for="numChapter">Numéro du chapitre:</label>
							<input type="number" id="numChapterAdmin" name="numChapter" required />
							<label for="titleChap">Titre du chapitre:</label>
							<input type="text" id="titleChapAdmin" name="titleChap" required/>
						</div>
						<div class="styleForm">
							<label for="txtChap">Contenu du chapitre:</label><br/>
							<textarea id="txtChapAdmin" class="largeTxtAdmin" name="txtChap"></textarea>
							<div class="submitNewChapter">
								<a class="submit" href="chapitres">Annuler</a>
								<input type="submit" class="submit" value="Enregistrer" />
							</div>
						</div>
					</form>
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

		<!--Fichiers Javascript-->
		<script src="tinymce/tinymce.min.js"></script>
		<script src="tinymce/parametresTinyMCE.js"></script>

	</body>
	
</html>