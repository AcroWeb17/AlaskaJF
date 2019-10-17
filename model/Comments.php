<?php
namespace AlaskaJF\model;
class Comments extends DataBase
{
	private $_id,
			$_numChapter,
			$_author,
			$_comment,
			$_dateComment;

	//affichage d'un commentaire
	public function getComment($id)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, idChapter,author, comment,dateComment FROM comments WHERE idChapter=?');
		$comments->execute(array($id));
		return $comments;
	}

	//afficher la liste des commentaires
	public function getListComments()
	{
		$db = $this->dbConnect();
		//on récupère les derniers chapitres
		$listComments = $db->query('SELECT id, idChapter,author, comment,dateComment FROM comments');
		return $listComments;
	}

	public function getContentComment($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, idChapter,author, comment,dateComment FROM comments WHERE id=?');
		$req->execute(array($id));
		$comments=$req->fetch();
		return $comments;
	}

	//ajout d'un commentaire en base
	public function postComment($chapterId, $author,$comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(idChapter, author, comment, dateComment) VALUES(?,?,?,NOW())');
		$affectedLines = $comments->execute(array($chapterId,$author,$comment));
		return $affectedLines;
	}

	//suppression d'un commentaire
	public function suppComment($id, $idChapter, $authorComment, $txtComment)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id = ?');
		$comDelete = $req->execute(array($id));
		return $comDelete;
	}
}