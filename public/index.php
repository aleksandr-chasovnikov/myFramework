<?php

error_reporting(-1);

use core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WEB', __DIR__);
define('ROOT', dirname(__DIR__) );
define('CORE', dirname(__DIR__) . '/core');
define('APP', dirname(__DIR__) . '/app');


require '../libs/functions.php';

spl_autoload_register(function($class) {
	$file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';

	if (is_file($file)) {
		require_once $file;		
	}
});


Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Posts']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

vd(Router::getRoutes());

Router::dispatch($query);
