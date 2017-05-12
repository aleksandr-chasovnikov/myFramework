<?php

namespace core;

/**
 * Description of Registry
 *
 * @author User
 */
class Registry
{
    /***
     * @var array
     */
    public static $objects = [];
    /**
     * Содержит текущий объект
     * @var type
     */
    protected static $instance;

    /**
     *
     */
    protected function __construct()
    {
        require_once ROOT . '/config/config.php';;

        foreach ( $config['components'] as $name => $component ) {
            self::$objects[$name] = new $component;
        }

    }

    /**
     * Возращает текущий или новый объект self
     * @return
     */
    public static function instance()
    {
        if ( self::$instance === null ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     *
     */
    public function __get($name)
    {
        if ( is_object(self::$objects[$name]) ) {
            return self::$objects[$name];
        }
    }

    /**
     *
     */
    public function __set($name, $object)
    {
        if ( is_null(self::$objects[$name]) ) {
            return self::$objects[$name] = new $object;
        }
    }

    public function getList()
    {
        var_dump(self::$objects);
    }

}
