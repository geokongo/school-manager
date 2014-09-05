<?php 

/**
 *The login controller
 *
 *This class handles the user authentication and redirects users to their
 *appropriate dashboard depending on the username at login
 */
 
class Login extends CI_Controller {
	
	public function index()
	{
		$this->load->view('login/header');
		$this->load->view('login/content1');
		$this->load->view('login/footer');
	}
	
/**
 *This is the login method
 *
 *This method takes the variables from the login form presented by the above controller
 *and does authentication.
 *If the login credentials are verified, the user is logged in otherwise the appropriate 
 *error message is displayed
 *
 */	
 
	public function auth()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('login/header');
			$this->load->view('login/content1');
			$this->load->view('login/footer');
		
		}
		
		else 
		{
			$username = $_POST['username'];
			$pass = $_POST['password'];
		
			$this->load->model('login/log_in');
			$results = $this->log_in->auth("$username");
		
			if($results->num_rows() > 0)
			{
				$row = $results->row();
				$name = $row->name;
				$password = $row->password;
			
				if ($password != $pass) 
				{
					echo "Sorry, you entered the wrong password.<p>";
					echo "Please try again";
			
				}
				else 
				{
					if($name == 'admin')
					{
						$this->session->set_userdata('usertype', $name);
						redirect('admin', 'refresh');
					}
					
					if($name == 'admissions')
					{
						$this->session->set_userdata('usertype', $name);
						redirect('admissions', 'refresh');
					}
					
					if($name == 'academics')
					{
						$this->session->set_userdata('usertype', $name);
						redirect('academics', 'refresh');
					}
					
				}

			}
			
			echo "No user {$username} found";
			exit;
			
		}
		
	}
	
}