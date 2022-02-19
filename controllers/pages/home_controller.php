<?php

namespace controller\pages;

include 'views/modules/home.html';

use \controller\utils\View;

/**
 *Responsavel pro retornar o conteudo da home 
 *@return String
 */


class Home
{
    public static function getHome()
    {
        return View::render(
            'views/modules/home.html',
            ['total' => '26', 'novos' => '5']


        );
    }
}
