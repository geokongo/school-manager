<?php 


 
class Auth extends CI_Controller {
	
	public function index()
	{
		$this->load->view('login/header');
		$this->load->view('login/content1');
		$this->load->view('login/footer');
	}
}