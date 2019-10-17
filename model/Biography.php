<?php
namespace AlaskaJF\model;
class Biography extends DataBase
{
	private $_id,
			$_content;

	public function getContentBiography($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, content FROM biography WHERE id="1"');
		$req->execute(array($id));
		$txtBiography = $req->fetch();
		return $txtBiography;
	}

	public function modifBiography($content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE biography SET content="'.$content.'" WHERE id =1');
		$majBiography =$req->execute(array($id));
		return $majBiography;
	}
}
