<?php

namespace core;

/**
 * 
 */
class Router
{
	/**
	 * Таблица маршрутов
	 * @var array
	 */
	protected static $routes = [];

	/**
	 * Текущий маршрут
	 * @var array
	 */
	protected static $route = [];

	/**
	 * Добавляет маршрут в таблицу маршрутов
	 * @param stirng $regexp регулярное выражение маршрута
	 * @param array $route маршрут
	 */
	public static function add($regexp, $route = [])
	{
		self::$routes[$regexp] = $route; 
	}

	/**
	 * Возращает список шаблонов для маршрутов
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

	/**
	 * Ищет совпадения с маршрутами
	 * @param string $url (строка запроса)
	 * @return boolean
	 */
	public static function matchRoute($url)
	{
		foreach(self::$routes as $pattern => $route) {

			if (preg_match("#$pattern#i", $url, $matches)) {

				foreach ($matches as $k => $v) {

					if (!is_numeric($k) && is_string($k)) {
						$route[$k] = $v;
					}
				}
				if (empty($route['action'])) {
					$route['action'] = 'index';
				}
				$route['controller'] = self::upperCamelCase( $route['controller'] );
				self::$route = $route;
				return true;
			}
		}
		return false; 
	}

	/**
	 * Перенаправляет URL по корректному адресу
	 * @param string $url входящий URL
	 * @return void
	 */
	public static function dispatch($url)
	{
		$url = self::removeQueryString($url);

		if ( self::matchRoute($url) ) {
			$controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
 
			if (class_exists($controller)) {
				$cObj = new $controller(self::$route);
				$action = self::lowerCamelCase( self::$route['action']) . 'Action';

				if ( method_exists($cObj, $action)) {
					$cObj->$action();
					$cObj->getView();

				} else {
					echo "Метод <b>$controller::$action</b> не найден";
				}

			} else {
				echo "Контроллер <b>$controller</b> не найден";
			}
			
		} else {
			http_response_code(404);
			include '404.html';
		}
	}

	/**
	 * Форматирует строку
	 * @return string
	 */
	protected static function upperCamelCase($name)
	{
		$name = str_replace('-', ' ', $name);
		return str_replace(' ', '', ucwords($name));
	}

	/**
	 * Форматирует строку
	 * @return string
	 */
	protected static function lowerCamelCase($name)
	{
		return lcfirst(self::upperCamelCase($name));
	}

	/**
	 * Отсекает явные GET-параметры из URL
	 * @return string 
	 */
	protected static function removeQueryString($url)
	{
		if ($url) {
			$params = explode('&', $url, 2);

			if (false === strpos($params[0], '=')) {
				return rtrim($params[0], '/');
				
			} else {
				return '';
			}
		}
	}
	
} 