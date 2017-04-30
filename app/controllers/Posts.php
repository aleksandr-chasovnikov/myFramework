<?php

namespace app\controllers;

/**
* 
*/
class Posts extends \core\base\Controller
{
	/**
	 * @return
	 */
	public function indexAction()
	{
		echo 'Posts->index';
	}

	/**
	 * @return
	 */
	public function testAction()
	{
		vd($this->route);
		echo 'Posts->test';
	}

	/**
	 * @return
	 */
	public function testPageAction()
	{
		echo 'Posts->testPage';
	}
}