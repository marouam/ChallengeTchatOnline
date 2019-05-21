<?php

require_once("DBConnection.php");
/**
 * Model qui regroupe les fonctions modele du type message
 */
class Message extends DBConnection
{
  //Fonction :loadMessageModel 
  // Elle permet de faire une requete sur les tables users/messages non archivés pour retourner la discussion
  function loadMessageModel(){
    $pdo = $this->dbConnect();
    $stmt = $pdo->prepare("SELECT  m.content, u.mail, m.dateCreation FROM messages m, users u WHERE  m.archived= ? AND m.id_users = u.id_users ");
    $stmt->execute([0]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    return $json;
  }
  //Fonction pour insérer le message 
  // 
  function sendMessageModel($message){
    $pdo = $this->dbConnect();
    $id_user = $_SESSION['id_users'];
    $data = [
    'content' => $message,
     'id_users' => $id_user
    ];
    $sql = "INSERT INTO messages (content, id_users) VALUES (:content, :id_users)";
    $stmt= $pdo->prepare($sql);
    if($stmt->execute($data))return 0;
    else return 1;
  }
/*
  fonction archiveMessageModel 
  Changer statut des messages et enrichir les données par qui et date archivage
  */
  function archiveMessageModel(){
    $pdo = $this->dbConnect();
    $archived_at=date("Y-m-d H:i:s");
    $sql = "UPDATE messages SET archived=?, archivedBy=?, dateArchivage=?";
    $stmt= $pdo->prepare($sql);
    return $stmt->execute([1, $_SESSION['id_users'], $archived_at]);
  }
  /*
  Fonction exportArchivedMessageModel
  Permet l'export des messages archivés depuis la DB en JSON

  */
  function exportArchivedMessageModel(){
    $pdo = $this->dbConnect();
    $stmt = $pdo->prepare("SELECT  m.content, u.mail FROM messages m, users u WHERE  m.archived= ? AND m.id_users = u.id_users ");
    $stmt->execute([1]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    return $json;
  }
}
