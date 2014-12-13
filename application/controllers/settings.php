<?php 

class Settings extends SM_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->db_prefix = DB_PREFIX.$this->session->userdata('client_id');
	
	}
	
	public function index()
	{
		//
		
	}
	
	public function profile()
	{
		if(!$this->input->post())
		{
			//get all user information from the database
			$data['userInfoObject'] = $this->db->get_where('users', array('username' => $this->session->userdata('username')));
			
			$this->load->view('settings/header');
			$this->load->view('settings/profile', $data);
			$this->load->view('settings/footer');
		
		}
		
		if($this->input->post())
		{
			if($this->input->post('actionf') == 'editProfile') //edit profile action 
			{
				//update the database with the new values
				$dataArray = array(
								'f_name' => mysql_real_escape_string($this->input->post('fName')),
								'l_name' => mysql_real_escape_string($this->input->post('lName')),
								'phone' => mysql_real_escape_string($this->input->post('phoneNumber')),
								'email' => mysql_real_escape_string($this->input->post('emailAddress'))
						);
				$this->db->where('username', $this->session->userdata('username'));
				$this->db->update('users', $dataArray);
				
				$userInfoObject = $this->db->get_where('users', array('username' => $this->session->userdata('username')));	
				
				if($userInfoObject) //query run successfully
				{
					foreach($userInfoObject->result() as $userInfoItem)
					{
						$this->session->set_userdata('f_name', $userInfoItem->f_name);
						$this->session->set_userdata('l_name', $userInfoItem->l_name);
					
					}
				
				}
				
				//reload the profile home page with update data
				$data['success'] = 1;
				$data['userInfoObject'] = $userInfoObject;
				$this->load->view('settings/header');
				$this->load->view('settings/profile', $data);
				$this->load->view('settings/footer');
			
			}
			
			
			if($this->input->post('actionf') == 'changePassword')
			{
				//update the database with the new values
				$dataArray = array(	'password' => md5($this->input->post('newPassword')));
				$this->db->where('username', $this->session->userdata('username'));
				$this->db->update('users', $dataArray);
				
				
				//reload the profile home page with update data
				$data['userInfoObject'] = $this->db->get_where('users', array('username' => $this->session->userdata('username')));	
				$data['success'] = 1;
				$this->load->view('settings/header');
				$this->load->view('settings/profile', $data);
				$this->load->view('settings/footer');
			
			}
		
		}
	
	}
	
	public function termDates()
	{
		if(!$this->input->post())
		{
			
			if($this->uri->segment(3) === FALSE) //fetch setting already in the database and pass to the view
			{
				
				$tableName = $this->db_prefix.'.settings';
				
				$data['settingsObject'] = $this->db->get($tableName);
				
				$this->load->view('settings/header');
				$this->load->view('settings/termDates', $data);
				$this->load->view('settings/footer');
			
			}
			else
			{
				if($this->uri->segment(3) == 'addNewTerm')
				{
					$data['addNewTerm'] = 1;
					
					$this->load->view('settings/header');
					$this->load->view('settings/termDates', $data);
					$this->load->view('settings/footer');
				
				}
			
			}
			
		}
		
		if($this->input->post())
		{
			if($this->input->post('actionf') == 'addNewTerm')
			{
				//check if there are already entries in the database
				$tableName = $this->db_prefix.'.settings';
				$termDatesObject = $this->db->get($tableName);
				
				if($termDatesObject->num_rows() > 0) //there are already entries so we update the settings
				{
					foreach($termDatesObject->result() as $termDateObject)
					{
						$insertID = $termDateObject->id;
						$termsArray = unserialize(stripslashes($termDateObject->terms));
						$termDatesArray = unserialize(stripslashes($termDateObject->term_dates));
					
					}
					
					//update the $termsArray and remove duplicates and reindex the $termsArray values
					$termsArray[] = $this->input->post('term');
					$termsArray = array_unique($termsArray);
					array_multisort($termsArray);
					
					//check if the term was added before you update the $termDatesArray
					foreach($termsArray as $termIndex => $termName)
					{
						if($termName == $this->input->post('term'))
						{
							//term was inserted so add the termDates 
							$termDatesArray[$termName]['openingDate'] = $this->input->post('openingDate') / 1000;
							$termDatesArray[$termName]['midTermBreak'] = $this->input->post('midTermBreak') / 1000;
							$termDatesArray[$termName]['closingDate'] = $this->input->post('closingDate') / 1000;
							
							//serialize the $termDatesArray and $termsArray to insert into the database
							$termDatesArray = mysql_real_escape_string(serialize($termDatesArray));
							$termsArray = mysql_real_escape_string(serialize($termsArray));
							
							$dataArray = array(	'terms' => $termsArray, 'term_dates' => $termDatesArray);
							$this->db->where('id', $insertID );
							$this->db->update($tableName, $dataArray);
							
						
						}
					
					}
					
					//reload the termDates homepage
					$data['settingsObject'] = $this->db->get($tableName);
					
					$this->load->view('settings/header');
					$this->load->view('settings/termDates', $data);
					$this->load->view('settings/footer');
					
				
				}
				else //there are no entries so this is the first entry
				{
					//insert a dummy record to get a insertID for referencing. we will always reference the first row
					$tableName = $this->db_prefix.'.settings';
					$dataArray = array(	'term_dates' => uniqid() );
					$this->db->insert($tableName, $dataArray);
					$insertID = $this->db->insert_id();
					
					//get the $termName and insert into the terms field
					$termName[] = $this->input->post('term');
					$termName = mysql_real_escape_string(serialize($termName));
					
					//update the database with the $termName
					$dataArray = array(	'terms' => $termName);
					$this->db->where('id', $insertID );
					$this->db->update($tableName, $dataArray);
					
					//serialize the $newTermArray and update the database
					$newTermArray = array();
					$newTermArray[$this->input->post('term')]['openingDate'] = $this->input->post('openingDate') / 1000;
					$newTermArray[$this->input->post('term')]['closingDate'] = $this->input->post('closingDate') / 1000;
					$newTermArray[$this->input->post('term')]['midTermBreak'] = $this->input->post('midTermBreak') / 1000;
					$newTermArraySerialized = mysql_real_escape_string(serialize($newTermArray));
					
					//insert the $newTermArray into the database
					$dataArray = array(	'term_dates' => $newTermArraySerialized);
					$this->db->where('id', $insertID );
					$this->db->update($tableName, $dataArray);
					
					//reload the termDates homepage
					$data['settingsObject'] = $this->db->get($tableName);
					
					$this->load->view('settings/header');
					$this->load->view('settings/termDates', $data);
					$this->load->view('settings/footer');
				
				}
			
			}
		
		}
	
	}
	
	public function addNewUser()
	{
		if(!$this->input->post())
		{
			$data['addNewUser'] = 1;
			$this->load->view('settings/header');
			$this->load->view('settings/addNewUser', $data);
			$this->load->view('settings/footer');
		
		}
		
		if($this->input->post()) //a userDetails form has been submited so sanitize and insert datainto the database
		{
			if($this->input->post('actionf') == 'addNewUser')
			{
				$dataArray = array(
								'f_name' => mysql_real_escape_string($this->input->post('firstName')),
								'l_name' => mysql_real_escape_string($this->input->post('lastName')),
								'username' => mysql_real_escape_string($this->input->post('userName')),
								'password' => md5($this->input->post('password')),
								'usertype' => $this->input->post('userType'),
								'phone' => mysql_real_escape_string($this->input->post('phoneNumber')),
								'email' => mysql_real_escape_string($this->input->post('emailAddress')),
								'client_id' => $this->session->userdata('client_id'),
								'client_name' => $this->session->userdata('client_name')
						);
			$this->db->insert('users', $dataArray); 
			
			//get all user information from the database
			$data['success'] = 'You created the user successfully';
			$data['userInfoObject'] = $this->db->get_where('users', array('username' => $this->input->post('userName')));
			
			$this->load->view('settings/header');
			$this->load->view('settings/addNewUser', $data);
			$this->load->view('settings/footer');
			
			}
		
		}
	
	}
	
	public function manageUsers()
	{
		if(!$this->input->post() && $this->session->userdata('usertype') == 'admin')
		{
			$data['registeredUsers'] = $this->db->get_where('users', array('client_id' => $this->session->userdata('client_id')));	
			
			$this->load->view('settings/header');
			$this->load->view('settings/manageUsers', $data);
			$this->load->view('settings/footer');
		}
	
	}
}