<?php

namespace app\controllers;

use app\models\Main;

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
        $model = new Main();
        $posts = \R::findAll('posts');
        $post = \R::findOne('posts', 'id = 1');
        vd($post);
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
