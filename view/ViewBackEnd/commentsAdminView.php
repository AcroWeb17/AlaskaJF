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
			<h3> Administration des commentaires </h3>
			<section id="chapitres">
				<?php
				//on affiche le contenu
					while($data = $listComments ->fetch())
					{
				?>
						<div class="episodes">
							<p>
								Auteur
								<?= htmlspecialchars($data['author']); ?>
							</p>
							<p>
								date
								<?= htmlspecialchars($data['dateComment']); ?>
							</p>
							<p>
								Commentaire
								<?= nl2br(htmlspecialchars($data['comment'])); ?>
							</p>							
							<a href="index.php?action=confirmDeleteComment&id=<?= htmlspecialchars($data['id']); ?>" class="button" id="deleteComment">Supprimer</a>
						</div>
				<?php
					}	
				?>
			</section>
		</main>

		<footer>
			<?php include("public/footer.php");?>
		</footer>
	</body>
</html>	