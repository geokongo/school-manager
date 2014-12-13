<?php 

class Admissions extends SM_Controller {
	
	//extend parent construct
	function __construct()
	{
		parent::__construct();  
		$this->db_prefix = DB_PREFIX.$this->session->userdata('client_id');
		$this->load->model('admission');
	
	}
	
	//index controller to load when no method has been specified
	public function index()
	{
		//load the admissions homepage
		$this->load->view('admissions/header');
		$this->load->view('admissions/home');
		$this->load->view('admissions/footer');
	
	}
	
	public function addNewStudent()
	{
		//secure the latest admission number
		$tableName = $this->db_prefix.'.student_information';
		$dataArray = array( 'adm' => uniqid());
		$this->db->insert($tableName, $dataArray);
		$data['tmpAdmissionNumber'] = $this->db->insert_id();
		
		
		//load the addNewStudent homepage
		$this->load->view('admissions/header');
		$this->load->view('admissions/addNewStudent', $data);
		$this->load->view('admissions/footer');
	
	}
	
	public function new_student()
	{
		
		if($this->input->post('actionf') == 'check_admission_number')
		{
			//check id admission number is already in use
			$tableName = $this->db_prefix.'.student_information';
			
			$admissionCheck = $this->db->get_where($tableName, array( 'adm' => mysql_real_escape_string($this->input->post('adm'))));
			
			if($admissionCheck->num_rows() > 0) //admission number already exists, show appropriate message
			{
				$admHtml = '<div class="alert alert-danger"><strong>Admission number '.$this->input->post('adm').' is already in use. Please choose another</strong></div>';
				
				echo $admHtml;
			
			}
			else //admission number is ok
			{
				$admHtml = '<div class="alert alert-success"><strong>Admission number '.$this->input->post('adm').' is ok</strong></div>';
				
				echo $admHtml;
			
			}
		
		}
		
		if($this->input->post('actionf') == 'add_student')
		{
			//check id admission number is already in use
			$tableName = $this->db_prefix.'.student_information';
			$admissionCheck = $this->db->get_where($tableName, array( 'adm' => mysql_real_escape_string($this->input->post('adm'))));
			
			if($admissionCheck->num_rows() > 0)
			{
				//the admission number is already in use, so define error message and display
				$data['error_message'] = 'Sorry, Admission Number '.$this->input->post('adm').' has already been used!<br /> You can use '.$this->input->post('insert_id').'or something else';
				$data['admission'] = $this->input->post('insert_id');
			
				$this->load->view('admissions/header');
				$this->load->view('admissions/addNewStudent', $data);
				$this->load->view('admissions/footer');

			}
			else
			{
				$tablename = $this->db_prefix.'.student_information';
				
				$dataArray = array(
							'adm' => mysql_real_escape_string($this->input->post('adm')),
							'f_name' => mysql_real_escape_string($this->input->post('f_name')),
							'm_name' => mysql_real_escape_string($this->input->post('m_name')),
							'l_name' => mysql_real_escape_string($this->input->post('l_name')),
							'dob' => mysql_real_escape_string($this->input->post('dob')/1000),
							'pob' => mysql_real_escape_string($this->input->post('pob')),
							'bcn' => mysql_real_escape_string($this->input->post('bcn')),
							'gender' => $this->input->post('gender'),
							'nationality' => $this->input->post('nationality'),
							'county' => $this->input->post('county'),
							'photo' => $this->input->post('photo'),
							'doa' => mysql_real_escape_string($this->input->post('doa')),
							'coa' => mysql_real_escape_string($this->input->post('coa')),
							'p_address' => mysql_real_escape_string($this->input->post('p_address')),
							'p_code' => mysql_real_escape_string($this->input->post('p_code')),
							'town' =>  mysql_real_escape_string($this->input->post('town')),
							'pg_f_name' => mysql_real_escape_string($this->input->post('pg_f_name')),
							'pg_l_name' => mysql_real_escape_string($this->input->post('pg_l_name')),
							'phone' => mysql_real_escape_string($this->input->post('phone')),
							'email' => mysql_real_escape_string($this->input->post('email'))
						);
				
				
				$this->db->where('id', $this->input->post('insert_id'));
				$sqlQuery = $this->db->update($tablename, $dataArray);
				
				if($sqlQuery) //addNewStudent sqlQuery executed succesfully
				{
					
					//secure the next admission number in order of insertID
					$tableName = $this->db_prefix.'.student_information';
					$dataArray = array( 'adm' => uniqid());
					$this->db->insert($tableName, $dataArray);
					$data['tmpAdmissionNumber'] = $this->db->insert_id();
					
					
					$data['success_message'] = 'You registered the Student Successfully!';
					
						
					//load the addNewStudent homepage
					$this->load->view('admissions/header');
					$this->load->view('admissions/addNewStudent', $data);
					$this->load->view('admissions/footer');
			
				}
				
			}
			
		}
	
	}
	
	
	public function records()
	{
		if($this->uri->segment(3) === FALSE) //first click so fetch all records for display
		{
			$data['classesArray'] = array( 'CLASS8' => 'CLASS 8', 'CLASS7' => 'CLASS 7', 'CLASS6' => 'CLASS 6', 'CLASS5' => 'CLASS 5', 'CLASS4' => 'CLASS 4', 'CLASS3' => 'CLASS 3', 'CLASS2' => 'CLASS 2', 'CLASS1' => 'CLASS 1', 'PREUNIT' => 'PRE UNIT', 'NURSERY' => 'NURSERY', 'BABYCLASS' => 'BABY CLASS' );
			$tableName = $this->db_prefix.'.student_information';
			$studentRecords = $this->db->get($tableName);
			
			$data['studentRecords'] = $studentRecords;
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/records/all_students', $data);
			$this->load->view('admissions/footer');
			
			
		}
	
	}
	
