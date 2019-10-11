<?php
session_start();
require('autoloader.php');
Autoloader::register();
use AlaskaJF\controller\ChapterControl;
use AlaskaJF\controller\CommentsControl;
use AlaskaJF\controller\ConnectControl;
use AlaskaJF\controller\Exception;
use AlaskaJF\controller\ChapterAdminControl;
use AlaskaJF\controller\CommentsAdminControl;


try{

	if(isset($_GET['action'])){
		//affichage de la liste des chapitres
		if ($_GET['action'] == 'listChapter'){
			$chapControl = new ChapterControl;
			$listeChap = $chapControl->listChapter();
			
		}

		//affichage d'un chapitre en particulier
		else if ($_GET['action'] == 'chapter'){
			if(isset($_GET['numChapter']) && $_GET['numChapter']>0 && $_GET['numChapter']<=10){
				$chapControl = new ChapterControl();
				$chapDetail = $chapControl->chapterDetail();
			}
			else if (isset($_GET['numChapter']) && $_GET['numChapter']<0 && $_GET['numChapter']>10 ){
				throw new Exception('paf');
			}
			else{
				throw new Exception('Aucun identifiant de chapitre envoyé');
			}
		}

		//rédaction d'un commentaire
		else if ($_GET['action'] == 'addComment'){
			if(isset($_GET['id']) && $_GET['id'] > 0){
				if (!empty($_POST['author']) && !empty($_POST['comment'])){
					$commentsNew = new CommentsControl();
					$comment = $commentsNew->addComment($_GET['id'],$_POST['author'],$_POST['comment']);
				}
				else{
					throw new Exception('Tous les champs ne sont pas remplis!');
				}
			}
			else{
				throw new Exception('Aucun identifiant de chapitre envoyé');
			}
		}

		//interface de connexion
		else if($_GET['action'] == 'connect'){
			$connectControl = new ConnectControl();
			$connect = $connectControl->connect();
		}

		//déconnexion
		else if($_GET['action'] == 'deconnect'){
			$connectControl = new ConnectControl();
			$connect = $connectControl->deconnect();
		}

		//authentification
		else if($_GET['action'] == 'interfaceAdmin'){
			$connectControl = new ConnectControl();
			$admin = $connectControl->interfaceAdmin();
		}


		// Déconnexion
        elseif ($_GET['action'] == 'logoutAction') {
            require 'view/ViewFrontEnd/logout.php';
        }






		else if ($_GET['action'] == 'listAdminChapter'){
			$chapterListAdmin = new ChapterAdminControl();
			$chapter = $chapterListAdmin->tabChapter();
		}

         



		//else if(isset($_SESSION) && !empty($_SESSION)){
			else if ($_GET['action'] == 'addChapter'){
				$chapterNum = isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']):NULL;
				$titleChap = isset($_POST['titleChap'])?htmlspecialchars($_POST['titleChap']):NULL;
				$txtChap = isset($_POST['txtChap'])?htmlspecialchars($_POST['txtChap']):NULL;
				//if(isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']) > 0){
					$chapterNew = new ChapterAdminControl();
					$chapter = $chapterNew->addChapter($chapterNum, $titleChap, $txtChap);
			}

		//}
			//if (!empty($_POST['title']) && !empty($_POST['texte']))else{
			//		throw new Exception('Tous les champs ne sont pas remplis!');
			//	}
			//else{
			//		throw new Exception('Aucun identifiant de chapitre envoyé');
			//}
		
	}

	//affichage de la page d'accueil
	else{
		require ('view/ViewFrontEnd/accueilView.php');
	}
}

catch(Exception $e){
	$errorMessage = $e->getMessage();
	require('view/ViewFrontEnd/errorView.php');
}
