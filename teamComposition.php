<?php
session_start();
$title = 'Composition de l\'équipe';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/teamCompositionModel.php';
require_once 'controllers/teamCompositionController.php';
require_once 'includes/header.php';
?>
<form action="teamComposition.php" method="POST">

    <label for="groupeName" class="form-label">Nom de l'équipe</label>
    <input type="text" placeholder="jdupont" id="groupeName" name="groupeName" class="form-control <?= !isset($formErrors['groupeName']) ?: 'is-invalid'; ?>" value="<?= @$_POST['groupeName'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['groupeName'] ?>
    </div>
    <input type="submit" value="Inscription de l'équipe" class="btn btn-success" />
    <?php require_once 'includes/footer.php'; ?>