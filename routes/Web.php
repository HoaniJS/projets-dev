<?php
namespace routes;

use controllers\Account;
use controllers\Agents;
use controllers\Main;
use controllers\Users;
use routes\base\Route;

class Web
{
    function __construct()
    {
        $main = new Main();
        $account = new Account();
        $users = new Users();
        $agents = new Agents();

        // Route de la page d'accueil
        Route::Add('/', [$main, 'home']);

        // Routes en lien avec les comptes
        Route::Add('/login', [$account, 'login']);
        Route::Add('/connexion', [$account, 'connexion']);
        Route::Add('/logout', [$account, 'logout']);
        Route::Add('/update-hash', [$account, 'updateHash']);

        // Routes en lien avec les use cases des utilisateurs
        Route::Add('/incidents', [$users, 'listeIncidents']);
        Route::Add('/incidents/signaler', [$users, 'signalerIncident']);
        Route::Add('/incidents/signalement', [$users, 'signalement']);
        Route::Add('/incidents/suivi', [$users, 'getUserIncidents']);

        // Routes en lien avec les use cases des agents
        Route::Add('/incidents/ouverts', [$agents, 'listeIncidentsOuverts']);
        Route::Add('/incidents/priseencharge', [$agents, 'priseEnCharge']);
        Route::Add('/incidents/pris-en-charge', [$agents, 'listeIncidentsPrisEnCharge']);
        Route::Add('/incidents/maj-incident', [$agents, 'miseAJourIncident']);
    }
}

