<?php

// On instancie un objet (copie de l'objet en fonction du modèle)
$user = new users();
// On stocke dans une variable le retour de la méthode
$usersList = $user->getUsersList();

if (!empty($_POST['id'])) {
    $user->id = $_POST['id'];
    $userDelete = $user->deleteUser();
} 

$usersList = $user->getUsersList();

