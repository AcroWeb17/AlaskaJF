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
use AlaskaJF\controller\SummaryControl;
use AlaskaJF\controller\BiographyControl;

try {

	if(isset($_GET['action'])){

		//affichage de la liste des chapitres
		if ($_GET['action'] == 'listChapter'){
			$chapControl = new ChapterControl;
			$listeChap = $chapControl->listChapter();
		}

		//affichage d'un chapitre en particulier
		else if ($_GET['action'] == 'chapter'){
			if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id']<=100){
				$chapControl = new ChapterControl();
				$chapDetail = $chapControl->chapterDetail();
			}
			else if (isset($_GET['id']) && $_GET['id']<0 && $_GET['id']>100 ){
				throw new Exception('paf');
			}
			else {
				throw new Exception('Aucun identifiant de chapitre envoyé');
			}
		}

		//création nouveau chapitre
		else if ($_GET['action'] == 'newChapter'){
			require 'view/ViewBackEnd/newChapterView.php';
		}

		//ajouter un chapitre
		else if ($_GET['action'] == 'addChapter'){
			$chapterNum = isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']):NULL;
			$titleChap = isset($_POST['titleChap'])?htmlspecialchars($_POST['titleChap']):NULL;
			$txtChap = isset($_POST['txtChap'])?htmlspecialchars($_POST['txtChap']):NULL;
			//if(isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']) > 0){
			$chapterNew = new ChapterAdminControl();
			$chapter = $chapterNew->addChapter($chapterNum, $titleChap, $txtChap);
		}

		//modifier un chapitre
		else if ($_GET['action'] == 'updateChapter'){
			if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id']<=100){
				$chapterNum = isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']):NULL;
				$titleChap = isset($_POST['title'])?htmlspecialchars($_POST['title']):NULL;
				$txtChap = isset($_POST['texte'])?htmlspecialchars($_POST['texte']):NULL;
				$chapControl = new ChapterAdminControl();
				$chapDetail = $chapControl->updateChapter($_GET['id'], $chapterNum, $titleChap, $txtChap);

			}
			else if (isset($_GET['id']) && $_GET['id']<0 && $_GET['id']>100 ){
				throw new Exception('paf');
			}
			else {
				throw new Exception('Aucun identifiant de chapitre envoyé');
			}
		}

		//confirmer la suppression d'un chapitre
		else if ($_GET['action'] == 'confirmDelete'){
			if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id']<=100){
				$chapterNum = isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']):NULL;
				$titleChap = isset($_POST['title'])?htmlspecialchars($_POST['title']):NULL;
				$txtChap = isset($_POST['texte'])?htmlspecialchars($_POST['texte']):NULL;
				$chapConfirm = new ChapterAdminControl();
				$chapIdConfirm = $chapConfirm ->verifDeleteChap($_GET['id'], $chapterNum, $titleChap, $txtChap);
			}
		}

		//supprimer un chapitre
		else if ($_GET['action'] == 'deleteChapter'){
			if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id']<=100){
				$chapterNum = isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']):NULL;
				$titleChap = isset($_POST['title'])?htmlspecialchars($_POST['title']):NULL;
				$txtChap = isset($_POST['texte'])?htmlspecialchars($_POST['texte']):NULL;
				$chapControl = new ChapterAdminControl();
				$chapDetail = $chapControl->deleteChapter($_GET['id'], $chapterNum, $titleChap, $txtChap);
			}
		}

		//rédaction d'un commentaire
		else if ($_GET['action'] == 'addComment'){
			if(isset($_GET['id']) && $_GET['id'] > 0){
				if (!empty($_POST['author']) && !empty($_POST['comment'])){
					$commentsNew = new CommentsControl();
					$comment = $commentsNew->addComment($_GET['id'],$_POST['author'],$_POST['comment']);
				}
				else {
					throw new Exception('Tous les champs ne sont pas remplis!');
				}
			}
			else {
				throw new Exception('Aucun identifiant de chapitre envoyé');
			}
		}

		//administration des commentaires
		else if ($_GET['action'] == 'adminComments'){
			$commentControl = new CommentsAdminControl;
			$listeComments = $commentControl->listComments();
		}

		//confirmer la suppression d'un commentaire
		else if ($_GET['action'] == 'confirmDeleteComment'){
			if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id']<=100){
				$idChapter = isset($_POST['idChapter'])?htmlspecialchars($_POST['idChapter']):NULL;
				$authorComment = isset($_POST['author'])?htmlspecialchars($_POST['author']):NULL;
				$txtComment = isset($_POST['comment'])?htmlspecialchars($_POST['comment']):NULL;
				$commentConfirm = new CommentsAdminControl();
				$commentIdConfirm = $commentConfirm ->verifDeleteComment($_GET['id'], $idChapter, $authorComment, $txtComment);
			}
		}

		//supprimer un commentaire
		else if ($_GET['action'] == 'deleteComment'){
			if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id']<=100){
				$idChapter = isset($_POST['idChapter'])?htmlspecialchars($_POST['idChapter']):NULL;
				$authorComment = isset($_POST['author'])?htmlspecialchars($_POST['author']):NULL;
				$txtComment = isset($_POST['comment'])?htmlspecialchars($_POST['comment']):NULL;
				$commentControl = new CommentsAdminControl();
				$commentDetail = $commentControl->deleteComment($_GET['id'], $idChapter, $authorComment, $txtComment);
			}
		}

		//mise à jour de la page d'accueil
		//modifier le résumé du livre
		else if ($_GET['action'] == 'summary'){
			$summaryControl = new SummaryControl();
			$summaryDetail = $summaryControl->SummaryDetail();
		}

		else if ($_GET['action'] == 'updateSummary'){
			$summaryContent = isset($_POST['content'])?htmlspecialchars($_POST['content']):NULL;
			$summaryControl = new SummaryControl();
			$summaryModif = $summaryControl->updateSummary($summaryContent);
		}

		//modifier la biographie de l'auteur
		else if ($_GET['action'] == 'biography'){
			$biographyControl = new BiographyControl();
			$biographyDetail = $biographyControl->biographyDetail();
		}

		else if ($_GET['action'] == 'updateBiography'){
			$biographyContent = isset($_POST['content'])?htmlspecialchars($_POST['content']):NULL;
			$biographyControl = new BiographyControl();
			$biographyModif = $biographyControl->updateBiography($biographyContent);
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

		//modification du mot de passe
		else if($_GET['action'] == 'newPassword'){
			require ('view/ViewBackEnd/newPassword.php');
		}

		//validation du nouveau mot de passe
		else if ($_GET['action'] == 'updateNewPassword'){
			
			$login = isset($_POST['login'])?htmlspecialchars($_POST['login']):NULL;
			$password = isset($_POST['password'])?htmlspecialchars($_POST['password']):NULL;
			$connectControl = new ConnectControl();
			$admin = $connectControl->updatePassword($login, $password);
		}
	}




	//affichage de la page d'accueil
	else {
		require  ('view/ViewFrontEnd/accueilView.php');
	}
}

catch(Exception $e){
	$errorMessage = $e->getMessage();
	require('view/ViewFrontEnd/errorView.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
	    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	    <script type="text/javascript" src="tinymce/parametresTinyMCE.js"></script>
	</head>
</html>