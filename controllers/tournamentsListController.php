<?php
$tournament = new tournaments();

$tournamentList = $tournament->getTournamentsList();


if (!empty($_POST['id'])) {
    $tournament->id = $_POST['id'];
    $tournamentDelete = $tournament->deleteTournaments();
} 
