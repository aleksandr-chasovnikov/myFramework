<?php 

namespace core;

/**
 * 
 */
class Db
{
	/**
	 * @var object
	 */
	protected $pdo;

	/**
	 * @var
	 */
	protected static $instance;

	/**
	 * 
	 */
	protected function _construct()	
	{
		$db = require ROOT . "/config/config_db.php";
		$this->pdo = mew \PDO($db['dsn'], $db['user'], $db['pass']);
	}

	/**
	 * 
	 * @return
	 */
	public static function instance()
	{
		if (self::$instance ===null) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Выполняет запрос без данных
	 * @param string $sql
	 * @return boolean 
	 */
	public function execute($sql)
	{
		$stmt = $this->pdo->prepare($sql);
		return $stmt->execute();
	}

	/**
	 * Выполняет запрос
	 * @param string $sql
	 * @return boolean 
	 */
	public function query($sql)
	{
		$stmt = $this->pdo->prepare($sql);
		$res = $stmt->execute();

		if ($res !== false) {
			return $stmr->fetchAll();
		}
		return [];
	}

}