	public function edit_records()
	{
		if(!$this->input->post())
		{
			$data['chooseAdmissionNumber'] = 1;
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/edit_records', $data);
			$this->load->view('admissions/footer');
		
		}
		if($this->input->post())
		{
			if($this->input->post('actionf') == 'searchAdmission')
			{
				//check admission
				$tableName = $this->db_prefix.'.student_information';
				$data['studentRecords'] = $this->db->get_where($tableName, array( 'adm' => addslashes($this->input->post('admissionNumber')) ) );
				
				$data['recordsFound'] = 1;
				$data['admissionNumber'] = $this->input->post('admissionNumber');
				$this->load->view('admissions/header');
				$this->load->view('admissions/edit_records', $data);
				$this->load->view('admissions/footer');
			
			}
			
			if($this->input->post('actionf') == 'edit_records')
			{
				$tablename = $this->db_prefix.'.student_information';
				
				$dataArray = array(
							'f_name' => mysql_real_escape_string(strtoupper($this->input->post('f_name'))),
							'm_name' => mysql_real_escape_string(strtoupper($this->input->post('m_name'))),
							'l_name' => mysql_real_escape_string(strtoupper($this->input->post('l_name'))),
							'dob' => mysql_real_escape_string($this->input->post('dob')/1000),
							'pob' => mysql_real_escape_string(strtoupper($this->input->post('pob'))),
							'bcn' => mysql_real_escape_string(strtoupper($this->input->post('bcn'))),
							'gender' => $this->input->post('gender'),
							'nationality' => $this->input->post('nationality'),
							'county' => $this->input->post('county'),
							'photo' => $this->input->post('photo'),
							'doa' => mysql_real_escape_string($this->input->post('doa')),
							'coa' => mysql_real_escape_string(strtoupper($this->input->post('coa'))),
							'soa' => addslashes(strtoupper($this->input->post('soa'))),
							'p_address' => mysql_real_escape_string(strtoupper($this->input->post('p_address'))),
							'p_code' => mysql_real_escape_string(strtoupper($this->input->post('p_code'))),
							'town' =>  mysql_real_escape_string(strtoupper($this->input->post('town'))),
							'pg_f_name' => mysql_real_escape_string(strtoupper($this->input->post('pg_f_name'))),
							'pg_l_name' => mysql_real_escape_string(strtoupper($this->input->post('pg_l_name'))),
							'phone' => mysql_real_escape_string(strtoupper($this->input->post('phone'))),
							'email' => mysql_real_escape_string(strtolower($this->input->post('email')))
						);
				
				
				$this->db->where('id', $this->input->post('insert_id'));
				$sqlQuery = $this->db->update($tablename, $dataArray);
				
				if($sqlQuery) //query executed succesfully
				{
					//reload student updated records
					
					//check admission
					$tableName = $this->db_prefix.'.student_information';
					$data['studentRecords'] = $this->db->get_where($tableName, array( 'adm' => addslashes($this->input->post('adm')) ) );
					
					$data['recordsFound'] = 1;
					$data['admissionNumber'] = addslashes($this->input->post('adm'));
					$this->load->view('admissions/header');
					$this->load->view('admissions/edit_records', $data);
					$this->load->view('admissions/footer');
					
				
				}
			
			}
		
		}
	
	}
	
}
