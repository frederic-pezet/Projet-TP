<?php
require_once 'models/database.php';
require_once 'models/usersModel.php';
require_once 'config.php';
require_once 'controllers/userListController.php';
$title = 'Liste des utilisateurs';
require_once 'includes/header.php';
?>


<table class="table">
    <thead></thead>
    <tbody>
<?php foreach($usersList as $usersDetails) { ?>
    <tr>
        <td><?= $usersDetails->id?></td>
        <td><?= $usersDetails->username ?></td>
        <td><?= $usersDetails->nintendo_network_username ?></td>
        <td><?= $usersDetails->origin_username ?></td>
        <td><?= $usersDetails->psn_username ?></td>
        <td><?= $usersDetails->password ?></td>
        <td><?= $usersDetails->mail ?></td>
        <td><a href="user.php?id=<?= $usersDetails->id ?>">appuyer ici</a></td>
        <td><button class="text-decoration-none text-danger fw-bold btn" data-bs-toggle="modal" data-bs-target="#testModal" data-bs-id="<?= $usersDetails->id ?>" data-bs-username="<?= $usersDetails->username . ' ' . $usersDetails->nintendo_network_username ?>">Supprimer</button></td>
        
    </tr>
    <?php } ?>
  </tbody>
  

<div class="modal fade" id="testModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment supprimer ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="usersList.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="contentModal" id="username" name="username" readonly>
                        <input type="hidden" class="form-control" id="id" name="id"> <!-- j'utilise cet ID pour reçevoir les données qui sont dans data-bs-test -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-danger">Oui</button>
                </div>
            </form>
        </div>
        </table>

        <script>
    var exampleModal = document.getElementById('testModal') // sert à mettre dans une variable l'Id de la modal
    exampleModal.addEventListener('show.bs.modal', function(event) { // show.bs.modal est un évènement de modal bootstrap

        var container = event.relatedTarget // t'as besoin de ça pour récupérer les données de ton bouton on stocke ça dans une variable. tu peux pas toucher au event.relatedTarget sinon ça marche plus

        var contentId = container.getAttribute('data-bs-id') // on donne à la variable content l'attribut du bouton 

        var contentUsername = container.getAttribute('data-bs-username')

        var receiverId = exampleModal.querySelector('#id') // l'id de l'endroit où tu veux que tes données apparaissent

        var receiverUsername = exampleModal.querySelector('#username')

        receiverId.value = contentId // tu change la valeur de ton input

        receiverUsername.value = contentUsername

    })



</script>

<?php require_once 'includes/footer.php' ?>