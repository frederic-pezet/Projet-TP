<?php

class database
{
    protected $db = NULL;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:54.31.71.121=localhost;dbname=footlif;charset=utf8', 'root', 'frederic25');
            return $this->db;
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
}
