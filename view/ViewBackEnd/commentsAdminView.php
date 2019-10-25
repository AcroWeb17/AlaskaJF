<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Administration des commentaires - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/Alaska.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>

	<body>
		<header>
			<?php include("public/bandeau.php"); ?>
			<a class="button retourAccueil" href="index.php">Accueil</a>
			<a class="button retourListeChap" href="index.php?action=listChapter">Liste des chapitres</a>
		</header>

		<main>
			<?php
				if (isset($_SESSION['auth'])) {
			?>	
					<h3> Administration des commentaires </h3>
					<section>
						<?php
						//on affiche le contenu
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
										<a id="commentLienChap" href="index.php?action=chapter&id=<?= htmlspecialchars($data['idChapter']); ?>">Retour au chapitre</a>
										
										<?php
											if ((htmlspecialchars($data['alert']))==='1')
											{
										?>
												<p class="signalComment" id="alertComment">Commentaire signalé</p>
										<?php
											}	
										?>
										<a href="index.php?action=confirmDeleteComment&id=<?= htmlspecialchars($data['id']); ?>" class="submit" id="deleteCommentList">Supprimer</a>
									</div>
									<p>
										Commentaire
										<?= nl2br(htmlspecialchars($data['comment'])); ?>
									</p>							
									
								</div>
						<?php
							}	
						?>
					</section>
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