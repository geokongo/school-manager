<?php 

class Admission extends CI_Model {
	
	//extend the parent construct
	function __construct()
	{
		parent::__construct();
		
		$this->db_prefix = DB_PREFIX.$this->session->userdata('client_id');
	
	}
	
	public function new_admission($variable)
	{
		$variable = (object)$variable;
		
		//secure admission number before admission
		if($variable->actionf == 'secure_admission_number')
		{
			$tablename = $this->db_prefix.'.student_information';
			
			$this->db->query(" INSERT INTO $tablename (f_name) VALUES('demo') ");
			$number = $this->db->insert_id();
			
			return $number;
		
		}
		
		//check if admission number is already in use
		if($variable->actionf == 'check_admission_number')
		{
			$tablename = $this->db_prefix.'.student_information';
			
			$sql = $this->db->query(" SELECT * FROM  $tablename WHERE adm = $variable->adm ");
			
			return $sql;
		
		}
		
		//add new student records into the database
		if($variable->actionf == 'add_new_student')
		{
			$tablename = $this->db_prefix.'.student_information';
			
			$data = array(
						'adm' => $variable->adm,
						'f_name' => $variable->f_name,
						'm_name' => $variable->m_name,
						'l_name' => $variable->l_name,
						'dob' => $variable->dob,
						'pob' => $variable->pob,
						'bcn' => $variable->bcn,
						'gender' => $variable->gender,
						'nationality' => $variable->nationality,
						'county' => $variable->county,
						'photo' => $variable->photo,
						'doa' => $variable->doa,
						'coa' => $variable->coa,
						'soa' => $variable->soa,
						'p_address' => $variable->p_address,
						'p_code' => $variable->p_code,
						'town' => $variable->town,
						'pg_f_name' => $variable->pg_f_name,
						'pg_l_name' => $variable->pg_l_name,
						'phone' => $variable->phone,
						'email' => $variable->email
					);
			
			$this->db->where('id', $variable->id);
			$sql = $this->db->update($tablename, $data);
			
			return $sql;
		
		}
		
	}
	
	//this model will handle all classes related controls
	public function classes($variable)
	{
		$variable = (object)$variable;
		
		if($variable->actionf == 'check_classes')
		{
			$tablename = $this->db_prefix.'.options';
			$sql = $this->db->query(" SELECT * FROM $tablename ");
			
			return $sql;
		
		}
		
		if($variable->actionf == 'delete_classes')
		{
			$tablename = $this->db_prefix.'.options';
			$this->db->query(" DELETE FROM $tablename WHERE class = '$variable->class' ");
			
			return;
		
		}
		
		if($variable->actionf == 'add_new_class')
		{
			$tablename = $this->db_prefix.'.options';
			
			$sql = $this->db->insert($tablename, $variable->options_array);
			
			return $sql;
		
		}
		
		if($variable->actionf == 'get_class_options')
		{
			$tablename = $this->db_prefix.'.options';
			
			$sql = $this->db->query(" SELECT * FROM $tablename WHERE class = '$variable->class' ");
			
			return $sql;
		
		}
		
		if($variable->actionf == 'add_class_options')
		{
			
			$tablename = $this->db_prefix.'.options';
			
			$sql = $this->db->query(" UPDATE $tablename SET $variable->option = '$variable->option_array' WHERE class = '$variable->class' ");
			
			return $sql;
		
		}
		
	}
	
	public function records($variable)
	{
		$variable = (object)$variable;
		
		if($variable->actionf == 'get_all_students')
		{
			$tablename = $this->db_prefix.'.student_information';
			
			$records = $this->db->get($tablename);
			
			return $records;
		
		}
		
		if($variable->actionf == 'get_all_by_class')
		{
			$tablename = $this->db_prefix.'.student_information';
			
			$records = $this->db->query(" SELECT * FROM $tablename WHERE coa = '$variable->class'");
			
			return $records;
		
		}
		
		if($variable->actionf == 'get_all_by_class_n_stream')
		{
			$tablename = $this->db_prefix.'.student_information';
			
			$records = $this->db->query(" SELECT * FROM $tablename WHERE coa = '$variable->class' AND soa = '$variable->stream'");
			
			return $records;
		}
		
	
	}


}