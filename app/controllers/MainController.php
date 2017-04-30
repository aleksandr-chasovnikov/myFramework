<?php

namespace app\controllers;

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
		// $this->layout = false;
		// $this->layout = 'default';
		// $this->view = 'test';
		$name = 'Dania';
		$this->set(['name' => $name]);
	}

	/**
	 * @return
	 */
	public function testAction() {
	}

	/**
	 * @return
	 */
	public function testPageAction() {
	}
}