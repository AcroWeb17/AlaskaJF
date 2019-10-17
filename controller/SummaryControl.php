<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Summary;

class SummaryControl {

	public function summaryDetail()
	{
		$summaryManager = new Summary();
		$summary = $summaryManager->getContentSummary(1);
		require('view/ViewBackEnd/summaryAdminView.php');
	}

	public function updateSummary($content)
	{
		$summaryModify = new Summary();
		$summaryMo = $summaryModify->modifSummary($content);
		if ($summaryMo === false){
			throw new Exception('Impossible d\'effectuer la mise à jour!');		
		}
		else{
			header('Location: index.php');	
		}
	}
}