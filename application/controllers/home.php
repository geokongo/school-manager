<?php 

class Home extends SM_Controller {
	
	//extend the function construct for CI_Controller
	function __construct()
	{
		parent::__construct();

		$this->load->library('session');
	
	}
	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/home');
		$this->load->view('home/footer');
	
	}
	
	public function page()
	{
		$this->load->view('home/pages');
		/*
		$this->load->library('pagination');

		$config['base_url'] = base_url().'home/page';
		$config['total_rows'] = 200;
		$config['per_page'] = 20;

		$this->pagination->initialize($config);

		echo $this->pagination->create_links();	
		*/
	}
}