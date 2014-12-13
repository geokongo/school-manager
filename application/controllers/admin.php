<?php 

class Admin extends SM_Controller {

	//constructor
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('admin_model');
		
		if($this->session->userdata('usertype') != 'sys_admin')
		{
			//this is not the site owner, clear session variables and take him to the login page
			//$this->session->sess_destroy();
			redirect('login', 'refresh');
		
		}
		
	
	}

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	
	}
	
	public function add_client()
	{
		if(!$this->input->post())
		{
			$variable['actionf'] = 'step1';
			$number = $this->admin_model->clients($variable);
			
			$this->session->set_userdata('id', $number);
			
			$data['client_id'] = 'SM'.$number.'ABC';
			
			$this->load->view('admin/header');
			$this->load->view('admin/enter_client_details', $data);
			$this->load->view('admin/footer');
		}
		
		if($this->input->post())
		{
			if($this->input->post('actionf') == 'create_client_account')
			{
				$variable['id'] = $this->session->userdata('id');
				$variable['client_id'] = $this->input->post('client_id');
				$variable['client_name'] = mysql_real_escape_string($this->input->post('client_name'));
				$variable['f_name'] = mysql_real_escape_string(ucwords($this->input->post('f_name')));
				$variable['l_name'] = mysql_real_escape_string(ucwords($this->input->post('l_name')));
				$variable['phone'] = mysql_real_escape_string($this->input->post('phone'));
				$variable['email'] = mysql_real_escape_string($this->input->post('email'));
				$variable['p_address'] = mysql_real_escape_string($this->input->post('p_address'));
				$variable['p_code'] = mysql_real_escape_string($this->input->post('p_code'));
				$variable['city'] = mysql_real_escape_string($this->input->post('city'));
				$variable['startDate'] = $this->input->post('startDate')/1000;
				$variable['stopDate'] = $this->input->post('stopDate')/1000;
				$variable['status'] = $this->input->post('status');
				$variable['actionf'] = 'insert_client_details';
				
				$res = $this->admin_model->clients($variable);
				
				if($res)
				{
					$data['username'] = $this->input->post('f_name').$this->session->userdata('id');
					$data['client_id'] = $this->input->post('client_id');
					$data['client_name'] = $this->input->post('client_name');
					$data['f_name'] = $this->input->post('f_name');
					$data['l_name'] = $this->input->post('l_name');
					$data['usertype'] = array('admin', 'user');
					$data['phone'] = $this->input->post('phone');
					$data['email'] = $this->input->post('email');
					
					$this->load->view('admin/header');
					$this->load->view('admin/client_user_account', $data);
					$this->load->view('admin/footer');
				
				}
				
			
			}
			
			if($this->input->post('actionf') == 'create_client_user')
			{
				//we save the username and password into the database
				$variable['client_id'] = $this->input->post('client_id');
				$variable['client_name'] = mysql_real_escape_string($this->input->post('client_name'));
				$variable['username'] = $this->input->post('username');
				$variable['password'] = md5($this->input->post('password'));
				$variable['usertype'] = $this->input->post('usertype');
				$variable['f_name'] = mysql_real_escape_string(ucwords($this->input->post('f_name')));
				$variable['l_name'] = mysql_real_escape_string(ucwords($this->input->post('l_name')));
				$variable['phone'] = mysql_real_escape_string($this->input->post('phone'));
				$variable['email'] = mysql_real_escape_string($this->input->post('email'));
				$variable['actionf'] = 'create_client_user';
				
				$res = $this->admin_model->clients($variable);
				
				if($res)
				{
					//email the credentials
					$this->load->view('admin/header');
					$this->load->view('admin/clients');
					$this->load->view('admin/footer');
				
				}

			
			}
		
		}
	
	}
	
	
	
}

