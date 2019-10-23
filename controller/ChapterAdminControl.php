<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Chapter;

class ChapterAdminControl
{
	public function addChapter($chapterNum, $titleChap, $txtChap)
	{
		if(!empty($_POST) && !empty($_POST['numChapter'])){
			$chapterNumo = new Chapter();
			$chapterVerif = $chapterNumo->chapterVerif($chapterNum);
			var_dump($chapterVerif);
			if($chapterVerif==="0"){
				var_dump($chapterNum, $titleChap, $txtChap);
				$chapterManager = new Chapter();
				$newChapter = $chapterManager->postChapter($chapterNum, $titleChap, $txtChap);
				if ($newChapter === false){
					throw new Exception('Impossible d\'ajouter le chapitre!');		
				}
				else {
					header('Location: index.php?action=listChapter');
				}
			}
			else
			{
				var_dump('chapitre deja écrit');
			}
		} 
		else{
			throw new Exception('Numéro de chapitre non conforme!');	
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
			header('Location: index.php?action=confirmDeleteChapter');	
		}
	}


}



