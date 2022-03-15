<?php

namespace lib\database;

use \PDO;
use PDOException;

class Database
{

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
            $this->connection = new PDO('mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASS'));
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
*                     Método responsavel por consultar no banco de dados
--------------------------------------------------------------------------------------------------------------------------------*/
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? 'WHERE' . $where : '';
        $order = strlen($order) ? 'ORDER BY' . $order : '';
        $limit = strlen($limit) ? 'LIMIT' . $limit : '';


        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query);
    }

    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por realizar update no banco de dados
--------------------------------------------------------------------------------------------------------------------------------*/
    public function update($where, $values)
    {
        $fields = array_keys($values);
        $query = "UPDATE" . $this->table . "SET" . implode("=?," . $fields) . "=? WHERE" . $where;
        echo $query;
        exit;
        $this->execute($query . array_values($values));
        return true;
    }



    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por realizar delete no banco de dados
--------------------------------------------------------------------------------------------------------------------------------*/
    public function delete($where)
    {
        $query = "DELETE FROM" . $this->table . "WHERE" . $where;
        $this->execute($query);
        return true;
    }
}
