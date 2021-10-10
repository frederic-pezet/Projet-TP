<?php
$tournament = new tournaments();

// Permet d'associer a la requête pour l'affichage //
$tournamentList = $tournament->getTournamentsList();


if (!empty($_POST['id'])) {
    $tournament->id = $_POST['id'];
    $tournamentDelete = $tournament->deleteTournaments();
} 
