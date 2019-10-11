<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Accueil</title>
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
			<?php
				}
			?>
		</header>

		<main>
			<section id="biographie">
				<img id="logo" src="public/Illustrations/logo.png" alt="Logo" title="Logo"/>
				<p id="textPresentation">Obore dolessis am alit eum zzrit incipisi.
	Essendiam, sequam ing eliquam cortie te feu feugait, quisim illam, veliquam dit alit ip eugue dolortin vulputatinci tin henis autpat vel utatet nos et, sent iure ese dolesen dipsum dit aliquip ercincilla aut dolor ing ex essequat.
	Nullums andrer irit alit dunt aut in utatum enim iure veniscil do odit vulla conse vel iriurem eriusci nismolo rercipit ese vel dip essim eugait nostrud delit lum dit irit elenibh ea facinci esed molorper sit velisl ea facilla ndreetum venibh er alit nulla facin ulla feum delisit vent lum velesent velenim ip eugiam et, commy nullamcons nisit ut autpat, 
				</p>
				<?php
					if (isset($_SESSION['auth'])){
				?>	
						<p class="edit" id="editPresentation">
							Mise à jour
						</p>
				<?php
					}
				?>
			</section>

			<section id="couverture">
				<img src="public/Illustrations/couverture.png" alt="Couverture du nouveau livre" title="Nouveau livre"/>
				<article id="resumeBook">
					<p id="txtResume">
						sendiam, sequam ing eliquam cortie te feu feugait, quisim illam, veliquam dit alit ip eugue dolortin vulputatinci tin henis autpat vel utatet nos et, sent iure ese dolesen dipsum dit aliquip ercincilla aut dolor ing ex essequat.
						Nullums andrer irit alit dunt aut in utatum enim iure veniscil do odit vulla conse vel iriurem eriusci nismolo rercipit ese vel dip essim eugait nostrud delit lum dit irit elenibh ea facinci esed molorper sit velisl ea facilla ndreetum venibh er alit nulla facin ulla feum delisit vent lum velesent velenim ip eugiam et, commy nullamcons nisit ut autpat, sisim dunt venismod mincidunt duis ad magna corem eu feum volenisi eugue min velisi eu facidunt at. Orem ip eraessis nulput praesse te feuis nonummy nim zzrilissenit augue etum nummod tem dolore faccum dipis eugait velessi tie d 
					</p>
					<div>
						<a id="accesBlog" href="index.php?action=listChapter"><i class="fas fa-book-open"></i></a>
					</div>
					<?php
						if (isset($_SESSION['auth'])){
					?>		<p class="edit" id="editResume">
								Mise à jour
							</p>
					<?php
						}
					?>
				</article>

					
				
			</section>


		</main>
		<footer>
			<?php include("public/footer.php");?>
		</footer>
	</body>
	</html>