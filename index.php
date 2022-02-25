<?php

include 'lib/helpers/routers.php';
include 'lib/helpers/view.php';


use lib\helpers\Router;
use lib\helpers\Views;

define('URL', 'http://localhost/teste_confianca');

Views::init(['URL' => URL]);

$obRouter = new Router(URL);

include __DIR__ . '/controllers/routes_controller.php';

$obRouter->run()
    ->sendResponse();
