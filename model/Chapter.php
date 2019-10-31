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
		$listChapter = $db->query('SELECT idChapter, numChapter, title, texte FROM chapter ORDER BY numChapter ASC');
		return $listChapter;
	}

	//afficher le détail d'un chapitre
	public function getContentChapter($numChapter)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT idChapter, numChapter, title, texte FROM chapter WHERE numChapter =?');
		$req->execute(array($numChapter));
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
	public function modifChapter($chapterNum, $titleChap, $txtChap)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE chapter SET numChapter= ?, title= ?, texte= ? WHERE numChapter = ?');
		$chapMaj = $req->execute(array($chapterNum, $titleChap, $txtChap, $chapterNum));
		return $chapMaj;
	}

	//suppression d'un chapitre avec commentaire
	public function suppChapter($chapterNum, $titleChap, $txtChap)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE t1, t2 FROM chapter t1 LEFT JOIN comments t2 ON t2.numChapter=t1.numChapter  WHERE t1.numChapter = ? ');
		$chapComDelete = $req->execute(array($chapterNum));
		return $chapComDelete;
	}

}