<?php
session_start();
// Permet à l'utilisateur de se déconnecter grâce au bouton déconnexion // 
session_destroy();
session_unset();
header('location:../index.php');
exit;