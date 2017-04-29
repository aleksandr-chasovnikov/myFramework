<?php

$query = $_SERVER['QUERY_STRING'];

require '../core/Router.php';
require '../libs/functions.php';

Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);

vd(Router::getRoutes());


// FRONT CONTROLLER

// Общие настройки
// ini_set('display_errors',1);
// error_reporting(E_ALL);

// session_start();

// // Подключение файлов системы
// define('ROOT', dirname(__FILE__));
// require_once(ROOT . '/components/Autoload.php');


// // Вызов Router
// $router = new Router();
// $router->run();