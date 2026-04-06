<?php
namespace models;

use models\base\SQL;
use PDO;

class UsersModel extends SQL
{
    public function __construct()
    {
        parent::__construct('incidents', 'id');
    }

    public function addIncident($desc, $prio, $bat, $salle, $poste, $mat, $decl)
    {
        $req = "insert into incidents (dateHeureOuverture, description, priorite, batiment, salle, poste, materiel_id, declarant_id, etat_id) "
            . "values(now(), ?, ?, ?, ?, ?, ?, ?, 1)";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$desc, $prio, $bat, $salle, $poste, $mat, $decl]);
    }

    public function getAllIncidents()
    {
        $req = "select m.famille, m.type, i.description, e.description as etat, i.dateHeureOuverture, i.batiment, i.salle, i.poste "
            . "from incidents as i "
            . "join materiels as m on m.id = i.materiel_id "
            . "join etats as e on e.id = i.etat_id "
            . "where e.description = 'Ouvert' "
            . "or e.description = 'Pris en charge' "
            . "order by i.dateHeureOuverture";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllTypes()
    {
        $req = "select id, famille, type from materiels";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllUserIncidents($id)
    {
        $req = "select m.famille, m.type, i.description, i.etat_id, e.description as etat, i.dateHeureOuverture, i.batiment, i.salle, i.poste "
            . "from incidents as i "
            . "join materiels as m on m.id = i.materiel_id "
            . "join etats as e on e.id = i.etat_id "
            . "where i.declarant_id = ? "
            . "order by etat desc, i.dateHeureOuverture";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Méthode retournant les familles de matériels et le nombre de types de types d'incidents qu'elles englobent.
    // Abandonnée au profit d'une solution plus simple.

    // public function getNbTypesParFamille()
    // {
    //     $req = "select famille, count(*) from materiels "
    //     . "group by famille";
    //     $stmt = $this->getPdo()->prepare($req);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
    // }
}