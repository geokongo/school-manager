<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Site extends CI_Controller {
	public function index() {
		$this->about();
	}
	
	public function home() {
		$this->load->view('view_header');
		$this->load->view('view_nav');
		$this->load->view('content_home');
		$this->load->view('view_footer');
	}
	
	public function about() {
		$this->load->view('view_header');
		$this->load->view('view_nav');
		$this->load->view('okongo/content_about');
		$this->load->view('view_footer');
	}
	
	public function contact() {
		$this->load->model('get_db');
		
		$data['results'] = $this->get_db->getAll();
		
		$this->load->view('content_contact', $data);
	}
}



?>