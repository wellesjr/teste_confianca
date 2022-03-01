<?php

namespace models\entity;

use lib\database\Database;
use PDO;

class Cadastro
{
    public $id;
    public $nome;
    public $cpf;
    public $cidade;
    public $estado;
    public $telefone;
    public $email;
    public $data;

    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por cadastrar um cliente no banco de dados
--------------------------------------------------------------------------------------------------------------------------------*/

    public function cadastrar()
    {
        $this->data = date('Y-n-d H:i:s');
        $this->id = (new Database('tab_cliente'))->insert([
            'name_cliente' => $this->nome,
            'cpf_cliente' => $this->cpf,
            'cidade_cliente' => $this->cidade,
            'estado_cliente' => $this->estado,
            'telefone_cliente' => $this->telefone,
            'email_cliente' => $this->email,
            'data_do_cadastro' => $this->data
        ]);
        return true;
    }


    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por obter os cadastros no banco de dados
--------------------------------------------------------------------------------------------------------------------------------*/
    public static function getCadastros($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('tab_cliente'))->select($where, $order, $limit, $fields);
    }
}
