<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Administration des commentaires - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Administration des commentaires">
	</head>

	<body>
		<!--En tête-->
		<header>
			<?php include("public/bandeau.php"); ?>
			<a class="button retourAccueil" href="accueil">Accueil</a>
			<a class="button retourListeChap" href="chapitres">Liste des chapitres</a>
		</header>

		<!--Corps de page-->
		<main>
			<!--En mode Admin-->
			<?php
				if (isset($_SESSION['auth'])) {
			?>	
					<!--Adminsitration des commentaires-->
					<h3> Administration des commentaires </h3>
					<section>
						<!--Affichage de la liste des commentaires-->
						<?php
							while($data = $listComments ->fetch())
							{
						?>
								<div id="commentsList">
									<div class="dispoComment">
										<p class="commentAuthor">
											<?= htmlspecialchars($data['author']); ?> - 
										</p>
										<p class="commentDate">
											 <?= htmlspecialchars($data['dateComment']); ?>
										</p>
										<a id="commentLienChap" href="chapitre-<?= htmlspecialchars($data['numChapter']); ?>">Retour au chapitre</a>
										
										<!--Si un commentaire a été signalé-->
										<?php
											if ((htmlspecialchars($data['alert']))==='1') {
										?>
												<p class="signalComment" id="alertComment">Commentaire signalé</p>
										<?php
											}	
										?>
										<a href="suppression-commentaire-<?= htmlspecialchars($data['id']); ?>" class="submit" id="deleteCommentList">Supprimer</a>
									</div>
									<p>
										<?= nl2br(htmlspecialchars($data['comment'])); ?>
									</p>							
								</div>
						<?php
							}	
						?>
					</section>

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