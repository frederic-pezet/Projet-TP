<?php


/* Permet de vérifier si la condition est bonne et qu\'elle rentre bien dans la base de données. */
if (count($_POST) > 0) {
    /*Appelle la classe dans la fonction */
    $team = new teams();




    if (!empty($_POST['name'])) {
        if (preg_match($regex['name'], $_POST['name'])) {
            $team->name = strtolower(htmlspecialchars($_POST['name']));
        } else {
            $formErrors['name'] = TEAMS_NAME_INVALID;
        }
    } else {
        $formErrors['name'] = TEAMS_NAME_EMPTY;
    }

    if (!empty($_POST['logo'])) {
        if (preg_match($regex['logo'], $_POST['logo'])) {
            $team->logo = strtolower(htmlspecialchars($_POST['logo']));
        } else {
            $formErrors['logo'] = TEAMS_LOGO_EMPTY;
        }
    } 

    if (!empty($_POST['jersey'])) {
        if (preg_match($regex['jersey'], $_POST['jersey'])) {
            $team->jersey = strtolower(htmlspecialchars($_POST['jersey']));
        } else {
            $formErrors['jersey'] = TEAMS_JERSEY_EMPTY;
        }
       
    } 


    if (count($formErrors)==0){
        $team->addTeam();
    }

}