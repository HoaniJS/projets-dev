<?php

namespace controllers;

use controllers\base\WebController;
use utils\Template;
use models\MonModel;

class Main extends WebController
{
	

    function __construct()
    {
        // Décommenter pour avoir des données depuis une base de données
        //$this->videoModel = new DBVideo();
    }

    function home(): string
    {
        return Template::render("./views/global/home.php");
    }

    // function about(): string
    // {
    //     return Template::render("views/global/about.php");
    // }
	
}