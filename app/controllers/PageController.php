<?php

namespace app\controllers;

/**
 * 
 */
class PageController extends AppController
{

    public function viewAction()
    {
        $menu = \R::findAll('category');
        $title = 'Страница';
        $this->set(compact('title', 'menu'));
//		vd($this->route);
    }

}
