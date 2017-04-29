<?php

class PostsNews
{
	/**
	 * @return
	 */
	public function indexAction() {
		echo 'PostsNews->index';
	}

	/**
	 * @return
	 */
	public function testAction() {
		echo 'PostsNews->test';
	}

	/**
	 * @return
	 */
	public function testPageAction() {
		echo 'PostsNews->testPage';
	}

	/**
	 * @return
	 */
	public function before() {
		echo 'PostsNews->before';
	}
	
}