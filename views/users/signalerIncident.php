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
            <h3>Signalement d'un incident</h3>
            <form class="row g-3 needs validation" method="POST" action="/incidents/signalement">
                <div class="col-md-6">
                    <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                    <select class="form-select" name="type" id="type" required>
                        <option selected disabled value="">Type de l'incident</option>
                        <?php
                        $famille = "";
                        foreach ($listeTypes as $type)
                        {
                            if ($type->famille != $famille)
                            {
                                $famille = $type->famille;
                                ?>
                                <option disabled value=""><?= $famille ?></option>
                                <?php
                            }
                            ?>
                            <option value=<?= $type->id ?>>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?=$type->type ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="priorite" class="form-label">Priorité (de basse à haute)<span class="text-danger">*</span></label>
                    <input type="range" class="form-range" min="-3" max="-1" name="priorite" id="priorite" required>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="description" id="description" maxlength="250" placeholder="Décrivez brièvement l'incident." rows="2" required></textarea>
                </div>

                <div class="col-12">
                    <label for="batiment" class="form-label">Bâtiment<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="batiment" id="batiment" maxlength="1" placeholder="Précisez le bâtiment où se trouve l'incident." required>
                </div>

                <div class="col-md-6">
                    <label for="salle" class="form-label">Salle</label>
                    <input type="text" class="form-control" name="salle" id="salle" maxlength="4" placeholder="Si l'incident concerne une salle, précisez laquelle.">
                </div>

                <div class="col-md-6">
                    <label for="poste" class="form-label">Poste</label>
                    <input type="text" class="form-control" name="poste" id="poste" maxlength="4" placeholder="Si l'incident concerne un poste, précisez lequel.">
                </div>

                <div class=col-12>
                    <button type="submit" class="btn btn-danger">Signaler</button>
                </div>
            </form>
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