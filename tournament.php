<?php
session_start();
$title = 'Inscription au tournoi';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/tournamentModel.php';
require_once 'controllers/tournamentController.php';
require_once 'includes/header.php';
?>
<form action="tournament.php" method="POST">

    <label for="creationdate" class="form-label">Creation de tournoi</label>
    <input type="date"  id="creationdate" name="creationdate" class="form-control<?= !isset($formErrors['creationdate']) ?: 'is-invalid'; ?> "value="<?= @$_POST['creationdate'] ?>"   />
    <div class="invalid-feedback">
    </div>

    <label for="tournamentdate" class="form-label">date du tournoi</label>
    <input type="date" id="tournamentdate" name="tournamentdate" class="form-control<?= !isset($formErrors['tournamentdate']) ?: 'is-invalid'; ?> "value="<?= @$_POST['tournamentdate'] ?>"  />
    <div class="invalid-feedback">
    </div>

    <label for="startinscriptiondate" class="form-label">debut des inscription pour le tournoi</label>
    <input type="date"  id="startinscriptiondate" name="startinscriptiondate" class="form-control<?= !isset($formErrors['startinscriptiondate']) ?: 'is-invalid'; ?> "value="<?= @$_POST['startinscriptiondate'] ?>"  />
    <div class="invalid-feedback">
    </div>

    <label for="endinscriptiondate" class="form-label">Fin des inscription pour le tournoi</label>
    <input type="date"  id="endinscriptiondate" name="endinscriptiondate" class="form-control<?= !isset($formErrors['endinscriptiondate']) ?: 'is-invalid'; ?> "value="<?= @$_POST['endinscriptiondate'] ?>"  />
    <div class="invalid-feedback">
    </div>

    <input type="submit" value="S'inscrire" class="btn btn-success" />
    <?php require_once 'includes/footer.php'; ?>