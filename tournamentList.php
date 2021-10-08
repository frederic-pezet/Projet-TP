<?php
require_once 'config.php';
$title = 'Liste des tournois';
require_once 'models/database.php';
require_once 'models/tournamentModel.php';
require_once 'controllers/tournamentsListController.php';
require_once 'includes/header.php';
?>


<table class="table">
    <thead></thead>
    <tbody>
<?php foreach($tournamentList as $tournamentDetails) { ?>
    <tr>
        <td><?= $tournamentDetails->id?></td>
        <td><?= $tournamentDetails->creationDate ?></td>
        <td><?= $tournamentDetails->tournamentDate ?></td>
        <td><?= $tournamentDetails->startInscriptionDate ?></td>
        <td><?= $tournamentDetails->endInscriptionDate ?></td>
        <td><a href="updateTournament.php?id=<?= $tournamentDetails->id ?>">Modifier</a></td>
        <td><button class="text-decoration-none text-danger fw-bold btn" data-bs-toggle="modal" data-bs-target="#testModal" data-bs-id="<?= $tournamentDetails->id ?>" data-bs-username="<?= $tournamentDetails->creationDate. ' ' . $tournamentDetails->tournamentDate?>">Supprimer</button></td>
        
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
            <form action="tournamentList.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="contentModal" id="creationdate" name="creationdate" readonly>
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

        var contentTournamentDate= container.getAttribute('data-bs-tournamentdate')

        var receiverId = exampleModal.querySelector('#id') // l'id de l'endroit où tu veux que tes données apparaissent

        var receiverTournamentDate = exampleModal.querySelector('#tournamentdate')

        receiverId.value = contentId // tu change la valeur de ton input

        receiverUsername.value = contentTournamentDate

    })



</script>

<?php require_once 'includes/footer.php' ?>