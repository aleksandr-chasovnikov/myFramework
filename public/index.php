<?php

error_reporting(-1);

use core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WEB', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', dirname(__DIR__) . '/core');
define('APP', dirname(__DIR__) . '/app');
define('LAYOUT', 'default');

require '../libs/functions.php';


spl_autoload_register(
        function($class) {
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';

    if (is_file($file)) {
        require_once $file;
    } else {
        echo "Класс <b>$class</b> не найден";
    }
});

// Маршруты для контроллера Page
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);

// Маршруты для контроллера Page без указания "view"
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// Defaults routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


// Перенаправляет по корректному адресу
Router::dispatch($query);
