<?php
/**
 * Front controller - every request is routed through here by .htaccess
 */

$config = require dirname(__DIR__) . '/app/bootstrap.php';

$router = new Router();
require APP_PATH . '/routes.php';
$router->dispatch();
