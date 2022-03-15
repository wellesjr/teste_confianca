<?php

include 'lib/helpers/view.php';
include 'lib/environment.php';
include 'lib/database/database.php';

use lib\helpers\Views;
use lib\Environment;
use lib\database\Database;

Environment::load(__DIR__ . '/../');

define('URL', getenv('URL'));

Views::init(['URL' => URL]);
