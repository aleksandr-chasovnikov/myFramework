<?php 

namespace app\controllers;

/**
 * 
 */
class Page extends \core\base\Controller
{
	public function viewAction()
	{
		vd($this->route);
		echo 'Page::view';
	}
}