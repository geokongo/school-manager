<?php 
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
	}

	function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/home');
		$this->load->view('home/footer');
	
	}

}