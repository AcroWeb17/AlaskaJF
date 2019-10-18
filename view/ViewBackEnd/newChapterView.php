<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Nouveau chapitre - Billet simple pour l'Alaska</title>
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
			<form id="newChapitre" action="index.php?action=addChapter" method="post">
				<div>
					<label for="numChapter">Numéro du chapitre</label><br/>
					<input type="number" id="numChapterAdmin" name="numChapter" />
				</div>
				<div>
					<label for="titleChap">Titre du chapitre</label><br/>
					<input type="text" id="titleChapAdmin" name="titleChap"/>
				</div>
				<div>
					<label for="txtChap">Chapitre</label><br/>
					<textarea id="txtChapAdmin" name="txtChap"></textarea>
				</div>
				<input type="submit" id="submitNewChap"  value="Enregistrer" />
			</form>
		</main>

		<footer>
			<?php include("public/footer.php");?>
		</footer>
		<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="tinymce/parametresTinyMCE.js"></script>
	</body>
</html>