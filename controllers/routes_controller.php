<?php

include 'lib/helpers/response.php';
include 'controllers/page/home_controller.php';
include 'controllers/page/novo_controller.php';
include 'controllers/page/editar_controller.php';

use lib\helpers\Response;
use \controller\page\HomeController;
use \controller\page\EditarController;
use \controller\page\CadastroController;


$obRouter->get('/', [function () {
    return new Response(200, HomeController::getHome());
}]);

$obRouter->get('/novo', [function () {
    return new Response(200, CadastroController::getNovo());
}]);

$obRouter->post('/novo', [function ($request) {
    return new Response(200, CadastroController::insertCliente($request));
}]);

$obRouter->get('/editar', [function () {
    return new Response(200, EditarController::insertCadastro());
}]);

$obRouter->post('/editar', [function () {
    return new Response(200, EditarController::insertCadastro());
}]);




/*
*       Rota dinamica 
*       $obRouter->get('/cadastro/{idCadastro}/{acao}', [function ($idCadastro, $acao) {
*       return new Response(200, 'Cadastro ' . $idCadastro . ' - ' . $acao);
*       }]);
*/
