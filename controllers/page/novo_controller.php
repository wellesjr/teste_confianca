<?php

namespace controller\page;

include 'models/entity/cadastro.php';

use controller\PageController;
use lib\helpers\Views;
use models\entity\Cadastro;

class CadastroController extends PageController
{

    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por retornar o conteúdo da view da pagina Novo Cadastro
--------------------------------------------------------------------------------------------------------------------------------*/
    public static function getNovo()
    {
        $content = Views::render('pages/novo');
        return parent::getPage('Cadastrar Clientes', $content);
    }


    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por cadastrar um Cliente
--------------------------------------------------------------------------------------------------------------------------------*/
    public static function insertCliente($request)
    {
        $postVars = $request->getPostVars();
        $obCadastro = new Cadastro;
        $obCadastro->nome = $postVars['name_cliente'];
        $obCadastro->cpf = $postVars['cpf_cliente'];
        $obCadastro->cidade = $postVars['cidade_cliente'];
        $obCadastro->estado = $postVars['estado_cliente'];
        $obCadastro->telefone = $postVars['telefone_cliente'];
        $obCadastro->email = $postVars['email_cliente'];
        $obCadastro->cadastrar();

        echo '<script language="javascript">';
        echo 'alert("O cadastro foi realizado com sucesso")';
        echo '</script>';
        return self::getNovo();
    }

    
}
