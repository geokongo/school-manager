<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends SM_Controller {
	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('usertype') != 'admin'){
            redirect('login','refresh');
        } 
		
    }

}