<?php

namespace app\controllers;

/**
* 
*/
class Main
{
	public function indexAction() {
		vd ('Main->index');
	}

	/**
	 * @return
	 */
	public function testAction() {
		vd( 'Main->test');
	}

	/**
	 * @return
	 */
	public function testPageAction() {
		vd( 'Main->testPage');
	}
}