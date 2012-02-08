<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Base Controller
 * 
 * @package grandma
 * @category Controllers
 * @author Muntasir Mohiuddin
 * @copyright  (c) 2012 BNOTIONS
 */

class Controller_Grandma_Base extends Controller {
	/**
	 * @var Main Facebook instance 
	 */
	protected $facebook;

	/**
	 * @var Facebook configuration
	 */
	protected $config;
	
	public function before() {
		parent::before();
		$this->config = Kohana::$config->load('facebook')->{Kohana::$environment};
		$this->facebook = new Facebook_API($this->config);
	}
	
	public function after() {
		parent::after();
	}	
	
	
	
}