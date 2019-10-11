<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Chapter;
use AlaskaJF\model\Comments;

class ChapterControl {

	function listChapter()
	{
		$chapterManager = new Chapter();
		$listChap = $chapterManager-> getListChapters(); //appel d'une fonction d'un objet
		require('view/ViewFrontEnd/listChapterView.php');
	}

	function chapterDetail()
	{
		$chapterManager = new Chapter();
		$commentManager = new Comments();

		$chap= $chapterManager->getContentChapter($_GET['numChapter']);//récupère le number_chapter dans l'url
		$comments = $commentManager->getComment($_GET['numChapter']);

		require('view/ViewFrontEnd/chapterView.php');
	}

}

	
