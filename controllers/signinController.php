<?php

if (isset($_SESSION['username'])) {
    header('location: index.php');
    exit;
    
}

/* Permet de vérifier si la condition est bonne et qu\'elle rentre bien dans la base de données. */
if (count($_POST) > 0) {
    /*Appelle la classe dans la fonction */
    $user = new users();




    if (!empty($_POST['username'])) {
        if (preg_match($regex['username'], $_POST['username'])) {
            $user->username = strtolower(htmlspecialchars($_POST['username']));
        } else {
            $formErrors['username'] = USERS_USERNAME_INVALID;
        }
    } else {
        $formErrors['username'] = USERS_USERNAME_EMPTY;
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
    } 

if(empty($_POST['password'])||!isset($_POST['password'])){
    $formErrors['password'] = USERS_PASSWORD_EMPTY;
}

if(empty($_POST['confirmPassword'])||!isset($_POST['confirmPassword'])){
    $formErrors['confirmPassword'] = USERS_CONFIRMPASSWORD_EMPTY;
}

if(!isset($formErrors['password'])&& !isset($formErrors['confirmPassword'])){
    if($_POST['password'] === $_POST['confirmPassword']){
        $user->password =password_hash($_POST['password'], PASSWORD_DEFAULT); 
    }else{
        $formErrors['password'] = $formErrors['confirmPassword'] = USERS_PASSWORD_INVALID;
    }
}
    
    if (!empty($_POST['mail'])){
        if (preg_match($regex['mails'], $_POST['mail'])) {
            $user->mail =strtolower(htmlspecialchars($_POST['mail']));
        } else{
           $formErrors['mail'] = USERS_MAIL_INVALID;
        }
        } else {
          $formErrors['mail'] = USERS_MAIL_EMPTY;
    }

 if (!empty($_POST['confirmMail'])){
        if (preg_match($regex['confirm'], $_POST['confirmMail'])) {
            $user->mail =strtolower(htmlspecialchars($_POST['confirmMail']));
        } else{
           $formErrors['confirmMail'] = USERS_CONFIRMMAIL_INVALID;
        }
        } else {
          $formErrors['confirmMail'] = USERS_CONFIRMMAIL_EMPTY;
    }
    
    if (count($formErrors)==0){
        $user->addUser();
    }

}


