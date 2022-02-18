<?php

namespace app\controller\pages;

/**
 *Responsavel pro retornar o conteudo da home 
 *@return String
 */

 
class Home
{
    public static function getHome()
    {
        return '../../../resources/view/pages/home_page.html';
    }
}