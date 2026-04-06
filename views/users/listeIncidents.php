<?php
use utils\SessionHelpers;

if (SessionHelpers::isID('userInfos'))
{
    if (SessionHelpers::getID('userInfos')->role == "utilisateur")
    {
?>

<div class="container p-3">
    <div class="card">
        <div class="card-body">
            <h3>Liste des incidents déclarés</h3>
            <!-- Bouton -->
            <p>
                Avant de signaler un incident, veuillez vérifier s'il n'a pas déjà été déclarer par quelqu'un.
            </p>
            <div class="d-grid gap-2">
                <a href="incidents/signaler" class="btn btn-primary" role="button" data-bs-toggle="button">Signaler un incident</a>
            </div>
            <br/>

            <!-- Liste -->
            <table class="table table-striped table-bordered text-center align-middle">
                <thead class="align-middle table-light">
                    <tr>
                        <th scope="col">Famille</th>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <th scope="col">État</th>
                        <th scope="col">Date<br/>d'ouverture</th>
                        <th scope="col">Bâtiment</th>
                        <th scope="col">Salle</th>
                        <th scope="col">Poste</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listeIncidents as $incident){ ?>
                    <tr>
                        <td><?= $incident->famille ?></td>
                        <td><?= $incident->type ?></td>
                        <td class="text-start text-break"><?= $incident->description ?></td>
                        <td><?= $incident->etat ?></td>
                        <td>
                            <?php
                                $date = explode(" ", $incident->dateHeureOuverture)[0];
                                $element = explode("-", $date);
                                echo $element[2] . "/" . $element[1] . "/" . $element[0];
                            ?>
                        </td>
                        <td><?= $incident->batiment ?></td>
                        <td><?= $incident->salle ?></td>
                        <td><?= $incident->poste ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    }
    else
    {
?>
    <div class="alert alert-danger" role="alert">
        Vous ne disposez pas des droits nécessaires pour accéder à cette page.
    </div>
<?php
    }
}
else
{
?>
    <div class="alert alert-danger" role="alert">
        Vous ne disposez pas des droits nécessaires pour accéder à cette page.
    </div>
<?php
}
?>