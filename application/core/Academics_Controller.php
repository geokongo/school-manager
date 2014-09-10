<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Academics_Controller extends SM_Controller {
	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('usertype') != 'academics'){
            redirect('login','refresh');
        } 
		
		session_start();

		//$this->load->library('output');
		//$this->load->library('input');
		
    }
	

}