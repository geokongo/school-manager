<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SM_Controller extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        if (!$this->session->userdata('usertype')){
            redirect('login','refresh');
        } 
		
    }

}