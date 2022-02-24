<?php

include 'lib/helpers/routers.php';


use lib\helpers\Router;

define('URL', 'http://localhost/sistema_de_cadastros');

$obRouter = new Router(URL);

include __DIR__ . '/controllers/routes_controller.php';

$obRouter->run()
    ->sendResponse();
