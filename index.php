<?php

// définition des controller
session_start();
require('autoloader.php');
Autoloader::register();
use AlaskaJF\controller\ChapterControl;
use AlaskaJF\controller\CommentsControl;
use AlaskaJF\controller\ConnectControl;
use AlaskaJF\controller\ChapterAdminControl;
use AlaskaJF\controller\CommentsAdminControl;
use AlaskaJF\controller\SummaryControl;
use AlaskaJF\controller\BiographyControl;
use AlaskaJF\controller\AccueilControl;

try {
	if(isset($_GET['action'])){
		//affichage de la liste des chapitres
		if ($_GET['action'] == 'listChapter'){
			$chapControl = new ChapterControl;
			$listeChap = $chapControl->listChapter();
		}

		//affichage d'un chapitre en particulier
		else if ($_GET['action'] == 'chapter'){
			if(isset($_GET['numChapter']) && $_GET['numChapter']>0 && $_GET['numChapter']<=100){
				$chapControl = new ChapterControl();
				$chapDetail = $chapControl->chapterDetail();
			}
			else if (isset($_GET['numChapter']) && $_GET['numChapter']<0 OR $_GET['numChapter']>100 ){
				throw new Exception('Numéro de chapitre non valide');
			}
			else {
				throw new Exception('Aucun identifiant de chapitre envoyé');
			}
		}

		//affichage d'un chapitre en particulier en mode Admin
		else if ($_GET['action'] == 'chapterAdmin'){
			if(isset($_GET['numChapter']) && $_GET['numChapter']>0 && $_GET['numChapter']<=100){
				$chapControl = new ChapterAdminControl();
				$chapDetail = $chapControl->chapterDetailAdmin();
			}
			else if (isset($_GET['numChapter']) && $_GET['numChapter']<0 OR $_GET['numChapter']>100 ){
				throw new Exception('Numéro de chapitre non valide');
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
			if(isset($_POST['numChapter']) && $_POST['numChapter']>0 && $_POST['numChapter']<=100){
				$chapterNum = isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']):NULL;
				$titleChap = isset($_POST['titleChap'])?htmlspecialchars($_POST['titleChap']):NULL;
				$txtChap = isset($_POST['txtChap'])?htmlspecialchars($_POST['txtChap']):NULL;
				$chapterNew = new ChapterAdminControl();
				$chapter = $chapterNew->addChapter($chapterNum, $titleChap, $txtChap);	
			}
			else {
				throw new Exception('Veuillez renseigner un numéro de chapitre valide');
			}
		}

		//modifier un chapitre
		else if ($_GET['action'] == 'updateChapter'){
			if(isset($_GET['numChapter']) && $_GET['numChapter']>0 && $_GET['numChapter']<=100){
				$chapterNum = isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']):NULL;
				$titleChap = isset($_POST['titleChap'])?htmlspecialchars($_POST['titleChap']):NULL;
				$txtChap = isset($_POST['texte'])?htmlspecialchars($_POST['texte']):NULL;
				$chapControl = new ChapterAdminControl();
				$chapDetail = $chapControl->updateChapter($_GET['numChapter'], $titleChap, $txtChap);
			}
			else if (isset($_GET['numChapter']) && $_GET['numChapter']<0 OR $_GET['numChapter']>100 ){
				throw new Exception('Numéro de chapitre non valide');
			}
			else {
				throw new Exception('Aucun identifiant de chapitre envoyé');
			}
		}

		//confirmation de la mise à jour d'un chapitre
		else if ($_GET['action'] == 'confirmUpdateChapter'){
			require 'view/ViewBackEnd/confirmUpdateChapterView.php';
		}

		//confirmer la suppression d'un chapitre
		else if ($_GET['action'] == 'confirmDelete'){
			if(isset($_GET['numChapter']) && $_GET['numChapter']>0 && $_GET['numChapter']<=100){
				$chapterNum = isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']):NULL;
				$titleChap = isset($_POST['title'])?htmlspecialchars($_POST['title']):NULL;
				$txtChap = isset($_POST['texte'])?htmlspecialchars($_POST['texte']):NULL;
				$chapConfirm = new ChapterAdminControl();
				$chapIdConfirm = $chapConfirm ->verifDeleteChap($_GET['numChapter'], $titleChap, $txtChap);
			}
			else {
				throw new Exception('Erreur lors de la suppression du chapitre');
			}
		}

		//supprimer un chapitre
		else if ($_GET['action'] == 'deleteChapter'){
			if(isset($_GET['numChapter']) && $_GET['numChapter']>0 && $_GET['numChapter']<=100){
				$chapterNum = isset($_POST['numChapter'])?htmlspecialchars($_POST['numChapter']):NULL;
				$titleChap = isset($_POST['title'])?htmlspecialchars($_POST['title']):NULL;
				$txtChap = isset($_POST['texte'])?htmlspecialchars($_POST['texte']):NULL;
				$chapControl = new ChapterAdminControl();
				$chapDetail = $chapControl->deleteChapter($_GET['numChapter'], $titleChap, $txtChap);
			}
			else {
				throw new Exception('Erreur lors de la suppression du chapitre');
			}
		}

		//confirmation de la suppression d'un chapitre
		else if ($_GET['action'] == 'confirmDeleteChapter'){
			require 'view/ViewBackEnd/confirmDeleteChapView.php';
		}

		//rédaction d'un commentaire
		else if ($_GET['action'] == 'addComment'){
			if(isset($_GET['numChapter']) && $_GET['numChapter'] > 0){
				if (!empty($_POST['author']) && !empty($_POST['comment'])){
					$commentsNew = new CommentsControl();
					$comment = $commentsNew->addComment($_GET['numChapter'],$_POST['author'],$_POST['comment']);
				}
				else {
					throw new Exception('Tous les champs ne sont pas remplis!');
				}
			}
			else {
				throw new Exception('Aucun identifiant de chapitre envoyé');
			}
		}

		//signaler un commentaire
		else if ($_GET['action'] == 'signalComment'){
			if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id']<=100){
				$idChapter = isset($_POST['idChapter'])?htmlspecialchars($_POST['idChapter']):NULL;
				$alertComment = isset($_POST['alert'])?htmlspecialchars($_POST['alert']):NULL;
				$alertConfirm = new CommentsAdminControl();
				$commentAlertConfirm = $alertConfirm ->alertComment($_GET['id'], $alertComment);
			}
			else {
				throw new Exception('Erreur lors du signalement du commentaire');
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
			else {
				throw new Exception('Erreur lors de la suppression du commentaire');
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
			else {
				throw new Exception('Erreur lors de la suppression du commentaire');
			}
		}

		//confirmation de la suppression d'un commentaire
		else if ($_GET['action'] == 'confirmDeleteCom'){
			require 'view/ViewBackEnd/confirmDeleteComView.php';
		}

		//mise à jour de la page d'accueil
		//afficher le résumé du livre
		else if ($_GET['action'] == 'summary'){
			$summaryControl = new SummaryControl();
			$summaryDetail = $summaryControl->SummaryDetail();
		}

		//modifier le résumé du livre
		else if ($_GET['action'] == 'updateSummary'){
			$summaryContent = isset($_POST['content'])?htmlspecialchars($_POST['content']):NULL;
			$summaryControl = new SummaryControl();
			$summaryModif = $summaryControl->updateSummary($summaryContent);
		}

		//afficher la biographie de l'auteur
		else if ($_GET['action'] == 'biography'){
			$biographyControl = new BiographyControl();
			$biographyDetail = $biographyControl->biographyDetail();
		}

		//modifier la biographie de l'auteur
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
			$login = isset($_POST['login'])?htmlspecialchars($_POST['login']):NULL;
			$password = (isset($_POST['passwordUser'])?htmlspecialchars($_POST['passwordUser']):NULL);
			$connectControl = new ConnectControl();
			$admin = $connectControl->interfaceAdmin($login,$password);
		}

		//modification du mot de passe
		else if($_GET['action'] == 'newPassword'){
			require ('view/ViewBackEnd/newPassword.php');
		}
		
		//mise à jour du mot de passe
		else if ($_GET['action'] == 'updatePassword'){
			$login = isset($_POST['login'])?htmlspecialchars($_POST['login']):NULL;
			$password = (isset($_POST['password'])?htmlspecialchars($_POST['password']):NULL);
			$newPassword = (isset($_POST['newPassword'])?htmlspecialchars($_POST['newPassword']):NULL);
			$confNewPassword = (isset($_POST['confirmNewPassword'])?htmlspecialchars($_POST['confirmNewPassword']):NULL);
			$connectControl = new ConnectControl();
			$admin = $connectControl->updatePassword($login, $password, $newPassword, $confNewPassword);
		}

		//si action vide, alors retour sur la page d'accueil
		else if($_GET['action'] == '')
		{
			$accueilControl = new AccueilControl();
			$accueilDetail = $accueilControl->accueilDetail();
		}

		//mentions legales
		else if ($_GET['action'] == 'mentionsLegales'){
			require 'view/ViewFrontEnd/mentionsLegales.php';
		}

		else if ($_GET['action'] == 'erreur404'){
			require 'view/ViewFrontEnd/error404View.php';
		}
	}

	//affichage de la page d'accueil
	else {
		$accueilControl = new AccueilControl();
		$accueilDetail = $accueilControl->accueilDetail();
	}
}

catch(Exception $e){
	$errorMessage = $e->getMessage();
	require('view/ViewFrontEnd/errorView.php');
}

?>

