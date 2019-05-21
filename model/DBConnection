<?php

class DBConnection
{
    

   protected function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=tchatOnlineDB;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
}
