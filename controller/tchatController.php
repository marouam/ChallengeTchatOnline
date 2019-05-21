<?php

require('model/UserTchat.php');
require('model/Message.php');
//Fonction pour tester si l'utilisateur a saisi login/pwd correct
//OK crée la session et retourne la fonction pour appeler la view du chatroom
//KO retourne -1 pour informer que c'est pas le bon
function checkUser(){
     $user_login=null;
     $user_pwd =null;
     $user = new UserTchat();
	if(isset($_POST['form-username']) &&  isset($_POST['form-password'])) {
		$user_login=strip_tags($_POST['form-username']);
		$user_pwd=strip_tags($_POST['form-password']);
        //TO DO CHECK IF USER AND PWD IN DATABASE
        $retourCode=$user->signIn($user_login,$user_pwd);
		if($retourCode!= "-1"){
			$_SESSION['id_users']= $retourCode;
			$_SESSION['mail']= $user_login;

		}
		else return "-1";
	} 
 	else echo  "ERROR checkUser"; //TO DO REPLAY WITH ERROR CODE 

  
}

/*
  Fonction : signUpTchat
  Param : 
  Détails : Inscription de l'utilisateur pour le tchat!
	Cas paramétres de POST : retourne 1
	Cas 

*/
function signUpTchat(){
    $user = new UserTchat();
    //strip_tags pour sécurité  
	$user_login=strip_tags($_POST['form-login']);
	$user_pwd= password_hash(strip_tags($_POST['form-pwd']), PASSWORD_BCRYPT );
	$retour= $user->signUp($user_login,$user_pwd);
	if($retour !="0"){
		$_SESSION['id_users']=$retour;
		$_SESSION['mail']=$user_login;
	}
    return $retour;
    

}
/**
**Fonction pour la connexion
Function for SignIn
**
*/
function signInTchat()
{
	require('view/signInTchatView.php');
}
//Fonction pour envoie de message
function sendMessageControl(){
 	if(isset($_POST['message'])){
   		$content = trim(strip_tags($_POST['message']),"  ");
   		$message = new Message();
   		if($content !="")return $message->sendMessageModel($content);
	}
 	return "0";
}

//Fonction pour lister les utilisateurs en ligne
function listUsersOnlineController(){
	$user = new UserTchat();
	echo $user->listUsersOnlineModel();
}

/*
Fonction  logoutController
1- Mettre le flag de la BD online ==0
2- Ecraser la session

*/
function logoutController(){
	$user = new UserTchat();
	$user->logoutModel();
    $_SESSION['id_users']=null;
	session_destroy();
}


function isConnected(){

if( isset($_SESSION['id_users'])) return true;
return false;
}


function exportArchivedMessageController(){
	$message = new Message();
	echo $message->exportArchivedMessageModel();
	   //header("Content-Type: text/plain; charset=UTF-8");
	header("Content-type: application/json; charset=UTF-8");
  header("Content-disposition: attachment; filename=ArchivedDiscussion.json");
  exit();

}
// Fonction qui appel la fonction du modéle
//Pour charger les messages 
function loadMessageController(){
	$message = new Message();
  	echo $message->loadMessageModel();
}

/*
Fonction archiveMessageController 

Permet d'archiver les messages de la discussion en cours
*/
function archiveMessageController(){
	$message = new Message();
	$message->archiveMessageModel();
}


function tchatWindow(){
	require('view/tchatWindowView.php');
}
