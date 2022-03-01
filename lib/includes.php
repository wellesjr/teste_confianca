<?php

include 'lib/helpers/view.php';
include 'lib/environment.php';
include 'lib/database/database.php';

use lib\helpers\Views;
use lib\Environment;
use lib\database\Database;

Environment::load(__DIR__ . '/../');

Database::config(getenv('DB_HOST'), getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_PORT'));

define('URL', getenv('URL'));

Views::init(['URL' => URL]);
