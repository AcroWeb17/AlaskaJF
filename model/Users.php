<?php
namespace AlaskaJF\model;
class Users extends DataBase
{
	private $_id,
			$_login,
			$_password;

	//modifie le mot de passe
	public function modifPassword($login,$newPassword)
	{
		$db = $this->dbConnect();
		$passwordHach = password_hash($newPassword,PASSWORD_DEFAULT);
		$req = $db->prepare('UPDATE users SET password= "'.$passwordHach.'" WHERE login = "'.$login.'"');
		$passwordMaj = $req->execute(array($login));
		return $passwordMaj;
	}

	//vérification du login et du mdp avant connexion
	public function passwordVerif()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT login, password FROM users WHERE login = :login');
		$req->execute(['login'=> $_POST['login']]);
		$user = $req->fetch();
		$passwordExact = password_verify($_POST['password'],$user['password']);
		return $passwordExact;
	}

}