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
		$listChapter = $db->query('SELECT idChapter, numChapter, title, texte FROM chapter ORDER BY numChapter ASC');
		return $listChapter;
	}

	//afficher le détail d'un chapitre
	public function getContentChapter($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT idChapter, numChapter, title, texte FROM chapter WHERE idChapter =?');
		$req->execute(array($id));
		$contentChapter = $req->fetch();
		return $contentChapter;
	}

	//verifie si le numero de chapitre est existant
	public function chapterVerif($chapterNum)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT COUNT(numChapter) AS cnt FROM chapter WHERE numChapter=?');
		$req->execute(array($_POST['numChapter']));
		$chapterNumVerif = $req->fetch();
		$chapCount = $chapterNumVerif['cnt'];
		return $chapCount;
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
		$req = $db->prepare('UPDATE chapter SET numChapter= "'.$chapterNum.'", title= "'.$titleChap.'", texte= "'.$txtChap.'" WHERE idChapter = ?');
		$chapMaj = $req->execute(array($id));
		return $chapMaj;
	}

	//suppression d'un chapitre
	public function suppChapter($id, $chapterNum, $titleChap, $txtChap)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE t1, t2 FROM chapter t1 JOIN comments t2 ON t2.idChapter=t1.idChapter  WHERE t1.idChapter = ? ');
		$chapDelete = $req->execute(array($id));
		var_dump($id);
		return $chapDelete;
	}
}