<?php 

namespace app\controllers;

/**
 * 
 */
class Page extends App
{
	public function viewAction()
	{
		vd($this->route);
		echo 'Page::view';
	}
}