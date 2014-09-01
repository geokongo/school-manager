<?php 

class Install extends CI_Controller {
	
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('install/home');
		$this->load->view('admin/footer');
	
	}

	public function database()
	{
		if($this->input->post('actionf') == 'database')
		{
			$hostname = $this->input->post('hostname');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$database = $this->input->post('database');
		
		}
	
	}
}