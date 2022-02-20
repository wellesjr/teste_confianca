<?php

namespace controller\pages;

include 'views/modules/home.html';
include 'views/modules/includes/header.html';
include 'views/modules/includes/footer.html';
include 'lib/base.php';


use \controller\utils\Views;
use \lib\Base\Base;
use \views\modules;


/**
 *Responsavel pro retornar o conteudo da home 
 *@return String
 */


class Home
{
    private static function getHeader()
    {
        return Views::render('pages/header', '');
    }
    private static function getFooter()
    {
        return Views::render('pages/footer', '');
    }

    public static function getHome()
    {
        $database = new Base;

        return Views::render(
            'views/modules/home.html',
            [
                'total' => $database->total,
                'novo' => $database->novo,
                'header' == self::getHeader(),
                'header' == self::getFooter(),
            ],

        );
    }
}
