<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Biography;

class BiographyControl
{
	//affichage du détail de la biographie
	public function biographyDetail()
	{
		$biographyManager = new Biography();
		$biography = $biographyManager->getContentBiography(1);
		require('view/ViewBackEnd/biographyAdminView.php');
	}

	//mise à jour de la biographie
	public function updateBiography($content)
	{
		$biographyModify = new Biography();
		$biographyMo = $biographyModify->modifBiography($content);
		if ($sbiographyMo === false){
			throw new \Exception('Impossible d\'effectuer la mise à jour!');		
		}
		else {
			header('Location: accueil');
			exit();	
		}
	}

}