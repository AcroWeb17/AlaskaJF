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
	public function getComment($chapterNum)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT numChapter,author, comment FROM comments WHERE numChapter =?');
		$req->execute(array($chapterNum));
		$comment = $req->fetch();

		return $comment;
	}

	//ajout d'un commentaire en base
	public function postComment($chapterNum, $author,$comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(numChapter, author, comment, dateComment) VALUES(?,?,?,NOW())');
		$affectedLines = $comments->execute(array($chapterNum,$author,$comment));

		return $affectedLines;
	}


	//getters
	public function id() { return $this->_id; }
	public function numChapter() { return $this->_numChapter; }
	public function author() { return $this->_author; }
	public function comment() { return $this->_comment; }
	public function dateComment() { return $this->_dateComment; }

	//setters	
	public function setId($id)
	{
		$id = (int) $id;
		if ($id>0)
		{
			$this ->_id = $id;
		}
	}

	public function setNumChapter($numChapter)
	{
		$numChapter = (int) $numChapter;
		if ($numChapter>0) 
		{
			$this ->_numChapter = $numChapter;
		}
	}

	public function setAuthor($author)
	{
		if (is_string($author))
		{
			$this->_author = $author;
		}
	}

	public function setComment($comment)
	{
		if (is_string($comment))
		{
			$this->_comment = $comment;
		}
	}


}