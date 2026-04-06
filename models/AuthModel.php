<?php
namespace models;

use models\base\SQL;
use PDO;

class AuthModel extends SQL
{
    public function __construct()
    {
        parent::__construct('utilisateurs', 'id');
    }

    public function getUserInfos($mail)
    {
        $req = "select id, nom, mail, passhash, role, telephone from utilisateurs WHERE mail = ?";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$mail]); 
        
        $user = $stmt->fetch(PDO::FETCH_OBJ);
       
        return $user;
    }

    public function updatePassId()
    {
        $getAmount = $this->getPdo()->prepare("SELECT COUNT(passw) AS amount FROM utilisateurs");
        $getAmount->execute();
        $length = $getAmount->fetch(PDO::FETCH_OBJ)->amount;

        $stmt = $this->getPdo()->prepare("UPDATE utilisateurs SET passhash = ? WHERE id = ?");
        for ($i = 1; $i <= $length; $i++)
        {
            $getPassw = $this->getPdo()->prepare("SELECT passw FROM utilisateurs WHERE id = ?");
            $getPassw->execute([$i]);
            $passH = password_hash($getPassw->fetch(PDO::FETCH_OBJ)->passw, PASSWORD_BCRYPT);
            $stmt->execute([$passH,$i]);
        }
    }

    public function userExist($mail, $passw) : string
    {
        $mailt = 'inconnu';

        $req = "select mail, passhash from utilisateurs WHERE mail = ?";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$mail]); 
        $ligne = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (isset($ligne)){
            if (password_verify($passw,$ligne[0]->passhash)){
                $mailt= $ligne[0]->mail;
            }
        }
        return $mailt;
    }
}