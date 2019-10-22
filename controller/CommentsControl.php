<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Comments;

class CommentsControl
{

	public function addComment($chapterId, $author,$comment)
	{
		$commentManager = new Comments();
		$affectedLines = $commentManager->postComment($chapterId, $author, $comment);
		if ($affectedLines === false){
			throw new Exception('Impossible d\'ajouter le commentaire!');		
		}
		else{
			header('Location: index.php?action=chapter&id=' . $chapterId);
		}
	}
}
	


