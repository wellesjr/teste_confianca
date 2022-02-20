<?php

namespace controller\pages;

use controller\utils\Views;

/**
 *Responsavel pro retornar o conteudo da home 
 *@return String
 */
class Page
{
    public static function getPage($total, $novo)
    {
        return Views::render('/modules/home', [
            'total' => $total,
            'novos' => $novo
        ]);
    }
}
