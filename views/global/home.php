<!-- <?php use utils\SessionHelpers; ?>

<?php if (SessionHelpers::isID('userInfos')){ ?>
<div class="alert alert-success" role="alert">
    Bonjour <?php echo SessionHelpers::getID('userInfos')->nom ?>, vous êtes un <?php echo SessionHelpers::getID('userInfos')->role ?>.
</div>
<?php }
else { ?>
<div class="alert alert-warning" role="alert">
    Bonjour, veuillez vous connecter.
</div>
<?php } ?> -->

<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h3>Bienvenue sur GILLA</h3>
                <p>
                    Le site GILLA permet aux élèves, étudiants, professeurs et personnels du lycée polyvalent Louis Amrand 
                    de signaler des problèmes de tout type (éclairage, fermeture porte ou fenêtre, matériel informatique 
                    ou logiciel, etc.) et prendre en charge leur résolution. Tout ceci est effectué grâce à une gestion 
                    centralisée des « tickets d'incidents » et une affectation automatique aux personnels de maintenance 
                    selon le type d'incident identifié, pour une prise en charge rapide.
                    <br/><br/>
                    Pour l'instant, deux types d'utilisateurs ont été implémentés, sur les quatre prévus :
                </p>

                <ul>
                    <li>
                        Les <span class="fw-bold">simples utilisateurs</span>, soient toute personne travaillant au lycée 
                        (élève, étudiant, enseignant, AED, CPE, personnel administratif, agent technique). Ces utilisateurs 
                        sont capables de signaler un incident et de préciser le type d'élément concerné (par sélection dans 
                        une liste) et son emplacement avec un commentaire. Ils ont également la possibilité de suivre la 
                        prise en charge des incidents qu'ils ont signalé.
                    </li>
                    <li>
                        Les <span class="fw-bold">agents de maintenance</span>. Ils peuvent consulter les incidents du ou des 
                        type(s) dont ils ont la charge, de gérer leurs priorités (Haute, Moyenne ou Basse) et leurs états 
                        d'avancement (Affecté, Résolu ou Fermé) et de les clôturer avec un commentaire.
                    </li>
                </ul>

                <p>
                    À terme, deux rôles supplémentaires devraient être intégrés :
                </p>

                <ul>
                    <li>
                        Les <span class="fw-bold">responsables de la maintenance</span>. Ils pourront gérer l'équipe de 
                        maintenance et les affectations des agents aux types d'incidents. Ils disposeront aussi d'un
                        tableau de bord pour suivre la prise en charge des incidents par type et par personnel de 
                        maintenance.
                    </li>
                    <li>
                        Les <span class="fw-bold">administrateurs du site</span>. Ils auront la possibilité de gérer les 
                        profils des utilisateurs inscrits et leurs rôles associés (groupe d'utilisateur), ainsi que de 
                        mettre à jour le site et la base de données associée.
                    </li>
                </ul>
                
                <p>
                    <?php
                        if (!SessionHelpers::isID('userInfos')){
                        echo "Avant de commencer, veuillez vous connecter en haut à droite du site :)";
                        }
                        else
                        {
                            switch (SessionHelpers::getID('userInfos')->role)
                            {
                                case "utilisateur" :
                                    echo 'Bienvenue ' . SessionHelpers::getID('userInfos')->nom . '. En tant que simple '
                                        . 'utilisateur, vous pouvez <span class="fw-bold">signaler un incident</span> et '
                                        . '<span class="fw-bold">consulter la liste des incidents</span> que vous avez déjà '
                                        . 'signalés.';
                                    break;
                                case "agent" :
                                    echo 'Bienvenue ' . SessionHelpers::getID('userInfos')->nom . '. En tant qu\'agent, '
                                        . 'vous pouvez <span class="fw-bold">consulter la liste des incidents ouverts</span> '
                                        . 'et celle des <span class="fw-bold">incidents que vous avez pris en charge</span>.';
                                    break;
                                default :
                                    echo "Bienvenue " . SessionHelpers::getID('userInfos')->nom . ". En tant que "
                                    . SessionHelpers::getID('userInfos')-> role . ", vous ne pouvez rien faire pour l'instant. "
                                    . "Désolé.";
                                    break;
                            }
                        }
                        ?>
                </p>
            </div>
        </div>
    </div>
</div>