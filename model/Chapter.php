<?php
namespace AlaskaJF\model;
class Chapter extends DataBase
{
	private $_id,
			$_numChapter,
			$_title,
			$_texte,
			$_dateCreate;

	//afficher la liste des chapitres
	public function getListChapters()
	{
		$db = $this->dbConnect();
		//on récupère les derniers chapitres
		$listChapter = $db->query('SELECT id, numChapter, title, texte FROM chapter');
		return $listChapter;
	}

	//afficher le détail d'un chapitre
	public function getContentChapter($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, numChapter, title, texte FROM chapter WHERE id =?');
		$req->execute(array($id));
		$contentChapter = $req->fetch();
		return $contentChapter;
	}

	//ajoute un nouveau chapitre dans la base
	public function postChapter($chapterNum, $titleChap, $txtChap)
	{
		$db = $this->dbConnect();
		$chap= $db->prepare('INSERT INTO chapter(numChapter, title, texte, dateCreate) VALUES(?,?,?,NOW())');
		$newChapter = $chap->execute(array($chapterNum, $titleChap,$txtChap));
		return $newChapter;
	}

	//modifie le contenu d'un chapitre
	public function modifChapter($id, $chapterNum, $titleChap, $txtChap)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE chapter SET numChapter= "'.$chapterNum.'", title= "'.$titleChap.'", texte= "'.$txtChap.'" WHERE id = ?');
		$chapMaj = $req->execute(array($id));
		return $chapMaj;
	}

	//suppression d'un chapitre
	public function suppChapter($id, $chapterNum, $titleChap, $txtChap)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM chapter WHERE id = ?');
		$chapDelete = $req->execute(array($id));
		return $chapDelete;
	}
}