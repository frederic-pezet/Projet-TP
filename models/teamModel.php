<?php

class teams extends database
{
    public $db = NULL;
    public $id = 0;
    public $name = '';
    public $logo = '';
    public $jersey = '';
    public $id_users = 0;


    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function addTeam()
    {
        $query = 'INSERT INTO `f39r6_teams`(`name`, `logo`, `jersey`,`id_users`) 
        VALUES (:name, :logo, :jersey,8)';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':logo', $this->logo, PDO::PARAM_STR);
        $queryExecute->bindValue(':jersey', $this->jersey, PDO::PARAM_STR);
        return $queryExecute->execute();
    }

    public function getTeam()
    {
        $query = 'SELECT name, logo, jersey
        FROM f39r6_teams';
        $queryExecute = $this->db->query($query);
        $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
        return $queryResult;
    }

    public function getTeamsInformations()
    {
        $query = 'SELECT id, name, logo, jersey,id_users
        FROM f39r6_teams 
        WHERE name = :name';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->execute();
        $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
        $this->id = $queryResult->id;
        $this->id_users = $queryResult->id_users;
        return true;
    }

    public function getTeamsById()
    {
        // le DATE_FORMAT permet de transformer la date du format mysql en format francais
        // on recuere une deuxieme fois la date au format mysql pour pouvoir manipuler la date (par exemple pour l'ajouter dans input type date)
        $query = 'SELECT name, logo, jersey
        FROM  f39r6_teams 
        WHERE id = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
        return $queryResult;
    }

public function getTeamsList()
{
    $query = 'SELECT id, name, logo , jersey, id_users
    FROM f39r6_teams';
     $queryExecute = $this->db->query($query);
     $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
     return $queryResult;


}

public function updateTeams()
{
    $query = 'UPDATE f39r6_teams
    SET name = :name , logo = :logo , jersey = :jersey
    WHERE id = :id';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
    $queryExecute->bindValue(':logo', $this->name, PDO::PARAM_STR);
    $queryExecute->bindValue(':jersey', $this->name, PDO::PARAM_STR);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();
}

public function deleteTeams()
{
    $query = 'DELETE FROM  f39r6_teams
    WHERE id = :id';

    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();

}
}