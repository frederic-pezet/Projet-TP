
<?php

$users = new users();

if (!empty($_GET['id'])) {
$users->id = $_GET['id']; 
}else {
    header('location:profilUsers.php');
    exit;
}

$userDetail = $users->getUserById();