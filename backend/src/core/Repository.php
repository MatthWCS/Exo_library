<?php

namespace App\Core;

use App\Core\Database;

 use PDO;

 class Repository extends Database {

    private string $entity;


    /* __construct
    * Permet de récuperer l'entité courante
    * @params $Entity
    * ex: User::class
    */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    /* getEntity
    * Permet de récuperer le nom de l'entité courante
    * @return : String de l'entité 
    * ex: User -> App\Entity\User
    */
    public function getEntity() :string
    {
        return $this->entity;
    }


    /* getTable
    * Permet de récuperer le nom de la table
    * @return : String de la table aprés decoupage par \ et mise en minuscule
    * ex: App\Entity\User -> user
    */
    protected function getTable() :string
    {
        $xplodeEntity = explode( '\\', $this->entity);

        return lcfirst( end($xplodeEntity) );
    }


    /* fetch
    * Permet de récuperer un element ou rien
    * @params : - string la requete sql
    *           - array Contenant les parametres
    * @return : object une entité
    * ex: App\Entity\User -> user
    */
    protected function fetch( string $sql, array $params = []) :object|null
    {
        $query = $this->getDb()->prepare( $sql );
        $query->setFetchMode( \PDO::FETCH_CLASS, $this->entity );
        $query->execute($params);
        return $query->fetch();
    }

    /* fetchAll
    * Permet de retourner plusieurs elements ou rien
    * @params : - string la requete sql
    *           - array Contenant le(s) parametre(s)
    * @return : un tableau d'objet ou null
    */
    protected function fetchAll(string $sql, array $params = []) :array|null
    {
        $query = $this->getDb()->prepare( $sql );
        $query->setFetchMode( \PDO::FETCH_CLASS, $this->entity );
        $query->execute( $params );
        return $query->fetchAll();
    }

    /* findAll
    * Permet de retourner tout dans une table
    * @params : rien
    * @return : un tableau d'objet ou null
    */
    public function findAll() :array|null
    {
        $table = $this->getTable();
        $sql = "SELECT * FROM " . $table;
        $query = $this->getDb()->prepare( $sql );
        $query->setFetchMode( PDO::FETCH_CLASS, $this->entity );
        $query->execute();
        
        return $query->fetchAll();
    }
        
        /* find
        * Permet de recherche par l'id
        * @params : rien
        * @return : object ou rien
        */
        public function find($param) :array|null
        {
            $table = $this->getTable();
            $key = array_key_first($param);
            $value = $param[$key];

            $sql = "SELECT * FROM " . $table . " WHERE " . $key . " = :id" ;

            $query = $this->getDb()->prepare( $sql );
            $query->setFetchMode( PDO::FETCH_CLASS, $this->entity );
            $query->execute([':id' => $value]);
            
            return $query->fetchAll();
        }
        

        /* findBy
        * Permet de recherche par un ou plusieurs paramètres autre que l'id
        * @params : array criteria sous forme 'column' => 'valeur'
        * @return : tableau d'entité ou null
        */
        public function findBy( array $criteria ) :array|null
        {
            $sql = "SELECT * FROM" . $this->getTable() . "WHERE ";
            foreach( $criteria as $column => $value )
                {
                    $sql .= $column . " = :" . $column;
                    
                    if( $column !== array_key_last( $criteria ) )
                        {
                            $sql .= ' AND ';
                            }
                            }
                            $query = $this->getDb()->prepare( $sql );
                            $query->setFetchMode( PDO::FETCH_CLASS, $this->entity );
                            $query->execute( $criteria);
                            
                            return $query->fetch();
                            
                            }

     public function update( int|string $id, array $data ) : void
     {
         $table = $this->getTable();

         $sql = "UPDATE ". $table ." SET ";

         foreach( $data as $column => $value )
         {
             $sql .= $column . " = :" . $column;
             if( $column !== array_key_last( $data ) )
             {
                 $sql .= ", ";
             }
         }
         $sql .= " WHERE id = :id";
         $data[':id'] = $id;
         $this->execute($sql, $data);
     }
                            
                            /* insert
                            * Permet d'inserer une entité en base de donnée'
    * @params : array contenant les données à inserer
    * @return : rien
    */
    function insert ( array $data) :array
    {
        // INSERT INTO user (username, email, password) VALUES (:username, :email, :password)
        $sql = "INSERT INTO " . $this->getTable() . " ( ";
        // On récupere les clé du tableau
        $columns = array_keys( $data ); // [ 'col1', 'col2', ..., 'coln' ]
        $columnList = implode(', ', $columns); // col1, col2, ..., coln
        $valueList = ":" . implode( ', :', $columns ); // :col1, :col2, ..., :coln
        $sql .= $columnList . " ) VALUES ( " . $valueList . " )";
        var_dump($sql);
        $this->execute($sql, $data);

        return (["message" => "Book Created"]);
    }



    /* remove
    * Permet d'inserer une entité en base de donnée'
    * @params : array contenant les critéres sous la forme ['param' => 'value']
    * @return : rien
    */
    public function remove( array $criteria) :void
    {
        //DELETE FROM table WHERE qqch = :qqch AND truc = :truc ...
        $sql = "DELETE FROM " . $this.getTable() . " WHERE ";

        foreach( $criteria as $column => $value )
        {
            $sql .= $column . " = :" . $column;

            if( $column !== array_key_last( $criteria ) )
            {
                $sql .= ' AND ';
            }
        }

        $this->execute($sql, $criteria);
        
    }

    /* execute
    * Permet d'executer une requete qui à été construite et avec des données "propre"
    * @params : - string De la requete sql
    *           - array Contenant les parametres
    * @return : rien
    * S'utilise par exemple dans insert et dans ce qui ne necessite pas un fetch
    */
    protected function execute(string $sql, array $params = []) :void
    {
        $query = $this->getDb()->prepare($sql);
        $query->execute($params);
    } 

}

?>