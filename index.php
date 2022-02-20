<?php

include 'controllers/utils/views.php';
include 'controllers/pages/home_controller.php';
include 'models/routers.php';
include 'models/response.php';
include 'models/request.php';

use models\response\Response;
use models\routers\Router;
use controller\pages\Home;

define('URL', '/');

$obRouter = new Router(URL);

$obRouter->get(
    '/',
    [function () {
        return new Response(200, Home::getHome());
    }]
);
$obRouter->run()->sendResponse();
