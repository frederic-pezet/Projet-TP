<?php
require_once 'models/database.php';
require_once 'models/appointmentModel.php';
$title = 'Accueil';
require_once 'includes/header.php';
require_once 'includes/footer.php';
require_once 'controllers/getAppointmentDetails.php';
?>


<div class="container my-5">
    <div class="row justify-content-center">
        <div class="card bgCard" style="width: 30rem;">
            <img src="https://thispersondoesnotexist.com/image" class="card-img-top p-3" alt="photo" />
            <div class="card-body">
                <h5 class="card-title">Nom : <?= $appointmentDetails->lastname ?></h5>
                <h6>Prénom : <?= $appointmentDetails->firstname ?></h6>
                <p class="card-text">Date d'anniversaire : <?= $appointmentDetails->birthdateFR ?></p>
                <p class="card-text">E-mail : <?= $appointmentDetails->mail ?></p>
                <p class="card-text">Téléphone : <?= $appointmentDetails->phone ?></p>
                <p class="card-text">Date de rendez-vous le <?= $appointmentDetails->dateHour ?></p>
                <a href="add-appointment.php?id=<?= $_GET['id'] ?>"><button type="button" class="btn btn-primary">Modifier</button></a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>