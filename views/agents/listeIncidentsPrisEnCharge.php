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
            <h3>Liste des incidents pris en charge par <?php echo SessionHelpers::getID('userInfos')->nom ?></h3>
            <!-- Liste -->
            <table class="table table-bordered text-center align-middle">
                <thead class="align-middle table-light">
                    <tr>
                        <th scope="col">Incident</th>
                        <th scope="col">Priorité</th>
                        <th scope="col">Famille</th>
                        <th scope="col">Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($listeIncidentsPrisEnCharge as $incident){
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
                        <!-- <td class="text-start text-break"><?= $incident->description ?></td>
                        <td><?= $incident->batiment ?></td>
                        <td><?= $incident->poste ?></td>
                        <td>
                            <a href="/incidents/priseencharge?id=<?= $incident->id ?>" class="btn btn-outline-success">
                                <i class="bi bi-check"></i>
                            </a>
                        </td> -->
                    </tr>
                    <tr class="text-start">
                        <td colspan="4">
                            <div class="row g-3">
                                <div class="col-md-4 text-capitalize">
                                    Déclarant : <?= $incident->nom ?>
                                </div>
                                <div class="col-md-4 text-capitalize">
                                    Rôle : <?= $incident->role ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row g-3">
                                <div class="col">
                                    Description :
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col">
                                    <?= $incident->description ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row g-3">
                                <?php
                                if (!is_null($incident->salle) && $incident->salle != ""
                                    || !is_null($incident->poste) && $incident->poste != "")
                                {
                                ?>
                                <div class="col text-capitalize">
                                    Salle : <?= $incident->salle ?>
                                </div>
                                <div class="col text-capitalize">
                                    Poste : <?= $incident->poste ?>
                                </div>
                                <?php
                                }
                                ?>
                                <div class="col">
                                    Pris en charge le :
                                    <?php
                                        echo date_format(date_create($incident->dateHeureDebut), "d/m/Y")
                                        . ' à '
                                        . date_format(date_create($incident->dateHeureDebut), "H:i:s");
                                    ?>
                                </div>
                            </div>
                            <br/>
                            <form method="POST" action="/incidents/maj-incident">
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="commentaire<?= $incident->id ?>" class="form-label">Commentaire :</label>
                                        <textarea class="form-control" name="commentaire" id="commentaire<?= $incident->id ?>" maxlength="100"><?= $incident->commentaire ?></textarea>
                                    </div>
                                </div>
                                <br/>
                                <div class="row g-3">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" class="btn btn-primary" name="submit" value="<?= $incident->id ?>">Publier/Modifier le commentaire</button>
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" class="btn btn-primary" name="submit" value="-<?= $incident->id ?>">Clôturer l'incident</button>
                                    </div>
                                </div>
                            </form>
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