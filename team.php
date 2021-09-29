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
    <div class="mb-3">
    <label for="name" class="form-label">Nom de l'equipe</label>
    <input type="text" placeholder="PSG" id="name" name="name" class="form-control"  />
    <div class="invalid-feedback">
     </div>
     </div>

    <div class= "mb-3">
    <label for="logo" class="form-label">logo de l'equipe</label>
    <input type="text" placeholder="" id="logo" name="logo" class="form-control" />
    <div class="invalid-feedback">
    </div>
    </div>


    <div class="mb-3">
    <label for="jersey" class="form-label">Maillot de l'equipe</label>
    <input type="text" placeholder="" id="jersey" name="jersey" class="form-control" />
    <div class="invalid-feedback">
    </div>
    </div>
    <input type="submit" value="S'inscrire" class="btn btn-success" />


  <?php require_once 'includes/footer.php'; ?>
</body>
</html>