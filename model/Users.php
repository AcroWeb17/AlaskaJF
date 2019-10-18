<?php
namespace AlaskaJF\model;
class Users extends DataBase
{
	private $_id,
			$_login,
			$_password;

	//modifie le mot de passe
	public function modifPassword($login,$password)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE users SET password= "'.$password.'" WHERE login = JForteroche');
		$passwordMaj = $req->execute(array($login));
		return $passwordMaj;
	}
}