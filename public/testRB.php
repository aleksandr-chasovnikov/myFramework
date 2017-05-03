<?php



die; // !!!!!!



//require '../vendor/rb.php';
//$db = require '../config/config_db.php';

R::setup($db['dsn'], $db['user'], $db['pass'], $options);
R::freeze(false); //Заморозить структуру таблицы (true):
R::fancyDebug(TRUE); //Выводит SQL-запрос в каждом запросе

//var_dump(R::testConnection());

//Create (создаст объект таблицы + саму таблицу, есди её нет)
$cat = R::dispense('category');
$cat->title = 'Категория 2';
$id = R::store($cat); // Сохранить в таблицу
var_dump($id);

//Read (чтение данных)
$cat = R::load('category', 2);
//print_r($cat);
echo $cat->title;

//Update
$cat = R::load('category', 3);
echo $cat->title . '<br>';
$cat->title = 'Категория 3';
R::store($cat);
echo $cat->title;

//Delete
$cat = R::load('category', 3);
R::trash($cat);

//Очистить таблицу
R::wipe('category');

//Получить все записи
$cats = R::findAll('category', 'id > ?', [2]);
$cats = R::findAll('category', 'title LIKE ?', ['%qwq%']);

//Получить одну запись
$cat = R::findOne('category', 'id=2');

var_dump($cat);

