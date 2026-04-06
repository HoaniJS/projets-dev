<?php

use utils\SessionHelpers;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GILLA</title>
    <link rel="icon" type="images/x-icon" href="/public/images/gilla_icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/style/main.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/public/images/gilla_logo.png" alt="Logo GILLA" width="35" height="24" class="d-inline-block align-text-top">
                GILLA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <a class="nav-link" href="/">Accueil</a>
                    <?php
                    if (SessionHelpers::isID('userInfos'))
                    {
                        if (SessionHelpers::getID('userInfos')->role == "utilisateur"){
                        ?>
                        <a class="nav-link" href="/incidents">Signalement</a>
                        <a class="nav-link" href="/incidents/suivi">Suivi</a>
                        <?php
                        }
                        elseif (SessionHelpers::getID('userInfos')->role == "agent") {
                        ?>
                        <a class="nav-link" href="/incidents/ouverts">Incidents ouverts</a>
                        <a class="nav-link" href="/incidents/pris-en-charge">Incidents pris en charge</a>
                        <?php } 
                    } ?>
                </div>
            </div>
            <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarUsr">
                <div class="navbar-nav">
                    <?php
                    if (SessionHelpers::isID('userInfos')){
                    ?>
                    <a class="nav-link active" href="/logout">Déconnexion</a>
                    <?php
                    }
                    else{
                    ?>
                    <a class="nav-link active" href="/login">Connexion</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>