<?php

class tournaments extends database
{
    public $db = NULL;
    public $id = 0;
    public $creationDate = '';
    public $tournamentDate = '';
    public $startInscriptionDate = '';
    public $endInscriptionDate = '';


    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function addTournaments()
    {
        $query = 'INSERT INTO `f39r6_tournaments`(`creationdate`, `tournamentdate`, `startinscriptiondate`,`endinscriptiondate`) 
        VALUES (:creationdate, :tournamentdate, :startinscriptiondate, :endinscriptiondate)';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':creationdate', $this->creationDate, PDO::PARAM_STR);
        $queryExecute->bindValue(':tournamentdate', $this->tournamentDate, PDO::PARAM_STR);
        $queryExecute->bindValue(':startinscriptiondate', $this->startInscriptionDate, PDO::PARAM_STR);
        $queryExecute->bindValue(':endinscriptiondate', $this->endInscriptionDate, PDO::PARAM_STR);
        return $queryExecute->execute();
    }

    public function getTournaments()
    {
        $query = 'SELECT DATE_FORMAT(creationdate,"%d/%m/%Y ") AS creationdate, DATE_FORMAT(tournamentdate,"%d/%m/%Y ") AS tournamentdate, DATE_FORMAT(startinscriptiondate,"%d/%m/%Y ") AS startinscriptiondate,DATE_FORMAT(endinscriptiondate,"%d/%m/%Y ") AS endinscriptiondate
        FROM f39r6_tournaments';
        $queryExecute = $this->db->query($query);
        $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
        return $queryResult;
    }

    public function getTournamentsInformations()
    {
        $query = 'SELECT id, DATE_FORMAT(creationdate,"%d/%m/%Y ") AS creationdate, DATE_FORMAT(tournamentdate,"%d/%m/%Y ") AS tournamentdate, DATE_FORMAT(startinscriptiondate,"%d/%m/%Y ") AS startinscriptiondate,DATE_FORMAT(endinscriptiondate,"%d/%m/%Y ") AS endinscriptiondate
        FROM f39r6_tournaments 
        WHERE creationdate = :creationdate
        OR tournamentdate = :tournamentdate';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':creationdate', $this->creationDate, PDO::PARAM_STR);
        $queryExecute->bindValue(':tournamentdate', $this->tournamentDate, PDO::PARAM_STR);
        $queryExecute->execute();
        $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
        $this->id = $queryResult->id;
        return true;
    }

    public function getTournamentsById()
    {
        // le DATE_FORMAT permet de transformer la date du format mysql en format francais
        // on recuere une deuxieme fois la date au format mysql pour pouvoir manipuler la date (par exemple pour l'ajouter dans input type date)
        $query = 'SELECT  DATE_FORMAT(creationdate,"%d/%m/%Y" ) AS creationdate, DATE_FORMAT(tournamentdate,"%d/%m/%Y ") AS tournamentdate, DATE_FORMAT(startinscriptiondate,"%d/%m/%Y ") AS startinscriptiondate, DATE_FORMAT(endinscriptiondate,"%d/%m/%Y ") AS endinscriptiondate
        FROM  f39r6_teams 
        WHERE id = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
        return $queryResult;
    }

public function getTournamentsList()
{
    $query = 'SELECT id, DATE_FORMAT(creationdate,"%d/%m/%Y ") AS creationdate, DATE_FORMAT(tournamentdate,"%d/%m/%Y ") AS tournamentdate , DATE_FORMAT(startinscriptiondate,"%d/%m/%Y ") AS startinscriptiondate,DATE_FORMAT(endinscriptiondate,"%d/%m/%Y ") AS endinscriptiondate
    FROM f39r6_teams';
     $queryExecute = $this->db->query($query);
     $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
     return $queryResult;


}

public function updateTournaments()
{
    $query = 'UPDATE f39r6_teams
    SET creationdate = :creationdate , tournamentdate = :tournamentdate , startinscriptiondate = :startinscriptiondate, endinscriptiondate = :endinscriptiondate
    WHERE id = :id';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':creationdate ', $this->creationDate, PDO::PARAM_STR);
    $queryExecute->bindValue(':tournamentdate', $this->tournamentDate, PDO::PARAM_STR);
    $queryExecute->bindValue(':startinscriptiondate', $this->startInscriptionDate, PDO::PARAM_STR);
    $queryExecute->bindValue(':endinscriptiondate', $this->endInscriptionDate, PDO::PARAM_STR);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();
}

public function deleteTournaments()
{
    $query = 'DELETE FROM  f39r6_tournaments
    WHERE id = :id';

    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();

}
}