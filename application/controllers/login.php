<?php 

class Login extends CI_Controller {
	
	//extending the code igniter controller parent constructor
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('checkuser');
	
	}
	
	//index function which loads whenever login controller is called without a definite method
	public function index()
	{
		$this->load->view('login/header');
		$this->load->view('login/home');
		$this->load->view('login/footer');
	
	}
	
	public function checkuser()
	{
		$res = $this->db->get_where('users', array('username' => $this->input->post('username')));	
		
		if($res->num_rows() > 0)
		{
			//extract resultset into a row
			$row = $res->row();
			
			
			//check password
			if(md5($this->input->post('password')) != $row->password)
			{
				$data['error'] = '<p>Sorry, you entered the wrong password</p>';
				
				$this->load->view('login/header');
				$this->load->view('login/home', $data );
				$this->load->view('login/footer');
			
			}
			
			else
			{
				/*if username exists and the password is correct the redirect page/dashboard 
				and save the following variables*/
				
				if($row->usertype == 'sys_admin')
				{
					$this->session->set_userdata('username', $row->username);
					$this->session->set_userdata('f_name', $row->f_name);
					$this->session->set_userdata('l_name', $row->l_name);
					$this->session->set_userdata('usertype', $row->usertype);
					$this->session->set_userdata('client_id', $row->client_id);
					$this->session->set_userdata('client_name', $row->client_name);
					
					redirect('admin', 'refresh');
				
				}
				else
				{
					$this->session->set_userdata('username', $row->username);
					$this->session->set_userdata('f_name', $row->f_name);
					$this->session->set_userdata('l_name', $row->l_name);
					$this->session->set_userdata('usertype', $row->usertype);
					$this->session->set_userdata('client_id', $row->client_id);
					$this->session->set_userdata('client_name', $row->client_name);
					
					$clientInfo = $this->db->get_where('clients', array('client_id' => $row->client_id));	
					
					$clientInfo = $clientInfo->row();
					$this->session->set_userdata('p_address', $clientInfo->p_address);
					$this->session->set_userdata('p_code', $clientInfo->p_code);
					$this->session->set_userdata('city', $clientInfo->city);
					$this->session->set_userdata('phone', $clientInfo->phone);
					$this->session->set_userdata('email', $clientInfo->email);
					$this->session->set_userdata('status', $clientInfo->status);
					$this->session->set_userdata('startDate', $clientInfo->startDate);
					$this->session->set_userdata('stopDate', $clientInfo->stopDate);
					
					//get a list of all the time log for this client
					$timeOutObject = $this->db->query(" SELECT time_out FROM register WHERE client_id = '$row->client_id' ORDER BY time_out DESC");
					
					if($timeOutObject->num_rows() < 0)
					{
						//get the latest time logout for this client
						$clientLastTimeOut = $timeOutObject->row();
						$clientLastTimeOut = $clientLastTimeOut->time_out;
						
						//get the latest time for this user
						foreach($timeOutObject->result() as $timeOut)
						{
							if($timeOut->username == $row->username) {	$yourLastLogoutTime[] = $timeOut->time_out; }
						
						}
						array_multisort($yourLastLogoutTime, SORT_DESC);
						$yourLastLogoutTime = $yourLastLogoutTime[0];
						
						//set the last login time to a session. We will use it in the view.
						$this->session->set_userdata('last_login', $yourLastLogoutTime);
						
						$loginTimeNow = time();

						//if last login for this user is less than $loginTimeNow, update the register
						if($yourLastLogoutTime < $loginTimeNow) 
						{ 
							$dataArray = array(
										   'username' => $row->username,
										   'f_name' => $row->f_name,
										   'l_name' => $row->l_name,
										   'client_name' => $row->client_name,
										   'client_id' => $row->client_id,
										   'time_in' => $loginTimeNow
							);

							$this->db->insert('register', $dataArray);
							$loginID = $this->db->insert_id();
							
							//set the loginId in session, we will need it at logout
							$this->session->set_userdata('loginId', $loginID);
						
						}
						
						//if last login for this client is less than $loginTimeNowfor this user, update the last login time in the clients table
						if($clientLastTimeOut < $loginTimeNow) 
						{ 
							//save $loginTimeNow to session we will use it at logout
							$this->session->set_userdata('loginTimeNow', $loginTimeNow);
							$dataArray = array('lastLogin' => $loginTimeNow);

							$this->db->where('client_id', $row->client_id);
							$this->db->update('clients', $dataArray); 
						
						}
						
					}
				
					else
					{
						$loginTimeNow = time();
						$dataArray = array(
									   'username' => $row->username,
									   'f_name' => $row->f_name,
									   'l_name' => $row->l_name,
									   'client_name' => $row->client_name,
									   'client_id' => $row->client_id,
									   'time_in' => $loginTimeNow
						);

						$this->db->insert('register', $dataArray);
						$loginID = $this->db->insert_id();
						
						//set the loginId in session, we will need it at logout
						$this->session->set_userdata('loginID', $loginID);

						//update client lastLogin field
						$dataArray = array('lastLogin' => $loginTimeNow);
						$this->db->where('client_id', $row->client_id);
						$this->db->update('clients', $dataArray); 
						
						//save $loginTimeNow to session we will use it at logout
						$this->session->set_userdata('loginTimeNow', $loginTimeNow);
					
					}
					
					//if the trial period has not expired redirect
					if($loginTimeNow <= $this->session->userdata('stopDate'))
					{
						if($row->usertype == 'admin')
						{
							//this is a client take him to his homepage
							redirect('home', 'refresh');
						
						}
						
						elseif($row->usertype == 'admissions')
						{
							//this is a client take him to his homepage
							redirect('admissions', 'refresh');
						
						}

						elseif($row->usertype == 'academics')
						{
							//this is a client take him to his homepage
							redirect('academics', 'refresh');
						
						}
						
					}
					
					elseif($loginTimeNow <= $this->session->userdata('stopDate') OR $row->usertype == 'sys_admin')
					{
						//this is the system owner, take him to the admin control panel
						redirect('admin', 'refresh');
					
					}
					
					else
					{
						$this->load->view('login/header');
						$this->load->view('login/register');
						$this->load->view('login/footer');
					
					}
				
				}
				
			}
		
		}
		else
		{
			//if the username does not exist load error page/dashboard
			
			/*define error message*/
			$data['error'] = '<p>The username does not exist</p>';
			
			$this->load->view('login/header');
			$this->load->view('login/home', $data);
			$this->load->view('login/footer');
		
		}
	
	}
	
	public function logout()
	{
		//check the logout time
		$logoutTimeNow = time();
		
		//if $logoutTimeNow is greater than $loginTimeNow, update register and Client lastLogin
		if($logoutTimeNow > $this->session->userdata('loginTimeNow'))
		{
			
			$dataArray = array('time_out' => $logoutTimeNow);
			$this->db->where('login_id', $this->session->userdata('loginID'));
			$this->db->update('register', $dataArray); 
			
			
			$dataArray = array('lastLogin' => $logoutTimeNow);
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('clients', $dataArray); 
			
		}
		
		//clear session variables and redirect to the login page
		$this->session->sess_destroy();
		
		redirect('login', 'refresh');
	
	}
	

}