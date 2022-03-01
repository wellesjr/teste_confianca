<?php

require __DIR__ . '/lib/includes.php';
include 'lib/helpers/routers.php';

use lib\helpers\Router;

$obRouter = new Router(URL);

include __DIR__ . '/controllers/routes_controller.php';

$obRouter->run()
    ->sendResponse();
