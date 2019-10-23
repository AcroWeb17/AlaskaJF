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
		<header>
			<?php include("public/bandeau.php");?>
			<?php
				if (isset($_SESSION['auth'])){
			?>	
					<h4> Bienvenue Jean Forteroche </h4>
					<!--changer le logo pour modifier le mot de passe -->
					<a id="changeMdP" href="index.php?action=newPassword" alt="Password" title="Modifier le mot de passe"><i class="fas fa-key"></i></a>
			<?php
				}
			?>
		</header>

		<main>
			<section id="biographie">
				<img id="logo" src="public/Illustrations/logo.png" alt="Logo" title="Logo"/>
				<article id="biographyTxt">
					<?php
						$db = new PDO('mysql:host=localhost;dbname=alaska;charset=utf8','root','');
						$req = $db->query('SELECT id, content FROM biography');
						while($donnees = $req->fetch())
						{
							echo '<p>'.htmlspecialchars($donnees['content']).'</p>';
						}

					?>
				<?php
					if (isset($_SESSION['auth'])){
				?>	
					<a class="editButton" id="editBiographyAccueil" href="index.php?action=biography">Mise à jour</a>
				<?php
					}
				?>
				</article>
			</section>

			<section id="couverture">
				<img src="public/Illustrations/couverture.png" alt="Couverture du nouveau livre" title="Nouveau livre"/>
				<article id="resumeTxt">
					<?php
						$db = new PDO('mysql:host=localhost;dbname=alaska;charset=utf8','root','');
						$req = $db->query('SELECT id, content FROM summary');
						while($donnees = $req->fetch())
						{
							echo '<p>'.htmlspecialchars($donnees['content']).'</p>';
						}
					?>
					<div>
						<a id="accesBlog" href="index.php?action=listChapter"><i class="fas fa-book-open"></i></a>
					</div>
					<?php
						if (isset($_SESSION['auth'])){
					?>		
							<a class="editButton" id="editResume" href="index.php?action=summary">Mise à jour</a>
					<?php
						}
					?>
				</article>
			</section>
		</main>

		<footer>
			<?php include("public/footer.php");?>
			<div id="connexion" class="button">
				<?php
					if (isset($_SESSION['auth'])){
				?>	
						<a href="index.php?action=deconnect"> Deconnexion</a>
				<?php
					}
					else {
				?>
						<a href="index.php?action=connect"> Connexion</a>
				<?php
					}
				?>
			</div>
		</footer>
		
	</body>
</html>