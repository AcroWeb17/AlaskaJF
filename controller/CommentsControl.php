<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Comments;


class CommentsControl
{
	function addComment($chapterNum, $author,$comment)
	{
		$commentManager = new Comments();

		$affectedLines = $commentManager->postComment($chapterNum, $author, $comment);

		if ($affectedLines === false){
			throw new Exception('Impossible d\'ajouter le commentaire!');		
		}
		else{
			//header('Location: index.php?action=post&id=' . $postId);
			header('Location: index.php?action=listChapter');
		
		}
	}
}
	


