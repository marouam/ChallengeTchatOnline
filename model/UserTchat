<?php 
require_once("DBConnection.php");

/**
 * Model qui regroupe les fonctions modele du type user
 */
class UserTchat extends DBConnection
{
	//Fonction qui permet de  vérifier les données saisies par l'utilisateur 
    // On vérifie si tout d'abord l'username existe 
    //Pour vérifier le hashage du mot de passe s'il est aussi correct
    // Si OK 
    //Si KO
    function signIn($login, $pwd){
        $pdo = $this->dbConnect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE mail = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();
        if ($user && password_verify($pwd, $user['pwd'])) //TO DO
        {
            $sql = "UPDATE users SET online=? WHERE id_users=?";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([1, $user['id_users']]);
            return $user["id_users"];// OK
        }else {
            return "-1";//KO
        }
    }
    //fonction pour l'inscription MODEL
    //Cas Mail  déjà inscrit  User est inscrit 
    //Cas première inscription
    function signUp($login,$pwd){
        //Check if mail déjà insrit 
        $pdo = $this->dbConnect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE  mail= ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();
        if($user){
            //Mail déjà existant 
            return "0";
        }
        else{
            //Nouvele inscription
            $data = [
                    'mail' => $login,
                    'pwd' => $pwd
                ];
            $sql = "INSERT INTO users ( mail,pwd) VALUES (:mail, :pwd)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute($data);
            //Récupération ID
            $stmt = $pdo->prepare("SELECT id_users FROM users WHERE  mail= ?");
            $stmt->execute([$login]);
            $user = $stmt->fetch();
            return $user['id_users'];
        }
    }
    /*
    Fonction  :listUsersOnlineModel
    Retourne le utilisateurs en ligne
    */
    function listUsersOnlineModel(){
        $pdo = $this->dbConnect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE  online= ? ");
        $stmt->execute([1]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        return $json;
    }
    /*

    Fonction : logoutModel
     Déconnexion 
    */
    function logoutModel(){
        $pdo = $this->dbConnect();
        $archived_at=date("Y-m-d H:i:s");
        $sql = "UPDATE users SET online=? WHERE id_users=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([0, $_SESSION['id_users']]);
    }
}




