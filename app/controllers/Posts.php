<?php

namespace app\controllers;

/**
* 
*/
class Posts
{
	public function indexAction() {
		echo 'Posts->index';
	}

	/**
	 * @return
	 */
	public function testAction() {
		echo 'Posts->test';
	}

	/**
	 * @return
	 */
	public function testPageAction() {
		echo 'Posts->testPage';
	}
}