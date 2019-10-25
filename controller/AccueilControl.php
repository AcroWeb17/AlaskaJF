<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Biography;
use AlaskaJF\model\Summary;

class AccueilControl {

	public function accueilDetail()
	{
		$biographyManager = new Biography();
		$summaryManager = new Summary();
		$bio= $biographyManager->getContentBiography();
		$summary = $summaryManager->getContentSummary();
		require('view/ViewFrontEnd/accueilView.php');
	}

}