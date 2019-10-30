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
				<a class="editButton" id="adminComments" href="gestion-commentaires">Gestion des commentaires</a>
				<a class="editButton" id="newChapter" href="nouveau-chapitre">Nouveau Chapitre</a>
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
							<a class="lienChapitre" href="chapitre-<?= htmlspecialchars($data['numChapter']); ?>">
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
									<a class="editButton" id="editChap" href="administration-chapitre-<?= htmlspecialchars($data['numChapter']); ?>">Mise à jour</a>
									<a class="editButton" id="deleteChap" href="suppression-chapitre-<?= htmlspecialchars($data['numChapter']); ?>">Supprimer</a>
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
				<a href="accueil"> Accueil</a>
			</div>
		</footer>

	</body>
</html>