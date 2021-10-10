
<?php
// Création d'une nouvelle instance de la classe users //
$users = new users();
// Si la variable GET['id] n'est pas vide nous entrons dans la condition //
if (!empty($_GET['id'])) {
//On instancie l'objet->id grâce au $GET['id] //
$users->id = $_GET['id']; 
}else {
    header('location:users.php');
    exit;
}
// on appelle la méthode getUserById qui me retourne un tableau d'objets contenant les informations de l'utilisateur //
$userDetail = $users->getUserById();