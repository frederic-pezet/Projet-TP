<?php
$formErrors = [];
$regex = [
    'username' =>'/^[a-zA-Z0-9]{2,50}$/',
    'mails' => '/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)+$/',
    'confirm' => '/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)+$/',
    'nintendoNetworkUsername'=> '/^[a-zA-Z0-9]{2,50}$/',
    'originUsername'=> '/^[a-zA-Z0-9]{2,50}$/',
    'psnUsername'=> '/^[a-zA-Z0-9]{2,50}$/',
    'xboxLiveUsername'=> '/^[a-zA-Z0-9]{2,50}$/',
];

define('USERS_USERNAME_EMPTY','Le nom d\'utilisateur est obligatoire.');
define('USERS_USERNAME_INVALID','Le nom d\'utilisateur doit comporter que des lettres et chiffres');


define('USERS_MAIL_EMPTY','adresse mail obligatoire.');
define('USERS_MAIL_INVALID','adresse mail non valable');


define('USERS_CONFIRMMAIL_EMPTY','confirmation de l\'adresse mail obligatoire.');
define('USERS_CONFIRMMAIL_INVALID','confirmation de l\'adresse mail non compatible');


define('USERS_PASSWORD_EMPTY','mot de passe obligatoire.');
define('USERS_PASSWORD_INVALID','les mots de passes sont pas égaux');


define('USERS_CONFIRMPASSWORD_EMPTY','confirmation du mot de passe obligatoire.');


define('USERS_NINTENDONETWORKUSERNAME_INVALID','pseudo incorrect.');

define('USERS_ORIGINUSERNAME_INVALID','pseudo incorrect');

define('USERS_PSNUSERNAME_INVALID','pseudo incorrect');

define('USERS_XBOXLIVEUSERNAME_INVALID','pseudo incorrect');

$formErrors = [];
$regex = [

'groupeName'=> '/^[a-zA-Z0-9]{2,50}$/',

];

define('COMPOSITIONS_GROUPENAME_INVALID','nom d\'équipes incorrect.');

define('COMPOSITIONS_GROUPENAME_EMPTY','nom de l\'équipes obligatoire.');
