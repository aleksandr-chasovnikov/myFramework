<?php

namespace core;

/**
 * Подключается к БД
 * и выполняет SQL-запросы
 * 
 * @todo СДЕЛАТЬ МЕТОДЫ __clone, __wauld и др.
 */
class Db
{
    /**
     * Содержит экземпляр PDO
     * @var object
     */
    protected $pdo;
    /**
     * Содержит экземпляр self
     * @var object
     */
    protected static $instance;
    /**
     * Содержит количество SQL-запросов
     * @var integer
     */
    public static $countSQL = 0;
    /**
     * Содержит все SQL-запросы
     * @var array
     */
    public static $queries = [];

    /**
     * Создание экземпляр PDO
     */
    protected function __construct()
    {
        $db = require ROOT . "/config/config_db.php";
        require '../vendor/rb.php';
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        \R::freeze(true); //Заморозить структуру таблицы (true):
//        \R::fancyDebug(TRUE); //Выводит SQL-запрос в каждом запросе
//    	$options = [
//    	\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
//    	\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
//    	];
//    	$this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    /**
     * Возращает текущий или новый объект self
     * @return
     */
    public static function instance()
    {
        if ( empty( self::$instance ) ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Выполняет SQL-запрос без запращивания данных
     * Редактирование таблиц
     * @param string $sql
     * @param array $params
     * @return boolean 
     */
//    public function executeDb($sql, $params = [])
//    {
//    	self::$countSQL++;
//    	self::$queries[] = $sql;
//    	$stmt = $this->pdo->prepare($sql);
//    	return $stmt->execute($params);
//    }
//
//    /**
//     * Выполняет SQL-запрос
//     * @param string $sql
//     * @param array $params
//     * @return array 
//     */
//    public function queryDb($sql, $params = [])
//    {
//    	self::$countSQL++;
//    	self::$queries[] = $sql;
//    	$stmt = $this->pdo->prepare($sql);
//    	$res = $stmt->execute($params);
//
//    	if ( $res !== false ) {
//    		return $stmt->fetchAll();
//        } else {   //Возможно else - лишнее
//        	return [];
//        }
//    }

}
