<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\DataBase;
use AlaskaJF\model\Users;

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
			$passwordConnect = new Users();
			$passwordCo = $passwordConnect->modifPassword($login,$password);
			if($passwordCo){
				$_SESSION['auth'] = $passwordCo;
				header('Location: index.php');
				exit();
			}
			else {
				echo "echec";
			}
			
		}
		else
		{
			echo 'mauvais nom d utilisateur';
		}
	
	}


	public function updatePassword($login,$password)
	{	
		$passwordModify = new Users();
		$passwordMo = $passwordModify->modifPassword($login,$password);
		if ($passwordMo === false){
			throw new Exception('Impossible d\'effectuer la mise à jour!');		
		}
		else {
			header('Location: view/ViewBackEnd/modifPasswordView.php');	
		}
	}
		
}
