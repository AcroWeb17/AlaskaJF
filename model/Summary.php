<?php
namespace AlaskaJF\model;
class Summary extends DataBase
{
	private $_id,
			$_content;

	public function getContentSummary()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, content FROM summary WHERE id="1"');
		$req->execute(array());
		$txtSummary = $req->fetch();
		return $txtSummary;
	}

	public function modifSummary($content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE summary SET content=? WHERE id =1');
		$majSummary =$req->execute(array($content));
		return $majSummary;
	}
}
