<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\ChapterAdmin;
use AlaskaJF\model\Chapter;

class ChapterAdminControl
{
	function addChapter($chapterNum, $titleChap,$txtChap)
	{
		$chapterManager = new ChapterAdmin();//A mettre dans Chapter

		$chapterNew = $chapterManager->postChapter($chapterNum, $titleChap,$txtChap);

		if ($chapterNew === false){
			throw new Exception('Impossible d\'ajouter le chapitre!');		
		}
		else{
			//header('Location: index.php?action=post&id=' . $postId);
			header('Location: index.php?action=interfaceAdmin');
		
		}
	}

	function tabChapter()
	{
		$chapterManager = new Chapter();
		$listChap = $chapterManager-> getListChapters();
		require ('view/ViewBackEnd/chapterAdminView.php');
	}
}



