<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Chapter;
use AlaskaJF\model\Comments;

class ChapterControl {

	public function listChapter()
	{
		$chapterManager = new Chapter();
		$listChap = $chapterManager-> getListChapters(); //appel d'une fonction d'un objet
		require('view/ViewFrontEnd/listChapterView.php');
	}

	public function chapterDetail()
	{
		$chapterManager = new Chapter();
		$commentManager = new Comments();
		$chap= $chapterManager->getContentChapter($_GET['id']);//récupère le number_chapter dans l'url
		$comments = $commentManager->getComment($_GET['id']);
		require('view/ViewFrontEnd/chapterView.php');
	}

}

	
