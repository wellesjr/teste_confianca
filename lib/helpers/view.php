<?php

namespace lib\helpers;

class Views
{

    private static function getContentView($view)
    {
        $file = __DIR__ . '/../../views/modules/' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    public static function render($view, $vars = [])
    {
        $contenrView = self::getContentView($view);

        $keys = array_keys($vars);
        $keys = array_map(function ($iten) {
            return '{{' . $iten . '}}';
        }, $keys);

        return str_replace($keys, array_values($vars), $contenrView);
    }
}
