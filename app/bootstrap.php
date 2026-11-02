<?php
/**
 * Bootstraps the application: constants, config, error handling, autoloading.
 */

define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('VIEW_PATH', APP_PATH . '/views');
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('STORAGE_PATH', ROOT_PATH . '/storage');

$config = require APP_PATH . '/config/config.php';

date_default_timezone_set($config['app']['timezone']);

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', $config['app']['debug'] ? '1' : '0');
ini_set('log_errors', '1');
ini_set('error_log', STORAGE_PATH . '/logs/php-error.log');

// Simple autoloader for app/core classes
spl_autoload_register(function (string $class): void {
    $file = APP_PATH . '/core/' . $class . '.php';
    if (is_file($file)) {
        require $file;
    }
});

require APP_PATH . '/core/helpers.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

return $config;
