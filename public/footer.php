<!--Ajout des contacts et mentions légales-->
<div class="contacts">
	<p class="mail" id="mentionsLegales"><a href="mentions_legales.html" class="mentionslegales" title="Mentions légales"> Mentions légales </a></p>
	<p class="mail" id="mailContact">Contacts: acroweb@orange.fr</p>
</div>
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
