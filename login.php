<?php


require_once 'models/database.php';
require_once 'models/usersModel.php';
require_once 'controllers/loginController.php';
require_once 'includes/header.php';
?>

<h1 class="mb-5 text-center">Connexion</h1>

<?php if (isset($formErrors['db'])) { ?>
    <div class="alert alert-danger" role="alert">
        <?=$formErrors['db'] ?>
</div>
<?php } else { ?>
 <?php if (isset($success)) { ?>
 <div class="alert alert-success" role="alert">
     <?=$success ?>
 </div>
 <?php } ?>
 <?php } ?>
 
<div class="container">
 <form action="login.php" method="POST"> 
    <div class="mb-3">
        <label for="username" class="form-label">Nom d'utilisateur</label>
        <input type="text" class="form-control" <?= !isset($formErrors['username']) ?: 'is-invalid' ?> id="username" placeholder="ex: jdupont" name="username" value="<?= @$_POST['username'] ?>" required/>
        <small class="invalid-feedback"></small>
        <?= @$formErrors['username'] ?>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" <?= !isset($formErrors['password']) ?: 'is-invalid' ?> id="password" placeholder="********" name="password" value="<?= @$_POST['password'] ?>" required/>
        <small class="invalid-feedback"></small>
        <?= @$formErrors['password'] ?>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-outline-success" value="Connexion" />
    </div>
</div>
</form>
</body>
</html>

