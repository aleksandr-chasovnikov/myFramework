<?php

$config = [
    'components' => [
        'cache' => 'classes\Cache',
        'test' => 'classes\Test',
    ],
];

spl_autoload_register(
        function($class) {
    $file = str_replace('\\', '/', $class) . '.php';

    if (is_file($file)) {
        require_once $file;
    }
});

/**
 * Description of index
 *
 * @author User
 */
class Registry
{
    /**
     *
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
        global $config;
        
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
        if ( !isset(self::$objects[$name]) ) {
            return self::$objects[$name] = new $object;
        }
    }
    
    public function getList()
    {
        var_dump(self::$objects);
    }    

}

$app = Registry::instance();
//$app->getList();
$app->test->go();
