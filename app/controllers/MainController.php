<?php

namespace app\controllers;

use app\models\Main;
use core\App;

/**
 *
 */
class MainController extends AppController
{
    /**
     *
     */
    // public $layout = 'main';

    /**
     *
     */
    public function indexAction()
    {
//        App::$app->getList();
//        \R::fancyDebug(true);

        $model = new Main();
        $posts = \R::findAll('posts');
//        $posts = App::$app->cache->get('posts');
//        if(!$posts) {
//            $posts = \R::findAll('posts');
//            App::$app->cache->set('posts', $posts, 3600*24);
//        }

        $post = \R::findOne('posts', 'id = 1');
        $menu = $this->menu;

//        $res = $model->queryModel("CREATE TABLE posts SELECT * FROM post");
//        $posts = $model->findAll();
//        $posts2 = $model->findAll();
//        $post = $model->findOne(2);
//        $data = $model->findBySql("SELECT * FROM {$model->table} WHERE title LIKE ?", ['%qwq%']);

        $title = 'PAGE TITLE';

        $this->setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
//        $this->setMeta($post->title, $post->description, $post->keywords);
        $meta = $this->meta;
        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    /**
     *
     */
    public function testAction()
    {
        $this->layout = 'test';
    }


}
