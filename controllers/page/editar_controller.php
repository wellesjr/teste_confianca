<?php

namespace controller\page;

use controller\PageController;
use lib\helpers\Views;
use models\entity\Organization;

class EditarController extends PageController
{
    public static function getEditar()
    {
        $obOrganization = new Organization;
        $content = Views::render('pages/editar', ['total' => $obOrganization->total, 'novos' => $obOrganization->novos]);
        return parent::getPage('Editar Cadastro', $content);
    }
}