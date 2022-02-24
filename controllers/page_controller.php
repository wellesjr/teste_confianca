<?php

namespace controller;

include 'lib/helpers/view.php';

use lib\helpers\Views;

class PageController
{
    public static function getHeader()
    {
        return Views::render('includes/header');
    }
    public static function getFooter()
    {
        return Views::render('includes/footer');
    }

    public static function getPage($title, $content)
    {
        return Views::render('template', [
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter()
        ]);
    }
}
