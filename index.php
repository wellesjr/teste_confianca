<?php
// include 'controllers/pages/home_controller.php';
include 'controllers/utils/views.php';
include 'controllers/pages/cadastro_controller.php';

use controller\pages\Home;
use controller\pages\Novo;

echo Novo::getNovo();
