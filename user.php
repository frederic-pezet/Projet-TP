<?php
require_once 'models/database.php';
require_once 'models/usersModel.php';
$title = '';
require_once 'includes/header.php';
require_once 'controllers/getUserController.php';
?>


<div class="container my-5">
    <div class="row justify-content-center">
        <div class="card bgCard" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $userDetail->username ?></h5>
                <h6><?= $userDetail->nintendo_network_username ?></h6>
                <p class="card-text"><?= $userDetail->origin_username ?></p>
                <p class="card-text"><?= $userDetail->psn_username ?></p>
                <p class="card-text"><?= $userDetail->xbox_live_username ?></p>
                <p class="card-text"><?= $userDetail->mail ?></p>
                <ul>
                <a href="updateUsers.php?id=<?= $userDetail->id ?>" class="btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php';?>