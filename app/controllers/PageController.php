Controller<?php 

namespace app\controllers;

/**
 * 
 */
class PageController extends AppController
{
	public function viewAction()
	{
		vd($this->route);
		echo 'Page::view';
	}
}