<?php

namespace app\controllers;

/**
 * Для общего функционала
 */
class AppController extends \core\base\Controller
{
    /**
     * Меню
     */
    public $menu;
    /**
     * Метаданные
     * @var array
     */
    public $meta = [];

    /**
     * 
     */
    public function __construct($route)
    {
        parent::__construct($route);
        
        new \app\models\Main;
        $this->menu = \R::findAll('category');
    }
    
    /**
     * 
     */
    protected function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}
