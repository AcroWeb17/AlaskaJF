<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\DataBase;

class ConnectControl extends DataBase
{
	public function connect()
	{
		require('view/ViewFrontEnd/loginView.php');
	}

	public function deconnect()
	{
		session_destroy();
		header('Location: view/ViewFrontEnd/deconnectView.php');
	}

	public function interfaceAdmin()
	{
		if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password'])){
			$db = $this->dbConnect();
			$req = $db->prepare('SELECT * FROM users WHERE login = :login');
			$req->execute(['login'=> $_POST['login']]);
			$user = $req->fetch();
			if ($_POST['password'] === 'Alaska'){
			//if(password_verify($_POST['password'],$user->$password)){
				$_SESSION['auth'] = $user;
				header('Location: index.php');
				exit();
			}
			else {
				$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
			}
		}

		else {
			header('Location: index.php');
			//? >
			//	<p id=erreurMdP>Mot de passe incorrect</p>
			//	<div id="connexionErreur">
			//		<a href=index.php>Connexion</a>

			//	</div>)
		}
	}
}
