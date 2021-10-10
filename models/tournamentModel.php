<?php
// Création de notre classe users et de la relier à la base de données //
class tournaments extends database
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
    public $creationDate = '';
    public $tournamentDate = '';
    public $startInscriptionDate = '';
    public $endInscriptionDate = '';

    /**
     * Fonction qui se déclenche à l'instanciation de l'objet et qui, ici
     * permet de se connecter à la base de données
     */
    public function __construct()
    {
        $this->db = parent::__construct();
    }
 
    // permet de créer un tournoi et de l'ajouter dans la base de données //
    public function addTournaments()
    {
        // On stocke la requête pour éviter de tout mettre dans le prépare et gagner en lisibilité
        $query = 'INSERT INTO `f39r6_tournaments`(`creationdate`, `tournamentdate`, `startinscriptiondate`,`endinscriptiondate`) 
        VALUES (:creationdate, :tournamentdate, :startinscriptiondate, :endinscriptiondate)';
        // On prépare la requête, elle n'est pas exécutée tout de suite car il manque des informations
        // prepare = bindValue = execute
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':creationdate', $this->creationDate, PDO::PARAM_STR);
        $queryExecute->bindValue(':tournamentdate', $this->tournamentDate, PDO::PARAM_STR);
        $queryExecute->bindValue(':startinscriptiondate', $this->startInscriptionDate, PDO::PARAM_STR);
        $queryExecute->bindValue(':endinscriptiondate', $this->endInscriptionDate, PDO::PARAM_STR);
        return $queryExecute->execute();
    }




    public function getTournamentsById()
    {
        
        $query = 'SELECT id, creationdate,  tournamentdate,  startinscriptiondate,  endinscriptiondate
        FROM  f39r6_tournaments
        WHERE id = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
        return $queryResult;
    }

    // Permet de récupérer toutes les informations des tournois
public function getTournamentsList()
{
    $query = 'SELECT id,  creationDate, tournamentDate , startInscriptionDate,  endInscriptionDate
    FROM f39r6_tournaments';
     $queryExecute = $this->db->query($query);
     $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
     return $queryResult;


}
// Permet de savoir si le tournoi existe
public function checkIfTournamentExistsById()
 {

     $query = 'SELECT COUNT(creationdate) AS count
     FROM f39r6_tournaments
     WHERE id = :id';
     $queryExecute = $this->db->prepare($query);
     $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
     $queryExecute->execute();
     $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
     return $queryResult->count;
 }

 // Permet de modifier le tournoi
public function updateTournaments()
{
    $query = 'UPDATE f39r6_tournaments
    SET creationdate = :creationdate , tournamentdate = :tournamentdate , startinscriptiondate = :startinscriptiondate, endinscriptiondate = :endinscriptiondate
    WHERE id = :id';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':creationdate', $this->creationDate, PDO::PARAM_STR);
    $queryExecute->bindValue(':tournamentdate', $this->tournamentDate, PDO::PARAM_STR);
    $queryExecute->bindValue(':startinscriptiondate', $this->startInscriptionDate, PDO::PARAM_STR);
    $queryExecute->bindValue(':endinscriptiondate', $this->endInscriptionDate, PDO::PARAM_STR);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();
}

//Permet de supprimer un tournoi
public function deleteTournaments()
{
    $query = 'DELETE FROM  f39r6_tournaments
    WHERE id = :id';

    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();

}
}