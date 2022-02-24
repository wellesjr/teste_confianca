<?php

namespace controller\page;

include 'models/entity/organization.php';
include 'controllers/page_controller.php';

use lib\helpers\Views;
use models\entity\Organization;
use controller\PageController;

class HomeController extends PageController
{
    public static function getHome()
    {
        $obOrganization = new Organization;
        $content = Views::render('pages/home', ['total' => $obOrganization->total, 'novos' => $obOrganization->novos]);
        return parent::getPage('Início', $content);
    }
}
