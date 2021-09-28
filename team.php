<?php
session_start();
$title = 'Inscription de votre equipe';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/teamModel.php';
require_once 'controllers/teamController.php';
require_once 'includes/header.php';
?>


<form>
  <label>
    <p class="label-txt">Nom de l'equipe</p>
    <input type="text" class="input">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">Logo de l'equipe</p>
    <input type="text" class="input">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">Mailot de l'equipe</p>
    <input type="text" class="input">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <button type="submit"></button>
</form>

  <?php require_once 'includes/footer.php'; ?>
</body>
</html>