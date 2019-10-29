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
		$comments = $db->prepare('SELECT id, numChapter,author, comment,dateComment,alert FROM comments WHERE numChapter=?');
		$comments->execute(array($id));
		return $comments;
	}

	//afficher la liste des commentaires
	public function getListComments()
	{
		$db = $this->dbConnect();
		$listComments = $db->query('SELECT id, numChapter,author, comment,dateComment,alert FROM comments');
		return $listComments;
	}

	//affichage des commentaires dans un chapitre
	public function getContentComment($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, numChapter,author, comment,dateComment FROM comments WHERE id=?');
		$req->execute(array($id));
		$comments=$req->fetch();
		return $comments;
	}

	//ajout d'un commentaire en base
	public function postComment($chapterNum, $author,$comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(numChapter, author, comment, dateComment) VALUES(?,?,?,NOW())');
		$affectedLines = $comments->execute(array($chapterNum,$author,$comment));
		return $affectedLines;
	}

	//suppression d'un commentaire
	public function suppComment($id, $chapterNum, $authorComment, $txtComment)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id = ?');
		$comDelete = $req->execute(array($id));
		return $comDelete;
	}

	//alerte sur un commentaire
	public function updateComment($id,$alertComment)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET alert="1" WHERE id = ?');
		$comAlert = $req->execute(array($id));
		return $comAlert;
	}
	
}