<?php
namespace models;

use models\base\SQL;
use PDO;

class AgentsModel extends SQL
{
    public function __construct()
    {
        parent::__construct('incidents', 'id');
    }

    public function closeIncident($id)
    {
        $req = "update incidents set etat_id = 3 where id = ?";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$id]);

        $req = "update priseencharges set dateHeureFin = now() where incident_id = ?";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$id]);

        $req = "update incidents set dateHeureFermeture = now() where id = ?";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$id]);
    }

    public function getAllIncidentsOuverts()
    {
        $req = "select i.id, i.dateHeureOuverture, i.priorite, i.salle, m.famille, m.type, i.description, i.etat_id, i.batiment, i.poste "
            . "from incidents as i "
            . "join materiels as m on m.id = i.materiel_id "
            . "where i.etat_id = 1 "
            . "order by i.priorite, i.dateHeureOuverture";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllIncidentsPrisEnCharge($agent)
    {
        $req = "select u.nom, u.role, i.id, i.dateHeureOuverture, i.priorite, i.salle, m.famille, m.type, i.description, i.etat_id, i.batiment, i.poste, p.dateHeureDebut, p.commentaire "
            . "from incidents as i "
            . "join utilisateurs as u on u.id = i.declarant_id "
            . "join materiels as m on m.id = i.materiel_id "
            . "join priseencharges as p on p.incident_id = i.id "
            . "where i.etat_id = 2 "
            . "&& p.agent_id = ? "
            . "order by i.priorite, i.dateHeureOuverture, p.dateHeureDebut";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$agent]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateCommentairePEC($id, $commentaire)
    {
        $req = "update priseencharges set commentaire = ? where incident_id = ?";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$commentaire, $id]);
    }

    public function updatePECIncident($incident, $agent)
    {
        $req = "update incidents set etat_id = 2 where id = ?";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$incident]);

        $req = "insert into priseencharges (dateHeureDebut, agent_id, incident_id) "
        . "values(now(), ?, ?)";
        $stmt = $this->getPdo()->prepare($req);
        $stmt->execute([$agent, $incident]);
    }
}