<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Chapter;

class ChapterAdminControl
{
	public function addChapter($chapterNum, $titleChap, $txtChap)
	{
		$chapterManager = new Chapter();
		$newChapter = $chapterManager->postChapter($chapterNum, $titleChap,$txtChap);
		if ($newChapter === false){
			throw new Exception('Impossible d\'ajouter le chapitre!');		
		}
		else {
			header('Location: index.php?action=listChapter');
		}
	}

	public function updateChapter($id, $chapterNum, $titleChap, $txtChap)
	{	
		$chapterModify = new Chapter();
		$chapMo = $chapterModify->modifChapter($id, $chapterNum, $titleChap, $txtChap);
		if ($chapMo === false){
			throw new Exception('Impossible d\'effectuer la mise à jour!');		
		}
		else {
			header('Location: view/ViewBackEnd/modifView.php');	
		}
	}

	public function verifDeleteChap($id,$chapterNum, $titleChap, $txtChap)
	{
		$chapterManager = new Chapter();
		$chap= $chapterManager->getContentChapter($_GET['id']);//récupère le number_chapter dans l'url
		require('view/ViewBackEnd/deleteChapView.php');
	}

	public function deleteChapter($id, $chapterNum, $titleChap, $txtChap)
	{	
		$chapterDelete = new Chapter();
		$chapMo = $chapterDelete->suppChapter($id, $chapterNum, $titleChap, $txtChap);
		if ($chapMo === false){
			throw new Exception('Impossible de supprimer ce chapitre!');		
		}
		else {
			header('Location: view/ViewBackEnd/confirmDeleteChapView.php');	
		}
	}


}



