<?php

namespace core\base;

use core\Db;

/**
 * Базовый класс для моделей
 */
abstract class Model
{
    /**
     * Содержит экземпляр Db
     * @var object
     */
    protected $pdo;
    /**
     * Содержит имя текущей таблицы
     * @var object
     */
    protected $table;
    /**
     * Содержит имя первичного ключа
     * @var string
     */
    protected $pk = 'id';

    /**
     * Создает или возвращает созданный экземпляр Db
     */
    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    /**
     * Выполняет SQL-запрос без запращивания данных
     * @param string $sql
     * @return boolean 
     */
    public function queryModel($sql)
    {
        return $this->pdo->executeDb($sql);
    }

    /**
     * Выполняет выборку всей таблицы для текущей модели
     * @return array 
     */
    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->queryDb($sql);
    }

    /**
     * Выполняет выборку по конкретному полю 
     * @param string $field (имя поля)
     * @param string $field_value (значение поля)
     * @return array 
     */
    public function findOne($field_value, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->queryDb($sql, [$field_value]);
    }

    /**
     * Выполняет выборку по SQL-запросу
     * @param string $sql
     * @param array $params
     * @return array 
     */
    public function findBySql($sql, $params = [])
    {
        return $this->pdo->queryDb($sql, $params);
    }

    /**
     * Выполняет выборку по SQL-запросу c "LIKE"
     * @param string $field
     * @param string $table
     * @param array $params
     * @return array 
     */
    public function findBySqlLike($params, $field, $table = '')
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->queryDb($sql, ['%' . $params . '%']);
    }

}
