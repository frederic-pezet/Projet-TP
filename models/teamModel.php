<?php

class teams extends database
{
    public $db = NULL;
    public $id = 0;
    public $name = '';
    public $logo = '';
    public $jersey = '' ;
    public $id_users = 0;


public function __construct()
{
    $this->db = parent::__construct();
}

public function addTeam()
{
    $query = 'INSERT INTO `f39r6_teams`(`name`, `logo`, `jersey`,) 
    VALUES (:name, :logo, :jersey)';
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

public function 


}