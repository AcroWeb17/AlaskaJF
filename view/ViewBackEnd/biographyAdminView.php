<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Biographie - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>
	
	<body>
		<!--En-tête-->
		<header>
			<?php include("public/bandeau.php");?>
			<div id="menu">
				<a class="button retourAccueil" href="accueil">Accueil</a>
				<a class="button retourListeChap" href="chapitres">Liste des chapitres</a>
			</div>
		</header>

		<!--Corps de page-->
		<main>
			<!--En mode Admin-->
			<?php
				if (isset($_SESSION['auth'])) {
			?>		
					<!--Formulaire de rédaction de la biographie-->
					<h3 id="biographyTitle">Biographie</h3>
					<form id="updateBiography" class="styleForm" action="index.php?action=updateBiography" method="post" >
						<textarea id="contentBiography" class="smallTxtAdmin" name="content" rows="255" >
							<?=html_entity_decode(($biography['content']))?>
						</textarea>
						<div class="submitAccueil">
							<a class="submit" href="accueil">Annuler</a>
							<input type="submit" class="submit" value="Enregistrer" />
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
		<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="tinymce/themes/silver/theme.min.js"></script>
		<script type="text/javascript" src="tinymce/parametresTinyMCE.js"></script>
		
	</body>
</html>