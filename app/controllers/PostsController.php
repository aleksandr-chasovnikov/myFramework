<?php

namespace app\controllers;

/**
* 
*/
class PostsController extends AppController
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