<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Liste des chapitres - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>
	
	<body>
		<!--En-tête-->
		<header>
			<?php include("public/bandeau.php");?>
			<?php
				if (isset($_SESSION['auth'])) {
			?>
				<a class="editButton" id="adminComments" href="index.php?action=adminComments">Gestion des commentaires</a>
				<a class="editButton" id="newChapter" href="index.php?action=newChapter">Nouveau Chapitre</a>
			<?php
				}
			?>
		</header>

		<!--Corps de page-->
		<main>
			<section id="chapitres">
				<?php
				//Affichage des chapitres
					while($data = $listChap->fetch())
					{
				?>
						<article class="episodes" id=articleChap>
							<a class="lienChapitre" href="index.php?action=chapter&id=<?= htmlspecialchars($data['idChapter']); ?>">
								<h2 id="decoChap">
									CHAPITRE
									<?= htmlspecialchars($data['numChapter']); ?>
								</h2>
								<h3 id="decoTitre">
									<?= htmlspecialchars($data['title']); ?>
								</h3>
								<p class="txtEpisodes">
									<?= html_entity_decode($data['texte']); ?>
								</p>
								<p class="suiteEpisode">
									<i class="fas fa-ellipsis-h"></i>
								</p>
							</a>
							<!--En mode Admin-->
							<?php
								if (isset($_SESSION['auth'])) {
							?>
									<a class="editButton" id="editChap" href="index.php?action=chapterAdmin&id=<?= htmlspecialchars($data['idChapter']); ?>">Mise à jour</a>
									<a class="editButton" id="deleteChap" href="index.php?action=confirmDelete&id=<?= htmlspecialchars($data['idChapter']); ?>">Supprimer</a>
							<?php
								}
							?>
						</article>
				<?php
					}	
				?>
			</section>
		</main>

		<!--Pied de page-->
		<footer>
			<?php include("public/footer.php");?>
			<div class="button" id="accueilAlaska">
				<a href="index.php"> Accueil</a>
			</div>
		</footer>

	</body>
</html>