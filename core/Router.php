<?php

/**
 * 
 */
class Router
{
	protected static $routes = [];
	protected static $route = [];

	/**
	 * Заполнение массива $routes
	 * @param
	 * @param
	 */
	public static function add($regexp, $route = [])
	{
		self::$routes[$regexp] = $route; 
	}

	/**
	 * Возращает список маршрутов
	 */
	public static function getRoutes()
	{
		return self::$routes;
	}

	/**
	 * Возращает текущий маршрут
	 */
	public static function getRoute()
	{
		return self::$route;
	}
}