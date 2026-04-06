<?php


namespace controllers;


use controllers\base\WebController;
use models\AgentsModel;
use utils\SessionHelpers;
use utils\Template;

class Agents extends WebController
{
    protected AgentsModel $agentsModel;

    public function __construct()
    {
        $this->agentsModel = new AgentsModel();
    }

    public function listeIncidentsOuverts()
    {
        if (SessionHelpers::isID('userInfos'))
        {
            if (SessionHelpers::getID('userInfos')->role == "agent")
            {
                return Template::render("views/agents/listeIncidentsOuverts.php", array('listeIncidentsOuverts' => $this->agentsModel->getAllIncidentsOuverts()));
            }
            else
            {
                $this->redirect('/');
            }
        }
        else
        {
            $this->redirect('/');
        }
    }

    public function priseEnCharge($id)
    {
        if (SessionHelpers::isID('userInfos'))
        {
            if (SessionHelpers::getID('userInfos')->role == "agent")
            {
                $this->agentsModel->updatePECIncident($id, SessionHelpers::getID('userInfos')->id);
                $this->redirect('/incidents/pris-en-charge');
            }
            else
            {
                $this->redirect('/');
            }
        }
        else
        {
            $this->redirect('/');
        }
    }

    public function listeIncidentsPrisEnCharge()
    {
        if (SessionHelpers::isID('userInfos'))
        {
            if (SessionHelpers::getID('userInfos')->role == "agent")
            {
                return Template::render("views/agents/listeIncidentsPrisEnCharge.php", array('listeIncidentsPrisEnCharge' => $this->agentsModel->getAllIncidentsPrisEnCharge(SessionHelpers::getID('userInfos')->id)));
            }
            else
            {
                $this->redirect('/');
            }
        }
        else
        {
            $this->redirect('/');
        }
    }

    public function miseAJourIncident()
    {
        if (SessionHelpers::isID('userInfos'))
        {
            if (SessionHelpers::getID('userInfos')->role == "agent")
            {
                if ($_POST['submit'][0] == "-")
                {
                    $this->agentsModel->closeIncident(substr($_POST['submit'], 1), );
                }
                else
                {
                    $this->agentsModel->updateCommentairePEC($_POST['submit'], $_POST['commentaire']);
                }
                $this->redirect('/incidents/pris-en-charge');
            }
            else
            {
                $this->redirect('/');
            }
        }
        else
        {
            $this->redirect('/');
        }
    }
}