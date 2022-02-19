<?php

namespace controller\pages;

include 'views/modules/editar_cadastro.html';

use \controller\utils\View;

/**
 *Responsavel pro retornar o conteudo da home 
 *@return String
 */


class Novo
{
    public static function getNovo()
    {
        return View::render(
            'views/modules/novo_cadastro.html',
            ['total' => '26', 'novos' => '5']
        );
    }
}
