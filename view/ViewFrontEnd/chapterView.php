<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title><?= htmlspecialchars($chap['title']) ?> - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
					<form id="updateChapitre" action="index.php?action=updateChapter&id=<?= htmlspecialchars($chap['id']); ?>" method="post">
						<label for="id">Identifiant du chapitre :</label>
						<input id="id" name="id" disabled value=
							"<?= htmlspecialchars($chap['id']) ?>"
						/>
						<label for="numChapter">Chapitre numéro :</label>
						<input type="number" id="numChapter" name="numChapter" value=
							"<?= htmlspecialchars($chap['numChapter']) ?>"
						/>
						<label for="title">Titre :</label>
						<input type="text" id="title" name="title" value=
							"<?= htmlspecialchars($chap['title']) ?>"
						/>
						<textarea id="texte" name="texte" rows="2" >
							<?= nl2br(htmlspecialchars($chap['texte'])) ?>
						</textarea>
						<input type="submit" class="editButton" id="submitUpdate" value="Enregistrer"/>

						<div >
							<a href="index.php?action=confirmDelete&id=<?= htmlspecialchars($chap['id']); ?>" class="editButton" id="deleteUpdate">Supprimer</a>
						</div>
					</form>
			<?php
				} else {
			?>
					<h2 id="numChapitre">
						CHAPITRE
						<?= htmlspecialchars($chap['numChapter']) ?>
					</h2>
					<h3 id="titreChapitre">
						<!-- chapitre.titre Ajout du titre du chapitre-->
						<?= htmlspecialchars($chap['title']) ?>
					</h3>
					<p class="contenuChapitre">
						<!-- chapitre.texte Ajout du contenu du chapitre-->
						<?= nl2br(htmlspecialchars($chap['texte'])) ?>
					</p>
			<?php
				} 
			?>
				<section id="commentaire">
					<h3 id="commentTitle">Commentaires</h3>
					<?php
						while($dataComment = $comments->fetch())
						{
					?>
							<p class="commentAffiche">
								<?= htmlspecialchars($dataComment['id']) ?>
							</p>
							<p class="commentAffiche">
								<?= htmlspecialchars($dataComment['author']) ?>
							</p>
							<p class="commentAffiche">
								<?= htmlspecialchars($dataComment['dateComment']) ?>
							</p>
							<p class="commentAffiche">
								<?= nl2br(htmlspecialchars($dataComment['comment'])) ?>
							</p>
						<?php
							if (isset($_SESSION['auth'])) {
						?>
								<div >
									<a href="index.php?action=confirmDeleteComment&id=<?= htmlspecialchars($dataComment['id']); ?>" class="editButton" id="deleteComment">Supprimer</a>
								</div>
						<?php
							}
						?>
					<?php
						}
					?>
				</section>
				<form action="index.php?action=addComment&amp;id=<?= $chap['id'] ?>" method="post">
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
		</main>	

		<footer>
			<?php include("public/footer.php");?>
		</footer>

		<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="tinymce/parametresTinyMCE.js"></script>

	</body>