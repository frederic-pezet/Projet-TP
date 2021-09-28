<?php
session_start();
$title = 'Inscription';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/usersModel.php';
require_once 'controllers/signinController.php';
require_once 'includes/header.php';
?>
<form action="signin.php" method="POST">

    <label for="username" class="form-label">Nom d'utilisateur</label>
    <input type="text" placeholder="jdupont" id="username" name="username" class="form-control <?= !isset($formErrors['username']) ?: 'is-invalid'; ?>" value="<?= @$_POST['username'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['username'] ?>
    </div>

    <label for="nintendoNetworkUsername" class="form-label">Nom d'utilisateur Nintendo</label>
    <input type="text" placeholder="jdupont" id="nintendoNetworkUsername" name="nintendoNetworkUsername" class="form-control <?= !isset($formErrors['nintendoNetworkUsername']) ?: 'is-invalid'; ?>" value="<?= @$_POST['nintendoNetworkUsername'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['nintendoNetworkUsername'] ?>
    </div>

    <label for="originUsername" class="form-label">Nom d'utilisateur Ordinateur</label>
    <input type="text" placeholder="jdupont" id="originUsername" name="originUsername" class="form-control <?= !isset($formErrors['originUsername']) ?: 'is-invalid'; ?>" value="<?= @$_POST['originUsername'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['originUsername'] ?>
    </div>

    <label for="psnUsername" class="form-label">Nom d'utilisateur Playstation</label>
    <input type="text" placeholder="jdupont" id="psnUsername" name="psnUsername" class="form-control <?= !isset($formErrors['psnUsername']) ?: 'is-invalid'; ?>" value="<?= @$_POST['psnUsername'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['psnUsername'] ?>
    </div>

    <label for="xboxLiveUsername" class="form-label">Nom d'utilisateur Xbox</label>
    <input type="text" placeholder="jdupont" id="xboxLiveUsername" name="xboxLiveUsername" class="form-control <?= !isset($formErrors['xboxLiveUsername']) ?: 'is-invalid'; ?>" value="<?= @$_POST['xboxLiveUsername'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['xboxLiveUsername'] ?>
    </div>

    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" placeholder="*******" id="password" name="password" class="form-control  <?= !isset($formErrors['password']) ?: 'is-invalid'; ?> " value="<?= @$_POST['password'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['password'] ?>
    </div>

    <label for="confirmPassword" class="form-label">Confirmation mot de passe</label>
    <input type="password" placeholder="*******" id="confirmPassword" name="confirmPassword" class="form-control  <?= !isset($formErrors['confirmPassword']) ?: 'is-invalid'; ?> " value="<?= @$_POST['confirmPassword'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['confirmPassword'] ?>
    </div>

    <label for="mail" class="form-label">Adresse mail</label>
    <input type="mail" placeholder="jdupont@mail.com" id="mail" name="mail" class="form-control <?= !isset($formErrors['mail']) ?: 'is-invalid'; ?> " value="<?= @$_POST['mail'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['mail'] ?>
    </div>

    <label for="confirmMail" class="form-label">Confirmation adresse mail</label>
    <input type="mail" placeholder="jdupont@mail.com" id="confirmMail" name="confirmMail" class="form-control <?= !isset($formErrors['confirmMail']) ?: 'is-invalid'; ?> " value="<?= @$_POST['confirmMail'] ?>" />
    <div class="invalid-feedback">
        <?= @$formErrors['confirmMail'] ?>
    </div>



    <input type="submit" value="S'inscrire" class="btn btn-success" />
</form>
<?php require_once 'includes/footer.php'; ?>