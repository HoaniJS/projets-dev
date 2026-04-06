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
            <h3>Liste des incidents que vous avez signalés</h3>
            <!-- Liste -->
            <table class="table table-bordered table-striped text-center align-middle">
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
                    <?php
                        foreach ($userIncidents as $incident){
                            switch ($incident->etat_id)
                            {
                                case 2 :
                    ?>
                    <tr class="table-warning">
                    <?php
                                    break;
                                case 3 :
                    ?>
                    <tr class="table-success">
                    <?php
                                    break;
                                default :
                    ?>
                    <tr>
                    <?php
                            }
                    ?>
                        <td><?= $incident->famille ?></td>
                        <td><?= $incident->type ?></td>
                        <td class="text-start text-break"><?= $incident->description ?></td>
                        <td><?= $incident->etat ?></td>
                        <td>
                            <?php
                                echo date_format(date_create($incident->dateHeureOuverture), "d/m/Y")
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