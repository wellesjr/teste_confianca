<?php

namespace lib\database;

use lib\Environment;
use \PDO;
use PDOException;

class Database
{
    public static function config($dbhost, $dbname, $dbuser, $dbpass, $dbport)
    {

        define('DB_HOST', $dbhost);
        define('DB_NAME', $dbname);
        define('DB_USER', $dbuser);
        define('DB_PASS', $dbpass);
        define('DB_PORT', $dbport);
    }

    const DB_HOST = '127.0.0.1';
    const DB_NAME = 'teste_confianca';
    const DB_USER = 'root';
    const DB_PASS = '743639';
    const DB_PORT = '3306';
    private $connection;
    private $table;

    public function __construct($table = null)
    {

        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR:' . $e->getMessage());
        }
    }


    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Executa as querys no banco de dados
--------------------------------------------------------------------------------------------------------------------------------*/
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare(($query));
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR:' . $e->getMessage());
        }
    }



    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por inserir os dados no banco de dados
--------------------------------------------------------------------------------------------------------------------------------*/
    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //Monta a Query
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(' , ', $fields) . ') VALUES (' . implode(' , ', $binds) . ')';
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }




    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por realizar consultar no banco de dados
--------------------------------------------------------------------------------------------------------------------------------*/
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? 'WHERE' . $where : '';
        $order = strlen($order) ? 'ORDER BY' . $order : '';
        $limit = strlen($limit) ? 'LIMIT' . $limit : '';


        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query);
    }
}
