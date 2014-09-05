<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admissions_Controller extends SM_Controller {
	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('usertype') != 'admissions'){
            redirect('login','refresh');
        } 
		
    }

}