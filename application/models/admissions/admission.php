<?php
/**
 *This class in this model is used to handle all the admissions database needs
 *
 *This will execute database abstraction requests during insertion of records into the database
 *retrieving data for viewing, handling updating and deleting of records
 */
class admission extends CI_Model {
	
	public function insert($input) 
	{
		if($input['actionf'] == 'step1')
		{
			$tablename = "basic";
			//we will first check if there is a similar admission number in database and advise as apropriate
			$sql = $this->db->query("SELECT * FROM $tablename WHERE ADM = {$input['adm']} ");
			return $sql;
			
		}
		
		if($input['actionf'] == 'basic_details')
		{
			$tablename = "basic";
			//we will now proceed to enter dat into the database
			
			$sql = $this->db->query(" INSERT INTO $tablename (adm, f_name, m_name, l_name) 
									  VALUES('{$input['adm']}', '{$input['f_name']}', '{$input['m_name']}', '{$input['l_name']}')");
			return $sql;
		
		}
		
		if(isset($input['action']) && $input['action'] == 'get')
		{
			$bt = '_';
			
			if($input['actionf'] == 'get_classes')
			{
			
				$sql = $this->db->get('classes');
				
				return $sql;
			
			}
		
			if($input['actionf'] == 'get_streams')
			{
				$streams = 'streams';
				$tablename = $input['class'].$bt.$streams;
				
				$sql = $this->db->get($tablename);
				
				return $sql;
		
			}
		
		}
		
		if($input['actionf'] == 'pdetails')
		{
			$tablename = "personal";
			
			$sql = $this->db->query( "INSERT INTO $tablename (ADM, DOB, POB, DOA, COA, COUNTY, GENDER, NATIONALITY)
								  VALUES ('{$input['adm']}', '{$input['dob']}', '{$input['pob']}', '{$input['doa']}', '{$input['caa']}', '{$input['county']}', '{$input['gender']}', '{$input['nationality']}')");
			return $sql;
		
		}
		
		if($input['actionf'] == 'cdetails')
		{
			$tablename = "contacts";
			$sql = $this->db->query(" INSERT INTO $tablename (ADM, PADDRESS, PCODE, TOWN) 
									  VALUES ('{$input['adm']}', '{$input['pa']}', '{$input['pc']}', '{$input['town']}')");
			return $sql;
		
		}
		
		if($input['actionf'] == 'fdetails')
		{
			
			$tablename = "father_details";
			
			$sql = $this->db->query(" INSERT INTO $tablename (ADM, f_name, l_name, PADDRESS, PCODE, PHONE, EMAIL) 
										  VALUES ('{$input['adm']}', '{$input['f_name']}', '{$input['l_name']}', '{$input['paddress']}', '{$input['pcode']}', '{$input['phone']}', '{$input['email']}')");
			return $sql;
		
		}
		
		if($input['actionf'] == 'mdetails')
		{
			
			$tablename = "mother_details";
			
			$sql = $this->db->query(" INSERT INTO $tablename (ADM, f_name, l_name, PADDRESS, PCODE, PHONE, EMAIL) 
										  VALUES ('{$input['adm']}', '{$input['f_name']}', '{$input['l_name']}', '{$input['paddress']}', '{$input['pcode']}', '{$input['phone']}', '{$input['email']}')");
			return $sql;
		
		}
		if($input['actionf'] == 'gdetails')
		{
			
			$tablename = "guardian_details";
			
			$sql = $this->db->query(" INSERT INTO $tablename (ADM, f_name, l_name, PADDRESS, PCODE, PHONE, EMAIL) 
										  VALUES ('{$input['adm']}', '{$input['f_name']}', '{$input['l_name']}', '{$input['paddress']}', '{$input['pcode']}', '{$input['phone']}', '{$input['email']}')");
			return $sql;
		
		}
		
	}
	
	
	
	public function view($input) 
	{
		if($input['actionf'] == 'step1')
		{
			$tablename = 'basic';
			$sql = $this->db->query(" SELECT * FROM $tablename WHERE ADM = '{$input['adm']}' ");
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'step2')
		{
			if($input['tablename'] == 'personal')
			{
				$sql = $this->db->query(" SELECT * FROM {$input['tablename']} WHERE ADM = '{$input['adm']}' ");
				
				return $sql;
				
			}
			
			if($input['tablename'] == 'contacts')
			{
				$sql = $this->db->query(" SELECT * FROM {$input['tablename']} WHERE ADM = '{$input['adm']}' ");
				
				return $sql;
			
			}
			
			if($input['tablename'] == 'father_details')
			{
				$sql = $this->db->query(" SELECT * FROM {$input['tablename']} WHERE ADM = '{$input['adm']}' ");
				
				return $sql;
				
			}
			
			if($input['tablename'] == 'mother_details')
			{
				$sql = $this->db->query(" SELECT * FROM {$input['tablename']} WHERE ADM = '{$input['adm']}' ");
				
				return $sql;
			
			}
			
			if($input['tablename'] == 'guardian_details')
			{
				$sql = $this->db->query(" SELECT * FROM {$input['tablename']} WHERE ADM = '{$input['adm']}' ");
				
				return $sql;
			
			}
		}
	
	}
	
	
	public function update($input)
	{
		
		if($input['actionf'] == 'step1')
		{
			$tablename = 'basic';
			$sql = $this->db->where( 'ADM', $input['adm'] );
			$sql = $this->db->get($tablename);
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'get_bdetails')
		{
			$tablename = 'basic';
			
			$sql = $this->db->where('ADM', $input['adm']);
			$sql = $this->db->get($tablename);
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'get_pdetails')
		{
			$tablename = 'personal';
			
			$sql = $this->db->where( 'ADM', $input['adm'] );
			$sql = $this->db->get($tablename);
			
			return $sql;
			
		}
		
		if($input['actionf'] == 'get_contacts')
		{
			$tablename = 'contacts';
		
			$sql = $this->db->where( 'ADM', $input['adm'] );
			$sql = $this->db->get($tablename);
		
			return $sql;
			
		}
			
		if($input['actionf'] == 'get_fdetails')
		{
			$tablename = 'father_details';
		
			$sql = $this->db->where( 'ADM', $input['adm'] );
			$sql = $this->db->get($tablename);
		
			return $sql;
			
		}
		
		if($input['actionf'] == 'get_mdetails')
		{
			$tablename = 'mother_details';
		
			$sql = $this->db->where( 'ADM', $input['adm'] );
			$sql = $this->db->get($tablename);
		
			return $sql;
		
		}
		
		if($input['actionf'] == 'get_gdetails')
		{
			$tablename = 'guardian_details';
		
			$sql = $this->db->where( 'ADM', $input['adm'] );
			$sql = $this->db->get($tablename);
		
			return $sql;
		
		}
		
		if($input['actionf'] == 'basic')
		{
			$tablename = 'basic';
			
			if(isset($input['f_name']))
			{
				$data = array( 'f_name' => $input['f_name']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
				
			}
			
			if(isset($input['m_name']))
			{
				$data = array( 'm_name' => $input['m_name']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
				
			}
			
			if(isset($input['l_name']))
			{
				$data = array( 'l_name' => $input['l_name']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data);
			
			}
		
		}
		
		if($input['actionf'] == 'contacts')
		{
			$tablename = 'contacts';
			
			if(isset($input['paddress']))
			{
				$data = array( 'PADDRESS' => $input['paddress']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
				
			}
			
			if(isset($input['pcode']))
			{
				$data = array( 'PCODE' => $input['pcode']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
				
			}
			
			if(isset($input['town']))
			{
				$data = array( 'TOWN' => $input['town']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data);
			
			}
		
		}
		
		if($input['actionf'] == 'personal' )
		{
			$tablename = 'personal';
			
			if($input['dob'])
			{
				$data = array( 'DOB' => $input['dob'] );
				
				$this->db->where('ADM', $input['adm']);
				$this->db->update($tablename, $data);
				
			}
			
			if($input['doa'])
			{
				$data = array( 'DOA' => $input['doa'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
			
			}
			
			if($input['pob'])
			{
				$data = array( 'POB' => $input['pob'] );
				
				$this->db->where( 'ADM', $input['adm'] );
				$this->db->update( $tablename, $data);
			
			}
			
			if($input['coa'])
			{
				$data = array( 'COA' => $input['coa'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
			
			}
			
			if($input['county'])
			{
				$data = array( 'COUNTY' => $input['county']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
			
			}
			
			if($input['gender'])
			{
				$data = array( 'GENDER' => $input['gender']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
			
			}
			
			if($input['nationality'])
			{
				$data = array( 'NATIONALITY' => $input['nationality']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data);
			
			}
			
			return;
		
		}
		
		if($input['actionf'] == 'fdetails')
		{
			$tablename = 'father_details';
		
			if(isset($input['f_name']))
			{
				$data = array( 'f_name' => $input['f_name'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($input['l_name']))
			{
				$data = array( 'l_name' => $input['l_name'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($input['paddress']))
			{
				$data = array( 'PADDRESS' => $input['paddress']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
			
			}
			
			if(isset($input['pcode']))
			{
				$data = array( 'PCODE' => $input['pcode'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data );
			
			}
			
			if(isset($input['phone']))
			{
				$data = array( 'PHONE' => $input['phone'] );
				
				$this->db->where( 'ADM', $input['adm'] );
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($input['email']))
			{
				$data = array( 'EMAIL' => $input['email'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data );
			
			}
			
			return;
			
		}
		
		if($input['actionf'] == 'mdetails')
		{
			
			$tablename = 'mother_details';
			
			if(isset($input['f_name']))
			{
				$data = array( 'f_name' => $input['f_name'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($input['l_name']))
			{
				$data = array( 'l_name' => $input['l_name'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($input['paddress']))
			{
				$data = array( 'PADDRESS' => $input['paddress']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
			
			}
			
			if(isset($input['pcode']))
			{
				$data = array( 'PCODE' => $input['pcode'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data );
			
			}
			
			if(isset($input['phone']))
			{
				$data = array( 'PHONE' => $input['phone'] );
				
				$this->db->where( 'ADM', $input['adm'] );
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($input['email']))
			{
				$data = array( 'EMAIL' => $input['email'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data );
			
			}
			
			return;
		
		}
		
		if($input['actionf'] == 'gdetails')
		{
			
			$tablename = 'guardian_details';
			
			if(isset($input['f_name']))
			{
				$data = array( 'f_name' => $input['f_name'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($input['l_name']))
			{
				$data = array( 'l_name' => $input['l_name'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($input['paddress']))
			{
				$data = array( 'PADDRESS' => $input['paddress']);
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data);
			
			}
			
			if(isset($input['pcode']))
			{
				$data = array( 'PCODE' => $input['pcode'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update($tablename, $data );
			
			}
			
			if(isset($input['phone']))
			{
				$data = array( 'PHONE' => $input['phone'] );
				
				$this->db->where( 'ADM', $input['adm'] );
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($input['email']))
			{
				$data = array( 'EMAIL' => $input['email'] );
				
				$this->db->where( 'ADM', $input['adm']);
				$this->db->update( $tablename, $data );
			
			}
			
			return;
			
		}
	
	}
	
	public function get($info)
	{
		$bt = '_';
		
		if($info['actionf'] == 'get_classes')
		{
			$sql = $this->db->get('classes');
			
			return $sql;
		
		}
		
		if($info['actionf'] == 'get_streams')
		{
			$streams = 'streams';
			$tablename = $info['class'].$bt.$streams;
			
			$sql = $this->db->get($tablename);
			
			return $sql;
		
		}
	
	}

}



