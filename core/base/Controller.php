<?php

namespace core\base;

/**
* Базовый контроллер
*/
abstract class Controller
{
	/**
	 * Текущий маршрут и параметры (controller, action, params)
	 * @var array
	 */
	public $route = [];

	/**
	 * Вид
	 * @var array
	 */
	public $view;

	/**
	 * Текущий шаблон
	 * @var string
	 */
	public $layout;

	/**
	 * Пользовательские данные
	 * @var array
	 */
	public $vars = [];

	/**
	 * @param array $route
	 */
	public function __construct($route)
	{
		$this->route = $route;
		$this->view = $route['action'];
	}

	/**
	 * Подключает вид
	 */
	public function getView()
	{
		$vObj = new View($this->route, $this->layout, $this->view);
		$vObj->render($this->vars);
	}

	/**
	 * Заполняет свойства
	 */
	public function set($vars)
	{
		$this->vars = $vars;
	}
}