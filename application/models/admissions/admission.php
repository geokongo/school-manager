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
		
		if($actionf == 'get_bdetails')
		{
			$tablename = 'basic';
			
			$sql = $this->db->where('ADM', $adm);
			$sql = $this->db->get($tablename);
			
			return $sql;
		
		}
		
		if($actionf == 'get_pdetails')
		{
			$tablename = 'personal';
			
			$sql = $this->db->where( 'ADM', $adm );
			$sql = $this->db->get($tablename);
			
			return $sql;
			
		}
		
		if($actionf == 'get_contacts')
		{
			$tablename = 'contacts';
		
			$sql = $this->db->where( 'ADM', $adm );
			$sql = $this->db->get($tablename);
		
			return $sql;
			
		}
			
		if($actionf == 'get_fdetails')
		{
			$tablename = 'father_details';
		
			$sql = $this->db->where( 'ADM', $adm );
			$sql = $this->db->get($tablename);
		
			return $sql;
			
		}
		
		if($actionf == 'get_mdetails')
		{
			$tablename = 'mother_details';
		
			$sql = $this->db->where( 'ADM', $adm );
			$sql = $this->db->get($tablename);
		
			return $sql;
		
		}
		
		if($actionf == 'get_gdetails')
		{
			$tablename = 'guardian_details';
		
			$sql = $this->db->where( 'ADM', $adm );
			$sql = $this->db->get($tablename);
		
			return $sql;
		
		}
		
		if($actionf == 'basic')
		{
			$adm = $this->session->userdata('admission');
			$tablename = 'basic';
			$names = $this->session->userdata('names');
			
			if(isset($names['f_name']))
			{
				$f_name = $names['f_name'];
				$data = array( 'f_name' => $f_name);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
				
			}
			
			if(isset($names['m_name']))
			{
				$m_name = $names['m_name'];
				$data = array( 'm_name' => $m_name);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
				
			}
			
			if(isset($names['l_name']))
			{
				$l_name = $names['l_name'];
				$data = array( 'l_name' => $l_name);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data);
			
			}
			$this->session->unset_userdata('names');
			
			
		
		}
		
		if($actionf == 'contacts')
		{
			$adm = $this->session->userdata('admission');
			$tablename = 'contacts';
			$values = $this->session->userdata('values');
			
			if(isset($values['paddress']))
			{
				$paddress = $values['paddress'];
				$data = array( 'PADDRESS' => $paddress);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
				
			}
			
			if(isset($values['pcode']))
			{
				$pcode = $values['pcode'];
				$data = array( 'PCODE' => $pcode);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
				
			}
			
			if(isset($values['town']))
			{
				$town = $values['town'];
				$data = array( 'TOWN' => $town);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data);
			
			}
			$this->session->unset_userdata('values');
		
		}
		
		if($actionf == 'personal' )
		{
			$tablename = 'personal';
			
			if($this->session->userdata('dob'))
			{
				$dob = $this->session->userdata('dob');
				$data = array( 'DOB' => $dob );
				
				$this->db->where('ADM', $adm);
				$this->db->update($tablename, $data);
				
				$this->session->unset_userdata('dob');
				
			}
			
			if($this->session->userdata('doa'))
			{
				$doa = $this->session->userdata('doa');
				$data = array( 'DOA' => $doa );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
				
				$this->session->unset_userdata('doa');
			
			}
			
			if($this->session->userdata('pob'))
			{
				$pob = $this->session->userdata('pob');
				$data = array( 'POB' => $pob );
				
				$this->db->where( 'ADM', $adm );
				$this->db->update( $tablename, $data);
				
				$this->session->unset_userdata('pob');
			
			}
			
			if($this->session->userdata('coa'))
			{
				$coa = $this->session->userdata('coa');
				$data = array( 'COA' => $coa );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
				
				$this->session->unset_userdata('coa');
			
			}
			
			if($this->session->userdata('county'))
			{
				$county = $this->session->userdata('county');
				$data = array( 'COUNTY' => $county);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
				
				$this->session->unset_userdata('county');
			
			}
			
			if($this->session->userdata('gender'))
			{
				$gender = $this->session->userdata('gender');
				$data = array( 'GENDER' => $gender);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
				
				$this->session->unset_userdata('gender');
			
			}
			
			if($this->session->userdata('nationality'))
			{
				$nationality = $this->session->userdata('nationality');
				$data = array( 'NATIONALITY' => $nationality);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data);
				
				$this->session->unset_userdata('nationality');
			
			}
			
			return;
		
		}
		
		if($actionf == 'fdetails')
		{
			$tablename = 'father_details';
			$values = $this->session->userdata('values');
			
			if(isset($values['f_name']))
			{
				$data = array( 'f_name' => $values['f_name'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($values['l_name']))
			{
				$data = array( 'l_name' => $values['l_name'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($values['paddress']))
			{
				$data = array( 'PADDRESS' => $values['paddress']);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
			
			}
			
			if(isset($values['pcode']))
			{
				$data = array( 'PCODE' => $values['pcode'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data );
			
			}
			
			if(isset($values['phone']))
			{
				$data = array( 'PHONE' => $values['phone'] );
				
				$this->db->where( 'ADM', $adm );
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($values['email']))
			{
				$data = array( 'EMAIL' => $values['email'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data );
			
			}
			
			$this->session->unset_userdata('values');
			return;
			
		}
		
		if($actionf == 'mdetails')
		{
			
			$tablename = 'mother_details';
			$values = $this->session->userdata('values');
			
			if(isset($values['f_name']))
			{
				$data = array( 'f_name' => $values['f_name'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($values['l_name']))
			{
				$data = array( 'l_name' => $values['l_name'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($values['paddress']))
			{
				$data = array( 'PADDRESS' => $values['paddress']);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
			
			}
			
			if(isset($values['pcode']))
			{
				$data = array( 'PCODE' => $values['pcode'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data );
			
			}
			
			if(isset($values['phone']))
			{
				$data = array( 'PHONE' => $values['phone'] );
				
				$this->db->where( 'ADM', $adm );
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($values['email']))
			{
				$data = array( 'EMAIL' => $values['email'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data );
			
			}
			
			$this->session->unset_userdata('values');
			return;
			
		
		}
		
		if($actionf == 'gdetails')
		{
			
			$tablename = 'guardian_details';
			$values = $this->session->userdata('values');
			
			if(isset($values['f_name']))
			{
				$data = array( 'f_name' => $values['f_name'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($values['l_name']))
			{
				$data = array( 'l_name' => $values['l_name'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($values['paddress']))
			{
				$data = array( 'PADDRESS' => $values['paddress']);
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data);
			
			}
			
			if(isset($values['pcode']))
			{
				$data = array( 'PCODE' => $values['pcode'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update($tablename, $data );
			
			}
			
			if(isset($values['phone']))
			{
				$data = array( 'PHONE' => $values['phone'] );
				
				$this->db->where( 'ADM', $adm );
				$this->db->update( $tablename, $data);
			
			}
			
			if(isset($values['email']))
			{
				$data = array( 'EMAIL' => $values['email'] );
				
				$this->db->where( 'ADM', $adm);
				$this->db->update( $tablename, $data );
			
			}
			
			$this->session->unset_userdata('values');
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



