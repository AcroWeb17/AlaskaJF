<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Chapitre</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>

	<body>
		<header>
			<?php include("public/bandeau.php");?>
			<a class="retourAccueil button" id="accueilChapitre" href=index.php>Accueil</a>
			<a class="retourAccueil button" id="retourListeChap" href=index.php?action=listChapter>Liste des chapitres</a>

		</header>

		<main>
				<h2 id="numChapitre">
				<!-- chapitre.num Ajout du numero du chapitre-->
						CHAPITRE
						<?= htmlspecialchars($chap['numChapter']) ?>
					</h2>
					<h3 id=titreChapitre>
						<!-- chapitre.titre Ajout du titre du chapitre-->
						<?= htmlspecialchars($chap['title']) ?>
					</h3>
					<p class="contenuChapitre">
						<!-- chapitre.texte Ajout du contenu du chapitre-->
						<?= nl2br(htmlspecialchars($chap['texte'])) ?>
							
					</p>

				<section id=commentaire>
					<h3 id="commentTitle">Commentaires</h3>
					<p class="commentAffiche">
						<?= htmlspecialchars($comments['author']) ?>
					</p>
					<p class="commentAffiche">
						<?= nl2br(htmlspecialchars($comments['comment'])) ?>
					</p>
					<form action="index.php?action=addComment&amp;id=<?= $chap['numChapter'] ?>" method="post">
						<div>
							<label for="author">Author</label><br/>
							<input type="text" id="author" name="author"/>
						</div>
						<div>
							<label for="comment">Commentaire</label><br/>
							<textarea id="comment" name="comment"></textarea>
						</div>
						<div>
							<input type="submit"/>
						</div>
					</form>
				</section>

		</main>	

		<footer>
			<?php include("public/footer.php");?>
		</footer>
	</body>