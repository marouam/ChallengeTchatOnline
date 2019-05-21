<?php
//Root Page 
//Tous les appels sont routés depuis cette page
//Démarrage de la session
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
//Pour que cette page fonctionne, on a besoin de notre controleur, qui s'appelle TchatController 
//Il est au niveau controller/tchatController
require('controller/tchatController.php');

//On commence par voir si l'utilisateur est déjà connecté 
//On appelle la fonction isConnected  
 if(isConnected() == false){
 	//Cas non connecté / isConnected retourne false
	if(isset($_POST['signin'])){
		//Cas: l'utilisateur a cliqué sur "se connecter"
    	if(checkUser()== "-1"){
    		//Erreur : Identifiant/PWD n'est pas correcte!
	    	echo '<div class="alert alert-danger" role="alert" id="alertConnexion"> Connexion échouée! Merci de vérifier Email/Mot de passe saisie et de réessayer!</div>';
			 signInTchat();
		}
		else {
			//Connexion réussie
			tchatWindow();//
		} 
	}
	elseif (isset($_POST['signup'])) {
		// L'utilisateur a cliqué sur "inscription"
		//Vérification des éléments de formulaires
		if(isset($_POST['form-login']) &&  isset($_POST['form-pwd'])) {
			//Appel de la fonction du controller signUpTchat
			//Redirection selon le code de retour
			//Si 0 == Le mail déjà existant/Error
			//Si non == inscription avec succés
			if(signUpTchat()=="0"){

				echo '<div class="alert alert-danger" role="alert" id="alertConnexion">Email déjà existant!</div>';
				signInTchat();
			}
			else  tchatWindow();
		}
		else 
	   		echo '<div class="alert alert-danger" role="alert" id="alertConnexion"> Email/Mot de passe non renseigné! Merci de vérifier</div>';
	}
	else signInTchat();
} 
  // User est connecté 
else{
	/* LES APPELS DE AJAX */
	/* POUR CHARGER LES MESSAGES */
	//Pour charger les messages en temps réel
	if(isset($_POST['loadMessage'])){
		//Appel de la fonction du controller loadMessageChatRoom		
		loadMessageController();
	}
	// LES APPELS DE AJAX
	// POUR CHARGER LES UTILISATEURS EN LIGNE
	// pour charger les utilisateurs en ligne
	elseif(isset($_POST['usersOnline'])){
		listUsersOnlineController();
	}
	// Si l'utilisateur envoie un message
	elseif (isset($_POST['sendMessage'])) {
		//Appel de la fonction du controller sendMessageControl
		$retour =sendMessageControl();
	}
	//Si l'utilisateur se déconnecte
	elseif (isset($_POST['logout'])) {
		logoutController();
	}
	// Si l'utilisateur archive la discussion 
	elseif (isset($_POST['archiveMessage'])) {
		archiveMessageController();
	}
	//Si l'utilisateur choisit d'exporter les discussions archivées
	elseif (isset($_GET['export'])) {
		exportArchivedMessageController();
		tchatWindow();
	}
	else{
		tchatWindow();
	} 
}  



