<?php
use utils\SessionHelpers;

if (SessionHelpers::isID('userInfos'))
{
    if (SessionHelpers::getID('userInfos')->role == "agent")
    {
?>

<div class="container p-3">
    <div class="card">
        <div class="card-body">
            <h3>Liste des incidents ouverts</h3>
            <!-- Liste -->
            <table class="table table-striped table-bordered text-center align-middle">
                <thead class="align-middle table-light">
                    <tr>
                        <th scope="col">Incident</th>
                        <th scope="col">Priorité</th>
                        <th scope="col">Famille</th>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <th scope="col">Bâtiment</th>
                        <th scope="col">Poste</th>
                        <th scope="col">Prendre<br/>en charge</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listeIncidentsOuverts as $incident){
                        switch ($incident->priorite)
                            {
                                case 1 :
                    ?>
                    <tr class="table-danger">
                    <?php
                                    break;
                                case 2 :
                    ?>
                    <tr class="table-warning">
                    <?php
                                    break;
                                default :
                    ?>
                    <tr class="table-info">
                    <?php
                            }
                    ?>
                        <td>
                            <?php
                                if (is_null($incident->salle) || $incident->salle == "")
                                {
                                    echo date_format(date_create($incident->dateHeureOuverture), "Y_m_d") . "_" . $incident->batiment;
                                }
                                else
                                {
                                    echo date_format(date_create($incident->dateHeureOuverture), "Y_m_d") . "_" . $incident->salle;
                                }
                            ?>
                        </td>
                        <td><?= $incident->priorite ?></td>
                        <td><?= $incident->famille ?></td>
                        <td><?= $incident->type ?></td>
                        <td class="text-start text-break"><?= $incident->description ?></td>
                        <td><?= $incident->batiment ?></td>
                        <td><?= $incident->poste ?></td>
                        <td>
                            <a href="/incidents/priseencharge?id=<?= $incident->id ?>" class="btn btn-outline-success">
                                <i class="bi bi-check"></i>
                            </a>
                        </td>
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