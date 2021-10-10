<?php
session_start();
if (isset($_SESSION['username'])) {
// Permet à l'utilisateur quand il se connecte d'arriver sur la page d'accueil // 
    header('location: index.php');
    exit;
}
/* Permet de vérifier si la condition est bonne et qu'elle rentre bien dans la base de données. */
if (count($_POST) > 0) {
    /* Permet de savoir où se trouve l'erreur */
    $formErrors = [];
    /* Indique les caracteres a mettre dans le champs */
    $regex['username'] = '/^[a-zA-Z0-9]{3,50}$/';
    /* Appelle la classe dans la fonction */
    $user = new users;

    /* 'empty' C'est la condition qui permet de dire que le champs est vide */ 
    if (!empty($_POST['username'])) {
        
        $user->username = $_POST['username'];
// Va permettre de savoir si l'utilisateur et dans la base de données // 
        if ($user->checkIfUserExists() == 0) {
            $formErrors['username'] = $formErrors['password'] = 'L\'identifiant ou le mot de passe est incorrect';
        }
    } else {
        $formErrors['username'] = 'Le nom d\'utilisateur est obligatoire';
    }
    if (!empty($_POST['password'])) {
        if (!isset($formErrors['username'])) {
            $hash = $user->getHashByUsername();
        // Permet de savoir si le mot de passe est bon //
            if (!password_verify($_POST['password'], $hash->password)) {
                $formErrrors['username'] = $formErrors['password'] = 'L\'identifiant ou le mot de passe est incorrect';
            }
        }
    } else {
        $formErrors['password'] = 'Le mot de passe est obligatoire';
    }
        /* 'count' Compte tous les éléments d'un tableau ou quelque chose d'un objet */
    if (count($formErrors) == 0) {
        $user->getUsersInformations();
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
        // Permet de savoir le rôle de l'utilisateur quand il va rentrer ses informations //
        $_SESSION['id_roles'] = $user->id_roles;
        header('location: index.php');
        exit;


        
        
    }
}
