<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');
// $query = preg_quote($query, '/');

require '../core/Router.php';
require '../libs/functions.php';
require '../app/controllers/Main.php';
require '../app/controllers/Posts.php';
require '../app/controllers/PostsNews.php';

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
