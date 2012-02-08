<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Facebook Core 
 * 
 * Provides access to the latest Facebook PHP SDK
 * 
 * @package grandma/Facebook
 * @category Vendor
 * @author Muntasir Mohiuddin
 * @copyright  (c) 2012 BNOTIONS
 */

// Include the Facebook PHP SDK Class
require Kohana::find_file('vendor', 'Facebook_sdk/facebook');

class Facebook_Core extends Facebook {
	/**
	 * @var Facebook configuration
	 */
	protected static $config;
	
	
	/** 
	 * Constructor of the Facebook API
	 * 
	 * @return Facebook instance
	 */
	function __construct($config){
		self::$config = $config;
		parent::__construct(array(
		  'appId'  	=> self::$config['app_id'],
		  'secret' 	=> self::$config['secret'],
		  'file_upload'	=> self::$config['file_upload'],
		));
	}	

	
	/**
	 * Basic me call 
	 **/
	function me() {
		return $this->api('/me');
	}
	

	/**
	 * Make batch API call to Facebook graph API end point
	 *
	 * @var batch_data mixed array of variables consisting method and relative_url
	 * @return mixed returns an array consisting the result of batch api call.
	 **/
	
	public function api_batch($batch_data) {
		$post_url = self::$DOMAIN_MAP['graph'];
		
		$post_data = http_build_query(array(
			'access_token' => $this->getAccessToken(),
			'batch' => json_encode($batch_data)
		));
		
		$params = array('http' => array(
			'method' => 'POST',
			'header' => 'Content-type: application/x-www-form-urlencoded',
			'content' => $post_data
		));
		
		$context = stream_context_create($params);
		$responses = json_decode(@file_get_contents($post_url, false, $context), true);
		
		$return = array();
		
		foreach($responses as $response) {
			$return[] = json_decode($response['body'], true); 
		}
		
		return $return;
	} // end of __FUNCTION__
}



