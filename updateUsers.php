<?php

require_once 'config.php';
require_once 'models/database.php';
require_once 'models/usersModel.php';
require_once 'controllers/updateUsersController.php';
$title = 'Modification du profil';
require_once 'includes/header.php';
?>
<div class="row">
    <div class="col-12">
        <form method="POST" action="updateUsers.php?id=<?= $userDetail->id ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" placeholder="jdupont" name="username" class="form-control <?= !empty($formErrors['username']) ? 'is-invalid' : '';?>" id="username" value="<?= $userDetail->username ?>" />
                <small class="invalid-feedback"><?= @$formErrors['username']; ?></small>
            </div>
            <div class="mb-3">
                <label for="nintendoNetworkUsername" class="form-label">Nom d'utilisateur Nintendo</label>
                <input type="text" placeholder="jdupont" name="nintendoNetworkUsername" class="form-control <?= !empty($formErrors['nintendoNetworkUsername']) ? 'is-invalid' : '';?>" id="nintendoNetworkUsername" value="<?= $userDetail->nintendo_network_username ?>" />
                <small class="invalid-feedback"><?= @$formErrors['nintendoNetworkUsername']; ?></small>
            </div>
            <div class="mb-3">
                <label for="originUsername" class="form-label">Nom d'utilisateur Ordinateur</label>
                <input type="text" placeholder="jdupont" name="originUsername" class="form-control <?= !empty($formErrors['originUsername']) ? 'is-invalid' : ''; ?>" id="originUsername" value="<?= $userDetail->origin_username ?>" />
                <small class="invalid-feedback"><?= @$formErrors['originUsername']; ?></small>
            </div>

            <div class="mb-3">
                <label for="psnUsername" class="form-label">Nom d'utilisateur Playstation</label>
                <input type="text" placeholder="jdupont" name="psnUsername" class="form-control <?= !empty($formErrors['psnUsername']) ? 'is-invalid' : '';?>" id="psnUsername" value="<?= $userDetail->psn_username ?>" />
                <small class="invalid-feedback"><?= @$formErrors['psnUsername']; ?></small>
            </div>

            <div class="mb-3">
                <label for="xboxLiveUsername" class="form-label">Nom d'utilisateur Xbox</label>
                <input type="text" placeholder="jdupont" name="xboxLiveUsername" class="form-control <?= !empty($formErrors['xboxLiveUsername']) ? 'is-invalid' : '';?>" id="xboxLiveUsername" value="<?= $userDetail->xbox_live_username ?>" />
                <small class="invalid-feedback"><?= @$formErrors['xboxLiveUsername']; ?></small>
            </div>
            <input type="submit" class="btn btn-primary" name="updateInfos" value="Modifier" />
        </form>


        <form method="POST" action="updateUsers.php?id=<?= $userDetail->id ?>">
            <div class="mb-3">
                <label for="password" class="form-label">Modification du mot de passe</label>
                <input type="password" placeholder="*******" name="password" class="form-control <?= !empty($formErrors['password']) ? 'is-invalid' : '';?>" id="password" value="<?= @$_POST['password'] ?>" />
                <small class="invalid-feedback"><?= @$formErrors['password']; ?></small>
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label"> Confirmation du nouveau mot de passe</label>
                <input type="password" placeholder="*******" name="confirmPassword" class="form-control <?= !empty($formErrors['confirmPassword']) ? 'is-invalid' : '';?>" id="confirmPassword" value="<?= @$_POST['confirmPassword'] ?>" />
                <small class="invalid-feedback"><?= @$formErrors['confirmPassword']; ?></small>
            </div>
            <input type="submit" class="btn btn-primary" name="updatePassword" value="Modifier" />
        </form>


        <form method="POST" action="updateUsers.php?id=<?= $userDetail->id ?>">
            <div class="mb-3">
                <label for="mail" class="form-label">Adresse mail</label>
                <input type="email" placeholder="michel.mathias@exemple.com" name="mail" class="form-control <?= !empty($formErrors['mail']) ? 'is-invalid' : '';?>" id="mail" value="<?= $userDetail->mail ?>" />
                <small class="invalid-feedback"><?= @$formErrors['mail']; ?></small>
            </div>

            <div class="mb-3">
                <label for="mail" class="form-label">Confirmation de L'adresse mail </label>
                <input type="email" placeholder="michel.mathias@exemple.com" name="confirmMail" class="form-control <?= !empty($formErrors['confirmMail']) ? 'is-invalid' : '';?>" id="confirmMail" value="<?= $userDetail->mail ?>" />
                <small class="invalid-feedback"><?= @$formErrors['confirmMail']; ?></small>
            </div>

            <input type="submit" class="btn btn-primary" name="updateMail" value="Modifier" />
        </form>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>