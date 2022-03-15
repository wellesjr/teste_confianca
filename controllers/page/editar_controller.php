<?php

namespace controller\page;

use controller\PageController;
use lib\helpers\Views;
use models\entity\Cadastro;

class EditarController extends PageController
{
    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Obtem a redenização dos cadastros para a página
--------------------------------------------------------------------------------------------------------------------------------*/
    private static function getEditItems()
    {
        $cadastros = '';
        $results = Cadastro::getCadastros(null, ' id_cliente DESC');

        while ($obCadastros = $results->fetchObject(Cadastro::class)) {
            $cadastros .= Views::render('includes/cadastros', [
                'id' => $obCadastros->id_cliente,
                'nome' => $obCadastros->name_cliente,
                'cpf' => $obCadastros->cpf_cliente,
                'cidade' => $obCadastros->cidade_cliente,
                'telefone' => $obCadastros->telefone_cliente,
                'email' => $obCadastros->email_cliente,

            ]);
        }
        return $cadastros;
    }



    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por retornar o conteúdo da view da pagina Editar
--------------------------------------------------------------------------------------------------------------------------------*/
    public static function getEditar()
    {

        $content = Views::render('pages/editar', ['cadastros' => self::getEditItems()]);

        return parent::getPage('Editar Cadastro', $content);
    }

    public static function insertCadastro()
    {
        return self::getEditar();
    }
}
