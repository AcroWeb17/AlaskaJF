<?php
namespace AlaskaJF\model;
class ChapterAdmin extends DataBase
{
	private $_id,
			$_numChapter,
			$_title,
			$_texte,
			$_dateCreate;

	public function postChapter($chapterNum, $titleChap,$txtChap)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO episodes(numChapter, title, texte, dateCreate) VALUES(?,?,?,NOW())');
		$addChapter = $req->execute(array($chapterNum, $titleChap,$txtChap));

		return $addChapter;
	}

	public function deleteChapter ($chapterNum)
	{
		$db = $this->dbConnect();
		$req = $db->exec('DELETE * FROM episodes WHERE numChapter = ?');
	}

	public function updateChapter ($chapterNum)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE numChapter, title, texte FROM episodes WHERE numChapter = ?');
		$req->execute(array($chapterNum));
		$updateChapter = $req->fetch();

		return $updateChapter;

	}
}