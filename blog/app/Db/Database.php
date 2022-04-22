<?php

namespace App\Db;

// Depêndencia da classe
use \PDO;
use \PDOException;

class Database {

    /**
     * Conectando o host com a query builder
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do Banco de dados
     * @var string
     */
    const NAME = 'blog';

    /**
     * Usuário do banco de dados
     * @var string
     */
    const USER = 'root';

    /**
     * Password banco de dados
     * @var string
     */
    const PASS = '';

    /**
     * Nome da tabela PDO
     * @var string
     */
    private $table;

    /**
     * instancia de conexão com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia e conexão
     * @param string $table
     */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Com este Método vou criar uma conexão com o banco de dados
     */
    private function setConnection(){
        try{
        $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
        die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Com este método vou executar queries dentro do banco de dados
     * @param  string $query
     * @param  array  $params
     * @return PDOStatement
     */
    public function execute($query,$params = []){
        try{
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
        }catch(PDOException $e){
        die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Método responsável por inserir dados no banco
     * @param  array $values [ field => value ]
     * @return integer ID inserido
     */
    public function insert($values){
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields),'?');

        //MONTA A QUERY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        //EXECUTA O INSERT
        $this->execute($query,array_values($values));

        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }

    /**
     * Método responsável por executar uma consulta no banco
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @param  string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //EXECUTA A QUERY
        return $this->execute($query);
    }

    /**
     * Método responsável por executar atualizações no banco de dados
     * @param  string $where
     * @param  array $values [ field => value ]
     * @return boolean
     */
    public function update($where,$values){
        //DADOS DA QUERY
        $fields = array_keys($values);
        //MONTA A QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        //EXECUTAR A QUERY
        $this->execute($query,array_values($values));

        //RETORNA SUCESSO
        return true;
    }

    /**
     * Com este metodo vou executar o delete do post dentro do banco de dados
     * @param string
     * @return boolean
     */
    public function delete($where){

        // montando a query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //executar a query
        $this->execute($query);

        return true;
    }
}

?>