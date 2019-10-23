<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Résumé - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/Alaska.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>
	
	<body>
		<!--En-tête-->
		<header>
			<?php include("public/bandeau.php");?>
			<a class="button retourAccueil" href="index.php">Accueil</a>
			<a class="button retourListeChap" href="index.php?action=listChapter">Liste des chapitres</a>
		</header>

		<main>
			<?php
				if (isset($_SESSION['auth'])) {
			?>	
					<h3 id="summaryTitle">Résumé du livre</h3>
					<form id="updateSummary" class="styleForm" action="index.php?action=updateSummary" method="post" >
						<textarea id="contentSummary" class="smallTxtAdmin"  name="content" rows="255" >
							<?= htmlspecialchars($summary['content']) ?>
						</textarea>
						<div class="submitAccueil">
							<a class="submit" href="index.php">Annuler</a>
							<input type="submit" class="submit" value="Enregistrer" />
						</div>
					</form>
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

		<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="tinymce/parametresTinyMCE.js"></script>
	</body>
</html>