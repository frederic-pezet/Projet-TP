<?php

$user = new users();
if (!empty($_GET['id'])) {
    $user->id = $_GET['id'];
    //On stocke dans une variable le résultat de la méthode "CheckIfUserExistsById"
    $userExists = $user->checkIfUserExistsById();
    //Si le retour du count de notre méthode est égal à 0 (donc notre user n'existe pas car aucun ID), alors on le redirige
    if ($userExists == 0) {
        //header('location:usersList.php');
        exit;
    }
} else {
    //header('location:usersList.php');
    //exit;
}


//On déclare le tableau qui va stocker nos messages d'erreurs
$formErrors = [];



// Permet de faire la modification des informations de l'utilisateur // 
if (isset($_POST['updateInfos'])) {
    

    if (!empty($_POST['username'])) {
        if (preg_match($regex['username'], $_POST['username'])) {
            $user->username = strtolower(htmlspecialchars($_POST['username']));
        } else {
            $formErrors['username'] = USERS_USERNAME_INVALID;
        }
    }

    if (!empty($_POST['nintendoNetworkUsername'])) {
        if (preg_match($regex['nintendoNetworkUsername'], $_POST['nintendoNetworkUsername'])) {
            $user->nintendo_network_username = strtolower(htmlspecialchars($_POST['nintendoNetworkUsername']));
        } else {
            $formErrors['nintendoNetworkUsername'] = USERS_NINTENDONETWORKUSERNAME_INVALID;
        }
    }

    if (!empty($_POST['originUsername'])) {
        if (preg_match($regex['originUsername'], $_POST['originUsername'])) {
            $user->origin_username = strtolower(htmlspecialchars($_POST['originUsername']));
        } else {
            $formErrors['originUsername'] = USERS_ORIGINUSERNAME_INVALID;
        }
    }

    if (!empty($_POST['psnUsername'])) {
        if (preg_match($regex['psnUsername'], $_POST['psnUsername'])) {
            $user->psn_username = strtolower(htmlspecialchars($_POST['psnUsername']));
        } else {
            $formErrors['psnUsername'] = USERS_PSNUSERNAME_INVALID;
        }
    }

    if (!empty($_POST['xboxLiveUsername'])) {
        if (preg_match($regex['xboxLiveUsername'], $_POST['xboxLiveUsername'])) {
            $user->xbox_live_username = strtolower(htmlspecialchars($_POST['xboxLiveUsername']));
        } else {
            $formErrors['xboxLiveUsername'] = USERS_XBOXLIVEUSERNAME_INVALID;
        }
        if (count($formErrors) == 0) {
            $user->updateUser();
        }
    }
}


//-------------------------------------------------------
// La boucle principale permet d'assurer qu'il y a au moins un champs du tableau POST (qui stocke les valeurs de nos champs) qui est rempli

// On appelle la classe patients qu'on a créé dans notre model
// Cette boucle fait en sorte que si on a entré une valeur dans l'input 'lastname' alors on va la comparer à la regex associée
// Si la valeur correspond à la regex, alors on entre la valeur entrée dans le champs dans la colonne correspondante
// "strtoupper" permet de mettre en lettre capitale la donnée qui va entrer dans la base de donnée

if (isset($_POST['updatePassword'])) {
    

    if (empty($_POST['password']) || !isset($_POST['password'])) {
        $formErrors['password'] = USERS_PASSWORD_EMPTY;
    }

    if (empty($_POST['confirmPassword']) || !isset($_POST['confirmPassword'])) {
        $formErrors['confirmPassword'] = USERS_CONFIRMPASSWORD_EMPTY;
    }

    if (!isset($formErrors['password']) && !isset($formErrors['confirmPassword'])) {
        if ($_POST['password'] === $_POST['confirmPassword']) {
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $formErrors['password'] = $formErrors['confirmPassword'] = USERS_PASSWORD_INVALID;
        }
        if (count($formErrors) == 0) {
            $user->updatePassword();
        }
    }
}


if (isset($_POST['updateMail'])) {
    
    if (!empty($_POST['mail'])) {
        if (preg_match($regex['mails'], $_POST['mail'])) {
            $user->mail = strtolower(htmlspecialchars($_POST['mail']));
        } else {
            $formErrors['mail'] = USERS_MAIL_INVALID;
        }
    } else {
        $formErrors['mail'] = USERS_MAIL_EMPTY;
    }

    if (!empty($_POST['confirmMail'])) {
        if (preg_match($regex['confirm'], $_POST['confirmMail'])) {
            $user->mail = strtolower(htmlspecialchars($_POST['confirmMail']));
        } else {
            $formErrors['confirmMail'] = USERS_CONFIRMMAIL_INVALID;
        }
    } else {
        $formErrors['confirmMail'] = USERS_CONFIRMMAIL_EMPTY;
    }

    if (count($formErrors) == 0) {
        $user->updateMail();
    }
}


// Permet d'afficher les information existantes afin de les modifier //
$userDetail = $user->getUserById();
