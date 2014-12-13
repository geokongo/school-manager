<?php 



class Face extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
	}
	
	public function index()
	{
		$fb_config = array(
						'appId' => '1563588553853090',
						'secret' => '21ae87bddc5bc508d91ccace40db7b63'
		);
		
		//require_once( APPPATH . 'libraries/facebook/facemash.php' );
		
		
		$this->load->library('faceb');
		$this->faceb->redirect();
	
		
	}
	
}