<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Comments;

class CommentsAdminControl
{
	public function verifDeleteComment($id, $idChapter, $authorComment, $txtComment)
	{
		$commentManager = new Comments();
		$commentId= $commentManager->getContentComment($_GET['id']);
		require('view/ViewBackEnd/deleteCommentView.php');
	}

	public function deleteComment($id, $idChapter, $authorComment, $txtComment)
	{	
		$commentDelete = new Comments();
		$commentMo = $commentDelete->suppComment($id, $idChapter, $authorComment, $txtComment);
		if ($commentMo === false){
			throw new Exception('Impossible de supprimer ce chapitre!');		
		}
		else{
			header('Location: view/ViewBackEnd/confirmDeleteComView.php');	
		}
	}

	public function listComments()
	{
		$commentsManager = new Comments();
		$listComments = $commentsManager-> getListComments(); //appel d'une fonction d'un objet
		require('view/ViewBackEnd/commentsAdminView.php');
	}
}