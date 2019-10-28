<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Chapter;
use AlaskaJF\model\Comments;

class ChapterAdminControl
{
	//ajouter un chapitre
	public function addChapter($chapterNum, $titleChap, $txtChap)
	{
		if(!empty($_POST) && !empty($_POST['numChapter'])){
			$chapterNumo = new Chapter();
			$chapterVerif = $chapterNumo->chapterVerif($chapterNum);
			if($chapterVerif==="0"){
				$chapterManager = new Chapter();
				$newChapter = $chapterManager->postChapter($chapterNum, $titleChap, $txtChap);
				if ($newChapter === false){
					throw new Exception('Impossible d\'ajouter le chapitre!');		
				}
				else {
					header('Location: index.php?action=listChapter');
				}
			}
			else {
				header('chapitre deja écrit');
			}
		} 
		else {
			throw new Exception('Numéro de chapitre non conforme!');	
		}
	}

	//mise à jour d'un chapitre
	public function updateChapter($id, $chapterNum, $titleChap, $txtChap)
	{	
		$chapterModify = new Chapter();
		$chapMo = $chapterModify->modifChapter($id, $chapterNum, $titleChap, $txtChap);
		if ($chapMo === false){
			throw new Exception('Impossible d\'effectuer la mise à jour!');		
		}
		else {
			header('Location: index.php?action=confirmUpdateChapter');
		}
	}

	//vérification avant suppression d'un chapitre
	public function verifDeleteChap($id,$chapterNum, $titleChap, $txtChap)
	{
		$chapterManager = new Chapter();
		$chap= $chapterManager->getContentChapter($_GET['id']);//récupère le number_chapter dans l'url
		require('view/ViewBackEnd/deleteChapView.php');
	}

	//suppression d'un chapitre
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

	//affichage du détail d'un chapitre
	public function chapterDetailAdmin()
	{
		$chapterManager = new Chapter();
		$chap= $chapterManager->getContentChapter($_GET['id']);//récupère le number_chapter dans l'url
		require('view/ViewBackEnd/updateChapterView.php');
	}

}



