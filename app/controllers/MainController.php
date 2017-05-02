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
        
//        $res = $model->queryModel("CREATE TABLE posts SELECT * FROM post");
//        $posts = $model->findAll();
//        $posts2 = $model->findAll();
//        $post = $model->findOne(2);
//        $data = $model->findBySql("SELECT * FROM {$model->table} WHERE title LIKE ?", ['%qwq%']);
        $data = $model->findBySqlLike('fdf', 'title');
        
        vd($data);
        
        $title = 'PAGE TITLE';
        $this->set(compact('title', 'posts'));
    }
    
}
