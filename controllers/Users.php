<?php


namespace controllers;


use controllers\base\WebController;
use models\UsersModel;
use utils\SessionHelpers;
use utils\Template;

class Users extends WebController
{
    protected UsersModel $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function listeIncidents()
    {
        if (SessionHelpers::isID('userInfos'))
        {
            if (SessionHelpers::getID('userInfos')->role == "utilisateur")
            {
                return Template::render("views/users/listeIncidents.php", array('listeIncidents' => $this->usersModel->getAllIncidents()));
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

    public function signalerIncident()
    {
        if (SessionHelpers::isID('userInfos'))
        {
            if (SessionHelpers::getID('userInfos')->role == "utilisateur")
            {
                return Template::render("views/users/signalerIncident.php", array('listeTypes' => $this->usersModel->getAllTypes()));
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

    public function signalement()
    {
        if (SessionHelpers::isID('userInfos'))
        {
            if (SessionHelpers::getID('userInfos')->role == "utilisateur")
            {
                $this->usersModel->addIncident(htmlspecialchars($_POST['description']), $_POST['priorite']*(-1),
                    htmlspecialchars($_POST['batiment']), htmlspecialchars($_POST['salle']), htmlspecialchars($_POST['poste']),
                    intval($_POST['type']), SessionHelpers::getID('userInfos')->id);
                $this->redirect('/incidents');
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

    public function getUserIncidents()
    {
        if (SessionHelpers::isID('userInfos'))
        {
            if (SessionHelpers::getID('userInfos')->role == "utilisateur")
            {
                return Template::render("views/users/userIncidents.php", array('userIncidents' =>
                    $this->usersModel->getAllUserIncidents(SessionHelpers::getID('userInfos')->id)));
            }
            else
            {
                $this-redirect('/');
            }
        }
        else
        {
            $this->redirect('/');
        }
    }
}