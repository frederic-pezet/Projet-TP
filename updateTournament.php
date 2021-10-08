<?php
session_start();
$title = 'Modification du tournoi';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/tournamentModel.php';
require_once 'controllers/updateTournamentController.php';
require_once 'includes/header.php';
?>
<form method="POST" action="updateTournament.php?id=<?= $tournamentDetails->id ?>">

    <label for="creationdate" class="form-label">Creation de tournoi</label>
    <input type="date"  id="creationdate" name="creationdate" class="form-control<?= !empty($formErrors['creationdate']) ?: 'is-invalid'; ?> "value="<?= @$_POST['creationdate'] ?>"   />
    <div class="invalid-feedback">
    <?= @$formErrors['creationdate'] ?>
    </div>
   


    <form method="POST" action="updateTournament.php?id=<?= $tournamentDetails->id ?>">
    <label for="tournamentdate" class="form-label">date du tournoi</label>
    <input type="date" id="tournamentdate" name="tournamentdate" class="form-control<?= !empty($formErrors['tournamentdate']) ?: 'is-invalid'; ?> "value="<?= @$_POST['tournamentdate'] ?>"  />
    <div class="invalid-feedback">
    <?= @$formErrors['tournamentdate'] ?>
    </div>
   

    <label for="startinscriptiondate" class="form-label">debut des inscription pour le tournoi</label>
    <input type="date"  id="startinscriptiondate" name="startinscriptiondate" class="form-control<?= !empty($formErrors['startinscriptiondate']) ?: 'is-invalid'; ?> "value="<?= @$_POST['startinscriptiondate'] ?>"  />
    <div class="invalid-feedback">
    <?= @$formErrors['startinscriptiondate'] ?>
    </div>
    

    <label for="endinscriptiondate" class="form-label">Fin des inscription pour le tournoi</label>
    <input type="date"  id="endinscriptiondate" name="endinscriptiondate" class="form-control<?= !empty($formErrors['endinscriptiondate']) ?: 'is-invalid'; ?> "value="<?= @$_POST['endinscriptiondate'] ?>"  />
    <div class="invalid-feedback">
    <?= @$formErrors['endinscriptiondate'] ?>
    </div>
    <input type="submit" value="Modification du tournoi" name="updateTournaments" class="btn btn-primary" />
</form>


    
<?php require_once 'includes/footer.php'; ?>