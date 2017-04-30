Controller<?php

namespace app\controllers;

/**
* 
*/
class PostsNewController extends AppController
{
	/**
	 * @return
	 */
	public function indexAction() {
		echo 'PostsNew->index';
	}

	/**
	 * @return
	 */
	public function testAction() {
		echo 'PostsNew->test';
	}

	/**
	 * @return
	 */
	public function testPageAction() {
		echo 'PostsNew->testPage';
	}

	/**
	 * @return
	 */
	public function before() {
		echo 'PostsNew->before';
	}
	
}