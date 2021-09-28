<?php

class users extends database
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
    public $username = '';
    public $nintendo_network_username = NULL;
    public $origin_username = NULL;
    public $psn_username = NULL;
    public $xbox_live_username = NULL;
    public $password = '';
    public $mail = '';
    public $id_roles = 0;
    

    /**
     * Fonction qui se déclenche à l'instanciation de l'objet et qui, ici
     * permet de se connecter à la base de données
     */
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    /**
     * Permet d'ajouter un utilisateur
     *
     * @return bool
     */
    public function addUser() 
    {
        // On stocke la requête pour éviter de tout mettre dans le prépare et gagner en lisibilité
        $query = 'INSERT INTO f39r6_users (username,nintendo_network_username,origin_username,psn_username,xbox_live_username,password,mail,id_roles)
        VALUES (:username,:nintendo_network_username,:origin_username,:psn_username,:xbox_live_username,:password,:mail,3)';
        // On prépare la requête, elle n'est pas exécutée tout de suite car il manque des informations
        // prepare = bindValue = execute
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':username', $this->username, PDO::PARAM_STR);
        $queryExecute->bindValue(':nintendo_network_username', $this->nintendo_network_username, PDO::PARAM_STR);
        $queryExecute->bindValue(':origin_username', $this->origin_username, PDO::PARAM_STR);
        $queryExecute->bindValue(':psn_username', $this->psn_username, PDO::PARAM_STR);
        $queryExecute->bindValue(':xbox_live_username', $this->xbox_live_username, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $queryExecute->execute();
    }

// getHashByUsername() Permet de récuperer le mot de passe grâce au pseudo // 
    public function getHashByUsername()
    {
        $query = 'SELECT password
        FROM f39r6_users
        WHERE username = :username';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':username',$this->username, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

// getUsersInformations() Permet de savoir le rôle de l'utilisateur // 
    public function getUsersInformations()
    {
        $query = 'SELECT id, id_roles
        FROM f39r6_users
        WHERE username = :username';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':username', $this->username, PDO::PARAM_STR);
        $queryExecute->execute();
        $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
        $this->id = $queryResult->id;
        $this->id_roles = $queryResult->id_roles; 
        return true;
    }

   /**
     * Permet de récupérer toutes les informations de l'utilisateur
     *
     * @return object
     */
    public function getUserById()
    {
        // le DATE_FORMAT permet de transformer la date du format mysql en format francais
        // on recuere une deuxieme fois la date au format mysql pour pouvoir manipuler la date (par exemple pour l'ajouter dans input type date)
        $query = 'SELECT username, nintendo_network_username , origin_username, psn_username, xbox_live_username, password, mail, id
        FROM  f39r6_users
        WHERE id = :id';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
        return $queryResult;
    }

    /**
     * Permet de récupérer toutes les informations de tous les utilisateurs
     *
     * @return array
     */
    public function getUsersList()
    {
        $query = 'SELECT id,username, nintendo_network_username , origin_username, psn_username, xbox_live_username, password, mail
        FROM f39r6_users';
         $queryExecute = $this->db->query($query);
         $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
         return $queryResult;


    }

    /**
     * Permet de modifier les informations de l'utilisateur (sauf le mot de passe)
     *
     * @return bool
     */
    public function updateUser()
    {
        $query = 'UPDATE f39r6_users
        SET username = :username, nintendo_network_username = :nintendo_network_username, origin_username = :origin_username, psn_username = :psn_username, xbox_live_username = :xbox_live_username
        WHERE id = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':username', $this->username, PDO::PARAM_STR);
        $queryExecute->bindValue(':nintendo_network_username', $this->nintendo_network_username, PDO::PARAM_STR);
        $queryExecute->bindValue(':origin_username', $this->origin_username, PDO::PARAM_STR);
        $queryExecute->bindValue(':psn_username', $this->psn_username, PDO::PARAM_STR);
        $queryExecute->bindValue(':xbox_live_username', $this->xbox_live_username, PDO::PARAM_STR);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    /**
     * Permet de modifier le mot de passe de l'utilisateur
     */
    public function updatePassword()
    {
        $query = 'UPDATE f39r6_users
        SET password = :password
        WHERE id = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    /**
     * Permet de modifier l'adresse mail de l'utilisateur
     */
    public function updateMail()
    {
        $query = 'UPDATE f39r6_users
        SET mail = :mail
        WHERE id = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':mail',$this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

 //checkIfUserExists() Savoir si l'utilisateur existe deja // 
 public function checkIfUserExists()
 {

     $query = 'SELECT COUNT(username) AS count
     FROM f39r6_users
     WHERE username = :username';
     $queryExecute = $this->db->prepare($query);
     $queryExecute->bindValue(':username', $this->username, PDO::PARAM_STR);
     $queryExecute->execute();
     $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
     return $queryResult->count;
 }

 public function checkIfUserExistsById()
 {

     $query = 'SELECT COUNT(username) AS count
     FROM f39r6_users
     WHERE id = :id';
     $queryExecute = $this->db->prepare($query);
     $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
     $queryExecute->execute();
     $queryResult = $queryExecute->fetch(PDO::FETCH_OBJ);
     return $queryResult->count;
 }
    /**
     * Permet de supprimer un utilisateur
     *
     * @return bool
     */
    public function deleteUser()
    {
        $query = 'DELETE FROM  f39r6_users
        WHERE id = :id';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();

    }
}
