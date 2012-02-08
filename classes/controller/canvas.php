<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Canvas Controller
 * 
 * @package grandma
 * @category Controllers
 * @author Muntasir Mohiuddin
 */

class Controller_Canvas extends Controller {

	public function before() {
		parent::before();
	}

	public function action_index() {
		$this->response->body('hello, test from CANVAS!');
	}
	
	public function after() {
		parent::after();
	}	
	
}