<?php

namespace controller\utils;

class View
{

    private static function getContentView($view)
    {
        $file = __DIR__ . '../../views/modules/' . $view . '.php';

        return file_exists($file) ? file_get_contents($file) : '';
    }


    public static function render($view, $vars)
    {
        //Conteudo da view
        $contentView = self::getContentView($view);
        $keys = array_keys($vars);
        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $keys);

        // echo '<pre>';
        // print_r($keys);
        // '</pre>';
        // exit;

        return str_replace($keys, array_values($vars), $contentView);
    }
}
