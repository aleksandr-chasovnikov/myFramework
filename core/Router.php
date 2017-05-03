<?php

namespace core;

/**
 * Маршрутизатор
 * Обрабатывает строку запроса и перенаправляет пользователя
 * на подходящий контроллер
 * Создает объект Контроллера и объект Представления
 */
class Router
{
    /**
     * Массив всех возможных маршрутов
     * @var array
     */
    protected static $routes = [];
    /**
     * Массив текущего маршрута
     * @var array
     */
    protected static $route = [];

    /**
     * Добавляет новый маршрут в таблицу маршрутов
     * @param stirng $regexp имя маршрута
     * @param array $new_route новый маршрут
     */
    public static function add($regexp, $new_route = [])
    {
        self::$routes[$regexp] = $new_route;
    }

    /**
     * Возращает таблицу маршрутов
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
     * Ищет совпадения с маршрутами и заполняет текущий маршрут self::$route
     * @param string $url (строка запроса)
     * @return boolean
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {

            if ( preg_match("#$pattern#i", $url, $matches) ) {

                foreach ($matches as $k => $v) {

                    if ( !is_numeric($k) && is_string($k) ) {
                        $route[$k] = $v;
                    }
                }

                if ( empty($route['action']) ) {
                    $route['action'] = 'index';
                }

                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Отсекает явные GET-параметры из URL
     * @param string $url (входящий URL)
     * @return string
     */
    protected static function removeQueryString($url)
    {
        if ( $url ) {
            $params = explode('&', $url, 2);

            if ( false === strpos($params[0], '=') ) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }

    /**
     * Форматирует строку c именем контроллера
     * @return string
     */
    protected static function upperCamelCase($name)
    {
        $name = str_replace('-', ' ', $name);
        return str_replace(' ', '', ucwords($name));
    }

    /**
     * Форматирует строку с именем экшена
     * @return string
     */
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    /**
     * Перенаправляет URL по корректному адресу
     * Создает объект Контроллера и объект Представления
     * @param string $url (входящий URL)
     * @return void
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);

        if ( self::matchRoute($url) ) {
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';

            if ( class_exists($controller) ) {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                if ( method_exists($cObj, $action) ) {
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

}
