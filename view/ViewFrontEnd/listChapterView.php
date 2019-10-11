<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/Alaska.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>
	
	<body>
		<!--En-tête-->
		<header>
			<?php include("public/bandeau.php");?>
		</header>

		<main>
			<section id="chapitres">
				<?php
				//on affiche le contenu
					while($data = $listChap->fetch())
					{
				?>
						<div class="episodes">
							<a class="lienChapitre" href="index.php?action=chapter&&numChapter=<?= htmlspecialchars($data['numChapter']); ?>">
								<h2>
									CHAPITRE
									<?= htmlspecialchars($data['numChapter']); ?>
								</h2>
								<h3 id="decoTitre">
									<?= htmlspecialchars($data['title']); ?>
								</h3>
								<p class="txtEpisodes">
									<?= nl2br(htmlspecialchars($data['texte'])); ?>
								</p>
								<p class="suiteEpisode">
									<i class="fas fa-ellipsis-h"></i>
								</p>

								<?php
									if (isset($_SESSION['auth'])) {
								?>
									<p class="edit" id="editChap">
										Mise à jour
									</p>
									<p class="edit" id="deleteChap">
										Supprimer
									</p>
								<?php
									}
								?>

							</a>
						</div>
				<?php
					}	
				?>
			</section>
		</main>

		<footer>
			<?php include("public/footer.php");?>
			<div class="retourAccueil button" id="accueilAlaska">
				<a href=index.php> Accueil</a>
			</div>
		</footer>

	</body>
</html>