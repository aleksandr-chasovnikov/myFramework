<?php 

namespace core\base;

/**
 * Создает представление
 */
class View
{
	/**
	 * Текущий маршрут и параметры (controller, action, params)
	 * @var array
	 */
	public $route = [];

	/**
	 * Текущий вид
	 * @var array
	 */
	public $view = [];

	/**
	 * Адрес текущего шаблона
	 * @var string
	 */
	public $layout;

	/**
	 * Конструктор
	 * @param array $route
	 * @param string $layout
	 * @param array $view
	 */
	public function __construct($route, $layout = '', $view = '') 
	{
		$this->route = $route;
		
		if (false === $layout) {
			$this->layout = false;

		} else {
			$this->layout = $layout ?: LAYOUT;			
		}
		$this->view = $view;
	}

	/**
	 * Отображение
	 */
	public function render($vars)
	{
		if (is_array($vars)) extract($vars);

		$file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
		ob_start();

		if ( is_file($file_view)) {
			require $file_view;

		} else {
			echo "<p>Не найден вид <b>$file_view</b></p>";
		}
		$content = ob_get_clean();

		if (false !== $this->layout) {			
			$file_layout = APP . "/views/layouts/{$this->layout}.php";

			if (is_file($file_layout)) {
				require $file_layout;

			} else {
				echo "<p>Не найден шаблон <b>$file_layout</b></p>";
			}
		}
	}

}