<?php

namespace controller\page;

use controller\PageController;
use lib\helpers\Views;
use models\entity\Organization;

/* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por retornar o conteúdo da view da pagina Novo Cadastro
--------------------------------------------------------------------------------------------------------------------------------*/

class CadastroController extends PageController
{
    public static function getNovo()
    {
        $obOrganization = new Organization;
        $content = Views::render('pages/novo', ['total' => $obOrganization->total, 'novos' => $obOrganization->novos]);
        return parent::getPage('Cadastrar Clientes', $content);
    }
}
