<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>Interface d'administration</title>
		<link rel="shortcut icon" href="Illustrations/favicon.ico"/>
		<link rel="stylesheet" href="public/alaska.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	</head>

	<body>
		<header>
			<?php include("public/bandeau.php");?>
		</header>

		<main>
			<section>
			<?php
				while($data = $listChap->fetch())
				{
			?>
					<table id="adminChapitre">
						<thead>
							<tr>
								<th> Chapitre </th>
								<th> Titre </th>
								<th> Texte </th>
								<th> </th>
								<th> </th>
								<th> </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?= htmlspecialchars($data['numChapter']); ?>
							</tr>
							<tr>
								<?= htmlspecialchars($data['title']); ?>
							</tr>
							<tr>
								<?= nl2br(htmlspecialchars($data['texte'])); ?>
							</tr>
						</tbody>

						
					</table>
			<?php
				}
			?>
			</section>

			<form id="newChapitre" action="index.php?action=addChapter" method="post">
				<div>
					<label for="numChapter">Numéro du chapitre</label><br/>
					<input type="number" id="numChapterAdmin" name="numChapter" />
				</div>
				<div>
					<label for="titleChap">Titre du chapitre</label><br/>
					<input type="text" id="titleChapAdmin" name="titleChap"/>
				</div>
				<div>
					<label for="txtChap">Chapitre</label><br/>
					<textarea id="txtChapAdmin" name="txtChap"></textarea>
				</div>
				<div>
					<input type="submit"/>
				</div>

			</form>
			
		</main>
	</body>
</html>