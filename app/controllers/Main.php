<?php

/**
* 
*/
class Main
{
	public function indexAction() {
		echo 'Main->index';
	}

	/**
	 * @return
	 */
	public function testAction() {
		echo 'Main->test';
	}

	/**
	 * @return
	 */
	public function testPageAction() {
		echo 'Main->testPage';
	}
}