<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Comments;

class CommentsControl
{
	//ajout d'un commentaire
	public function addComment($chapterNum, $author,$comment)
	{
		$commentManager = new Comments();
		$affectedLines = $commentManager->postComment($chapterNum, $author, $comment);
		if ($affectedLines === false){
			throw new \Exception('Impossible d\'ajouter le commentaire!');		
		}
		else {
			header('Location: chapitre-' . $chapterNum);
			exit();
		}
	}

}
	


