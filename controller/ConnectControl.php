<?php
namespace AlaskaJF\controller;
use AlaskaJF\model\Users;

class ConnectControl
{
	//interface de connexion
	public function connect()
	{
		require('view/ViewFrontEnd/loginView.php');
	}

	//interface de déconnexion
	public function deconnect()
	{
		session_destroy();
		header('Location: view/ViewFrontEnd/deconnectView.php');
	}

	//vérification du login et mdp pour connexion
	public function interfaceAdmin($login,$password)
	{
		if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password'])){
			$passwordConnect = new Users();
			$passwordCo = $passwordConnect->passwordVerif($login,$password);
			if($passwordCo){
				echo "succes";
				$_SESSION['auth'] = $passwordCo;
				exit();
			}
			else {
				echo "echec";
			}
		}
		else {
			echo 'mauvais nom d utilisateur';
		}
	}

	//modification du mot de passe
	public function updatePassword($login, $password, $newPassword)
	{	
		if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password'])){
			$passwordConnect = new Users();
			$passwordCo = $passwordConnect->passwordVerif($login,$password);
			if($passwordCo){
				if (($_POST['newPassword'])===($_POST['confirmNewPassword'])){
					$passwordModify = new Users();
					$passwordMo = $passwordModify->modifPassword($login, $newPassword);
						if ($passwordMo === false){
							throw new Exception('Impossible d\'effectuer la mise à jour!');		
						}
						else {
							echo "succes";
							exit();
						}
				}
				else {
					echo 'les nouveaux mots de passe ne sont pas identiques';
				}
			}
			else {
				echo 'mauvais nom d utilisateur ou de mot de passe';
			}
		}
		else {
			echo 'Nom d\'utilisateur ou mot de passe incorrect';
		}
	}
		
}
