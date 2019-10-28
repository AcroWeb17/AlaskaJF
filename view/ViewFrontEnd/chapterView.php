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
		<!--En tête-->
		<header>
			<?php include("public/bandeau.php");?>
			<a class="button retourAccueil" href="index.php">Accueil</a>
			<a class="button retourListeChap" href="index.php?action=listChapter">Liste des chapitres</a>
		</header>

		<!--Corps de page-->
		<main>
			<!--En mode Admin-->
			<?php
				if (isset($_SESSION['auth'])) {
			?>
				<a class="editButton" id="updateChap" href="index.php?action=chapterAdmin&id=<?= htmlspecialchars($chap['idChapter']); ?>">Mise à jour</a>
			<?php
				}
			?>
			<!--En mode Utilisateur-->
				<!--Affichage des chapitres-->
				<h2 id="numChapitre">
					CHAPITRE
					<?= htmlspecialchars($chap['numChapter']) ?>
				</h2>
				<h3 id="titreChapitre">
					<!-- Ajout du titre du chapitre-->
					<?= htmlspecialchars($chap['title']) ?>
				</h3>
				<p class="contenuChapitre">
					<!-- Ajout du contenu du chapitre-->
					<?= html_entity_decode($chap['texte']) ?>
				</p>
				
				<!--Affichage des commentaires-->
				<section class="commentaires">
					<h3 id="commentTitle">Commentaires</h3>
					<?php
						while($dataComment = $comments->fetch())
						{
					?>
							<div class="dispoComment">
								<p class="commentAuthor">
									<?= htmlspecialchars($dataComment['author']) ?> - 
								</p>
								<p class="commentDate">
									 <?= htmlspecialchars($dataComment['dateComment']) ?>
								</p>
								<div >
									<?php
										if ((htmlspecialchars($dataComment['alert']))==='1'){
									?>
											<p class="signalComment">En attente de modération</p>
									<?php 
										}else{
									?>								
											<a href="index.php?action=signalComment&id=<?= htmlspecialchars($dataComment['id']); ?>" class="signalComment" id="signalButton">Signaler</a>
									<?php 
										}
									?>
								</div>
								<!--En mode Admin-->
								<?php
									if (isset($_SESSION['auth'])) {
								?>
										<div >
											<a href="index.php?action=confirmDeleteComment&id=<?= htmlspecialchars($dataComment['id']); ?>" class="submit" id="deleteComment">Supprimer</a>
										</div>
								<?php
									}
								?>
							</div>
							<p class="commentAffiche">
								<?= nl2br(htmlspecialchars($dataComment['comment'])) ?>
							</p>
					<?php
						}
					?>
				</section>
				<!--En mode Utilisateur-->
				<section class="commentaires">
					<!--Formulaire de rédaction d'un commentaire-->
					<form action="index.php?action=addComment&amp;id=<?= $chap['idChapter'] ?>" method="post">
						<div>
							<label for="author">Votre nom</label>
							<input type="text" id="author" name="author"/>
						</div>
						<div id="labelComment">
							<label for="comment">Votre commentaire</label><br/>
							<textarea id="comment" name="comment"></textarea>
						</div>
						<div>
							<input type="submit" class="button" id="validComment"/>
						</div>
					</form>
				</section>
		</main>	

		<!--Pied de page-->
		<footer>
			<?php include("public/footer.php");?>
			<div class="button" id="accueilAlaska">
				<a href="index.php"> Accueil</a>
			</div>
		</footer>

		<!--Fichiers Javascript-->
		<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="tinymce/themes/silver/theme.min.js"></script>
		<script type="text/javascript" src="tinymce/parametresTinyMCE.js"></script>

	</body>
</html>
