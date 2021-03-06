<?php

namespace lib\helpers;

class Views
{
    private static $vars = [];


    public static function init($vars = [])
    {
        self::$vars = $vars;
    }
    private static function getContentView($view)
    {
        $file = __DIR__ . '/../../views/modules/' . $view . '.php';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    public static function render($view, $vars = [])
    {
        $contenrView = self::getContentView($view);

        $vars = array_merge(self::$vars, $vars);

        $keys = array_keys($vars);
        $keys = array_map(function ($iten) {
            return '{{' . $iten . '}}';
        }, $keys);

        return str_replace($keys, array_values($vars), $contenrView);
    }
}
