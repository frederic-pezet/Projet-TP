<?php

class compositions extends database
{

    /**
     * Etape 1 : Créer les attributs (colonnes de la base de données + db)
     * visibilité (public, private, protected) $nom_de_l'attribut = valeur par défaut
     ** public : utilisable dans la classe et appelable de l'extérieur
     ** private : utilisable uniquement dans la classe
     ** protected : utilisable dans la classe ET dans ses enfants
     */
    public $db = NULL;
    public $id = 0;
    public $groupe_name= '';
    public $id_teams = 0;
    public $id_users =0;
    public $id_tournaments = 0;


    public function __construct()
    {
        $this->db = parent::__construct();
    }


    public function addCompositions()
    {
        $query ='INSERT INTO f39r6_teamscompositionfortournaments (groupeName, id_teams, id_users, id_tournaments)
        VALUES (:groupeName, :id_teams, :id_users, :id_tournaments)';
         $queryExecute = $this->db->prepare($query);
         $queryExecute->bindValue(':groupeName', $this->groupe_name, PDO::PARAM_STR);
         return $queryExecute->execute();
    }

    public function getCompositionInformations()
    {
        $query = 'SELECT id, id_teams, id_users, id_tournaments
        FROM f39r6_teamscompositionfortournaments 
        WHERE groupeName = :groupeName';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':groupeName', $this->groupe_name, PDO::PARAM_STR);
        $queryExecute->execute();
        $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
        $this->id = $queryResult->id;
        $this->id_teams = $queryResult->id_teams; 
        $this->id_users = $queryResult->id_users; 
        $this->id_tournaments = $queryResult->id_tournaments; 
        return true;
    }

    public function getCompositionById()
    {
        // le DATE_FORMAT permet de transformer la date du format mysql en format francais
        // on recuere une deuxieme fois la date au format mysql pour pouvoir manipuler la date (par exemple pour l'ajouter dans input type date)
        $query = 'SELECT groupeName, id_teams, id_users, id_tournaments, id
        FROM  f39r6_teamscompositionfortournaments 
        WHERE id = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
        return $queryResult;
    }

    public function getCompositionList()
    {
        $query = 'SELECT id,groupeName, id_teams, id_users, id_tournaments
        FROM f39r6_teamscompositionfortournaments';
         $queryExecute = $this->db->query($query);
         $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
         return $queryResult;


    }

    public function updateComposition()
    {
        $query = 'UPDATE f39r6_teamscompositionfortournaments
        SET groupeName = :groupeName
        WHERE id = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':groupeName', $this->groupe_name, PDO::PARAM_STR);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function deleteComposition()
    {
        $query = 'DELETE FROM  f39r6_teamscompositionfortournaments
        WHERE id = :id';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();

    }
}