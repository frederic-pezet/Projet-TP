<?php

/* Permet de vérifier si la condition est bonne et qu\'elle rentre bien dans la base de données. */
if (count($_POST) > 0) {
    /*Appelle la classe dans la fonction */
    $tournament = new tournaments();







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
        $tournament->addTournaments();
    }
}
