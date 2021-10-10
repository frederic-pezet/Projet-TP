<?php
 $tournament = new tournaments();

 if (!empty($_GET['id'])) {
    $tournament->id = $_GET['id'];
    //On stocke dans une variable le résultat de la méthode "checkIfTournamentExists"
    $tournamentExists = $tournament->checkIfTournamentExistsById();
    //Si le retour du count de notre méthode est égal à 0 (donc du tournoi n'existe pas car aucun ID), alors on le redirige
    if ($tournamentExists == 0) {
        //header('location:tournamentList.php');
        exit;
    }
} else {
    //header('location:tournamentList.php');
    //exit;
}


//On déclare le tableau qui va stocker nos messages d'erreurs
$formErrors = [];





    if (isset($_POST['updateTournaments'])) {
    if (!empty($_POST['creationdate'])) {
        if (preg_match($regexTournament['creationdate'], $_POST['creationdate'])) {
            $tournament->creationDate = ($_POST['creationdate']);
        } else {
            $formErrors['creationdate'] = TOURNAMENTS_CREATIONDATE_INVALID;
        }
    } else {
        $formErrors['creationdate'] = TOURNAMENTS_CREATIONDATE_EMPTY;
    }


    
    if (!empty($_POST['tournamentdate'])) {
        if (preg_match($regexTournament['tournamentdate'], $_POST['tournamentdate'])) {
            $tournament->tournamentDate = ($_POST['tournamentdate']);
        } else {
            $formErrors['tournamentdate'] = TOURNAMENTS_TOURNAMENTDATE_INVALID;
        }
    } else {
        $formErrors['tournamentdate'] = TOURNAMENTS_TOURNAMENTDATE_EMPTY;
    }

    
    if (!empty($_POST['startinscriptiondate'])) {
        if (preg_match($regexTournament['startinscriptiondate'], $_POST['startinscriptiondate'])) {
            $tournament->startInscriptionDate = ($_POST['startinscriptiondate']);
        } else {
            $formErrors['startinscriptiondate'] = TOURNAMENTS_STARTINSCRIPTIONDATE_INVALID;
        }
    } else {
        $formErrors['startinscriptiondate'] = TOURNAMENTS_STARTINSCRIPTIONDATE_EMPTY;
    }



    if (!empty($_POST['endinscriptiondate'])) {
        if (preg_match($regexTournament['endinscriptiondate'], $_POST['endinscriptiondate'])) {
            $tournament->endInscriptionDate = ($_POST['endinscriptiondate']);
        } else {
            $formErrors['endinscriptiondate'] = TOURNAMENTS_ENDINSCRIPTIONDATE_INVALID;
        }
    } else {
        $formErrors['endinscriptiondate'] = TOURNAMENTS_ENDINSCRIPTIONDATE_EMPTY;
    }


    if (count($formErrors) == 0) {
        $tournament->UpdateTournaments();
    }
}
    $tournamentDetails = $tournament->getTournamentsById();
