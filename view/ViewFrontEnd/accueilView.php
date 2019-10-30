<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Accueil - Billet simple pour l'Alaska</title>
		<link rel="shortcut icon" href="public/Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>

	<body>
		<!--En tête-->
		<header>
			<?php include("public/bandeau.php");?>
			<?php
				if (isset($_SESSION['auth'])){
			?>		
					<div id="identification">
						<h4> Bienvenue Jean Forteroche </h4>
						<a id="changeMdP" href="changement-mot-de-passe" alt="Password" title="Modifier le mot de passe"><i class="fas fa-key"></i></a>
					</div>
			<?php
				}
			?>
		</header>

		<!--Corps de page-->
		<main>
			<!--Biographie-->
			<section id="biographie">
				<img id="logo" src="public/Illustrations/logo.png" alt="Logo" title="Logo"/>
				<article id="biographyTxt">
					<p>	<?= html_entity_decode($bio['content']) ?></p> 
					<?php
						if (isset($_SESSION['auth'])){
					?>	
							<a class="editButton" id="editBiographyAccueil" href="biographie">Mise à jour</a>
					<?php
						}
					?>
				</article>
			</section>

			<!--Couverture-->
			<section id="couverture">
				<div id="couv">
					<img id="imgBook" src="public/Illustrations/couverture.png" alt="Couverture du nouveau livre" title="Nouveau livre"/>
				</div>
				<article id="resumeTxt">
					<p>	<?= html_entity_decode($summary['content']) ?></p> 
					<div>
						<a id="accesBlog" href="chapitres"><i class="fas fa-book-open"></i></a>
					</div>
					<?php
						if (isset($_SESSION['auth'])){
					?>		
							<a class="editButton" id="editResume" href="resume">Mise à jour</a>
					<?php
						}
					?>
				</article>
			</section>
		</main>

		<!--Pied de page-->
		<footer>
			<?php include("public/footer.php");?>
			<div id="connexion" class="button">
				<?php
					if (isset($_SESSION['auth'])){
				?>	
						<a href="deconnexion"> Deconnexion</a>
				<?php
					} else {
				?>
						<a href="connexion"> Connexion</a>
				<?php
					}
				?>
			</div>
		</footer>
		
	</body>
</html>