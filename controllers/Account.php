<?php


namespace controllers;


use controllers\base\WebController;
use models\AuthModel;
use utils\SessionHelpers;
use utils\Template;

class Account extends WebController
{
    protected AuthModel $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function login(): string
    {
        if (SessionHelpers::isID('userInfos'))
        {
            $this->redirect('/');
        }
        else
        {
            return Template::render("views/account/login.php");
        }
    }

    public function connexion()
    {
        if (isset($_POST['login']) && isset($_POST['password']) &&
            !empty($_POST['password']) && filter_var($_POST['login'], FILTER_VALIDATE_EMAIL) ) { 
      
            $mail = $_POST['login'];
            $pass = $_POST['password'];
            $leMail = $this->authModel->userExist($mail,$pass);
            if ($leMail != "inconnu"){
                SessionHelpers::setID('userInfos', $this->authModel->getUserInfos($mail));
                $this->redirect('/');
            }
            else
            {
                $this->redirect('/login');
            }
        }
        else
        {
            $this->redirect('/login');
        }
    }

    public function logout()
    {
        if (SessionHelpers::isID('userInfos'))
        {
            SessionHelpers::unsetID('userInfos');
        }
        $this->redirect('/');
    }

    function updateHash()
    {
        if (SessionHelpers::isID('userInfos'))
        {
            if (SessionHelpers::getID('userInfos')->role == "admin")
            {
                $this->authModel->updatePassId();
            }
        }
        $this->redirect("/");
    }
}