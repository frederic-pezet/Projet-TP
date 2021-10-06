<?php
session_start();
$title = 'Inscription de votre equipe';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/teamModel.php';
require_once 'controllers/teamController.php';
require_once 'includes/header.php';
?>

<form action="team.php" method="POST">
   
    <label for="name" class="form-label">Nom de l'equipe</label>
    <input type="text" placeholder="PSG" id="name" name="name" class="form-control<?= !isset($formErrors['name']) ?: 'is-invalid'; ?> " value="<?= @$_POST['name'] ?>" />
    <div class="invalid-feedback">
    <?= @$formErrors['name'] ?>
    </div>

    
    <label for="logo" class="form-label">logo de l'equipe</label>
    <input type="text" placeholder="lion" id="logo" name="logo" class="form-control<?= !isset($formErrors['logo']) ?: 'is-invalid'; ?> " value="<?= @$_POST['logo'] ?>" />
    <div class="invalid-feedback">
    <?= @$formErrors['logo'] ?>
    </div>


    
    <label for="jersey" class="form-label">Maillot de l'equipe</label>
    <input type="text" placeholder="vert" id="jersey" name="jersey" class="form-control<?= !isset($formErrors['jersey']) ?: 'is-invalid'; ?> " value="<?= @$_POST['jersey'] ?>" />
    <div class="invalid-feedback">
    <?= @$formErrors['jersey'] ?>
    </div>
    <input type="submit" value="S'inscrire" class="btn btn-success" />


  <?php require_once 'includes/footer.php'; ?>
</body>
</html>