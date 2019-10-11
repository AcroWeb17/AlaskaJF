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
		$listChapter = $db->query('SELECT numChapter, title, texte FROM episodes');

		return $listChapter;
	}


	//afficher le détail d'un chapitre
	public function getContentChapter($chapterNum)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT numChapter, title, texte FROM episodes WHERE numChapter = ?');
		$req->execute(array($chapterNum));
		$contentChapter = $req->fetch();

		return $contentChapter;
	}



	//hydratation
	public function hydrate(array $data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if(method_exists($this,$method))
			{
				$this->$method($value);
			}
		}
	}

	//getters
	public function id() { return $this->_id; }
	public function numChapter() { return $this->_numChapter; }
	public function title() { return $this->_title;	}
	public function texte()	{ return $this->_texte;	}
	public function dateCreate() { return $this->_dateCreate; }


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

	public function setTitle($title)
	{
		if (is_string($title))
		{
			$this->_title = $title;
		}
	}

	public function setTexte($texte)
	{
		if (is_string($texte))
		{
			$this->_texte = $texte;
		}
	}






}