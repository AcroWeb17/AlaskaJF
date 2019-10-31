<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Comments;

class CommentsAdminControl
{
	//vérification de la suppression d'un commentaire
	public function verifDeleteComment($id, $idChapter, $authorComment, $txtComment)
	{
		$commentManager = new Comments();
		$commentId= $commentManager->getContentComment($_GET['id']);
		require('view/ViewBackEnd/deleteCommentView.php');
	}

	//suppression d'un commentaire
	public function deleteComment($id, $idChapter, $authorComment, $txtComment)
	{	
		$commentDelete = new Comments();
		$commentMo = $commentDelete->suppComment($id, $idChapter, $authorComment, $txtComment);
		if ($commentMo === false){
			throw new \Exception('Impossible de supprimer ce commentaire');		
		}
		else {
			header('Location: confirmation-suppression-commentaire');
			exit();	
		}
	}

	//affichage de la liste des commentaires
	public function listComments()
	{
		$commentsManager = new Comments();
		$listComments = $commentsManager-> getListComments(); 
		require('view/ViewBackEnd/commentsAdminView.php');
	}

	//alerte sur un commentaire
	public function alertComment($id,$alertComment)
	{
		$commentsManager = new Comments();
		$alertComments = $commentsManager-> updateComment($id,$alertComment); //appel d'une fonction d'un objet
		require('view/ViewFrontEnd/signalCommentView.php');
	}
}