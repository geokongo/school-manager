<?php 

/**
 *This is the academic model
 *
 *This model will handle all database queries from the academics user dashboard
 */
 
 class academic extends CI_Model {
	
	//this function will handle all database requests related to entering results into the databse.
	public function enter($input)
	{
		
		if(isset($input->actionf))	//the initial step, step0, starts with getting classes for the view so that the user could select for which to enter data.
		{	if($input->actionf == 'step0')
			{
				$tablename = $input->class;
				
				$sql = $this->db->query(" SELECT * FROM $tablename ");
				
				return $sql;
			
			}
			
			if($input->actionf == 'create_table')	//this creates a table to hold results in the database.
			{
				$tablename = $input->class.'_'.$input->stream.'_'.$input->subject.'_'.$input->exam.'_'.$input->term.'_'.$input->year;
			
				$sql = $this->db->query(" CREATE TABLE IF NOT EXISTS $tablename (
										NAME VARCHAR(20), 
										ADM INT(10) NOT NULL UNIQUE,
										SCORE INT(20) ) ");
		
				if($sql)
				{
					return $tablename;
			
				}
		
			}
			
			if($input->actionf == 'insert_records')	//this inserts records from the .csv file into the table in the database.
			{
				$output = $_SESSION['output'];
				
				$file_path = $output->file_path;
				$tablename = $output->tablename;
				
				$file_path = addslashes($file_path);

				$sql = $this->db->query(" LOAD DATA INFILE  '$file_path' 
										  INTO TABLE $tablename		
										  FIELDS terminated by ','
										  LINES terminated by '\r\n'
										  IGNORE 1 lines
										  (NAME, ADM, SCORE)");
				return $sql;
			
			}
			
		}
		
		if(!isset($input->actionf))
		{
		
			if(isset($input->class) && isset($input->stream))	//this gets class streams.
			{
				$tablename = $input->class.'_'.$input->stream;
				
				$sql = $this->db->query(" SELECT * FROM $tablename ");
				
				return $sql;
			
			}
			
			if(isset($input->class) && isset($input->subject))	//this gets class subjects.
			{
				$tablename = $input->class.'_'.$input->subject;
				
				$sql = $this->db->query(" SELECT * FROM $tablename ");
				
				return $sql;
			
			}
			
			if(isset($input->class) && isset($input->exam))	//this gets class examinations.
			{
				$tablename = $input->class.'_'.$input->exam;
				
				$sql = $this->db->query(" SELECT * FROM $tablename ");
				
				return $sql;
			
			}
			
			if(isset($input->term))	//this gets terms.
			{
				$tablename = $input->term;
				
				$sql = $this->db->query(" SELECT * FROM $tablename ");
				
				return $sql;
			
			}
			
			if(isset($input->year))	//this gets years.
			{
				$tablename = $input->year;
				
				$sql = $this->db->query(" SELECT * FROM $tablename ");
				
				return $sql;
			
			}
		
		}
		
	
	}
	
	
	public function get($input)	//this function helps to fetch records generally from the database.
	{
		if($input->actionf == 'fetch_records')
		{
			
			$tablename = $_SESSION['output']->tablename;
			
			$sql = $this->db->query(" SELECT * FROM $tablename ");
			
			return $sql;
			
		}
		
		if($input->actionf == 'get_classes')	//gets a list of all classes registered in the database. 
		{
			$sql = $this->db->query(" SELECT * FROM classes ");
			
			return $sql;

		}
		
		if($input['actionf'] == 'get_grades')	//gets a list of all grades and points already defined in the database.
		{
			$sql = $this->db->query(" CREATE TABLE IF NOT EXISTS grade_points ( GRADE VARCHAR(2) UNIQUE, POINTS INT ) ");
			
			if($sql)
			{
				$sql = $this->db->query(" SELECT * FROM grade_points ");
				
				return $sql;
			
			}
		}
		
		if($input['actionf'] == 'get_grading')
		{
			$bt = '_';
			$value = 'grading';
			
			$output = $this->session->userdata('sess');
			
			$tablename = $output['class'].$bt.$value;
			
			$sql = $this->db->query(" CREATE TABLE IF NOT EXISTS $tablename (
										GRADE VARCHAR(2) UNIQUE,
										FROM_ INT,
										TO_ INT,
										REMARKS VARCHAR(100) )
										");
			
			if($sql)
			{
				$sql = $this->db->query(" SELECT * FROM $tablename ");
				
				return $sql;
			
			}
			
		
		}
		
		
	}
	
	public function fetch_records($input)
	{
		$bt = '_';
		$tablename = $class.$bt.$stream.$bt.$subject.$bt.$exam.$bt.$term.$bt.$year;
		
		$sql = $this->db->query(" SELECT * FROM $tablename ");
		
		return $sql;
	
	}
	
	public function fetch_records2($input)
	{
		$sql = $this->db->query(" SELECT SCORE FROM $tablename WHERE ADM = $adm ");
		
		return $sql;
	
	}
	
	public function sort_table($spreadsheet_tablename)
	{
		$sql = $this->db->query(" ALTER TABLE $spreadsheet_tablename ORDER BY TOTAL DESC ");
		
		return $sql;
	
	}
	
	public function select_table($spreadsheet_tablename)
	{
		$sql = $this->db->query(" SELECT * FROM $spreadsheet_tablename ");
		
		if($sql)
		{
			
			$results = $sql->result_array();
			
			static $itr_;
			$itr_ = 0;
			
			foreach($results as $row)
			{
				$total = $row['TOTAL'];
				
				$sql = $this->db->query(" SELECT COUNT(*) AS POS FROM $spreadsheet_tablename x WHERE x.TOTAL >= '$total' ");
				
				if($sql)
				{
					$pos = $sql->result_array();
					
					foreach($pos as $position)
					{
						$val = $position['POS'];
					
					}
					
					$results[$itr_]['POS'] = $val;
					
				}
				
				$itr_++;
			
			}
			
			return $results;
			
			$itr_ = NULL;
		}
	
	}
	
	public function insert_adm_name($spreadsheet_tablename, $adm, $name, $total)
	{
		if(empty($total) && $name != 'sort_table')
		{	
			$sql = $this->db->query(" INSERT INTO $spreadsheet_tablename SET ADM = '$adm', NAME = '$name' ");
			
		}	
		
		if( !empty($total))
		{
			$sql = $this->db->query(" UPDATE $spreadsheet_tablename SET TOTAL = $total WHERE ADM = $adm ");
			
			return $sql;
		}
		
		if($name == 'sort_table')
		{
			$sql = $this->db->query(" ALTER TABLE $spreadsheet_tablename ORDER BY TOTAL DESC ");
			
			return $sql;
		
		}
		
	}
	
	public function update_score($spreadsheet_tablename, $adm, $subject_itself, $average_score)
	{
		$sql = $this->db->query(" UPDATE $spreadsheet_tablename SET $subject_itself = $average_score WHERE ADM = $adm ");
	
	}
	
	public function insert_grades($input)
	{
		if($input['actionf'] == 'grade_points')
		{
			if( empty($input['grade_']))
			{
				$sql = $this->db->query(" INSERT INTO grade_points SET GRADE = '{$input['grade']}', POINTS = '{$input['points']}' ");
				
				return $sql;
				
			}
			
			if( !empty($input['grade_']))
			{
				$sql = $this->db->query(" UPDATE grade_points SET POINTS = '{$input['points']}' WHERE GRADE = '{$input['grade_']}' ");
				
				return $sql;
			
			}
			
		}	
		
		if($input['actionf'] == 'grading')
		{
			
			if( empty($input['grade_']))
			{
				$bt = '_';
				$value = 'grading';
				$tablename = $this->session->userdata('class').$bt.$value;
				
				$sql = $this->db->query(" INSERT INTO $tablename SET GRADE = '{$input['grade']}', FROM_ = '{$input['from']}', TO_ = '{$input['to']}', REMARKS = '{$input['remarks']}' ");
				
				return $sql;
				
			}
			
			else
			{
				$bt = '_';
				$value = 'grading';
				$tablename = $this->session->userdata('class').$bt.$value;
				
				$sql = $this->db->query(" UPDATE $tablename SET FROM_ = '{$input['from']}', TO_ = '{$input['to']}', REMARKS = '{$input['remarks']}' WHERE GRADE = '{$input['grade_']}' ");
				
				return $sql;
			
			}
			
		}
	
	}
	
	public function spreadsheets($input)
	{
		if($input['actionf'] == 'get_class_list')
		{
			$tablename = $input['class'].'_'.$input['stream'].'_'.$input['year'];
			
			$sql = $this->db->query(" SELECT * FROM $tablename ");
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'get_exams')
		{
			$tablename = $input['class'].'_'.$input['exam'];
			
			$sql = $this->db->query(" SELECT EXAM FROM $tablename ");
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'get_subjects')
		{
			$tablename = $input['class'].'_'.$input['subject'];
			
			$sql = $this->db->query(" SELECT SUBJECTS FROM $tablename ");
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'create_spreadsheet_table')
		{
			$value = 'spreadsheet';
			$tablename = $input['class'].'_'.$input['stream'].'_'.$input['term'].'_'.$input['year'].'_'.$value;
			
			$sql = $this->db->query(" CREATE TABLE IF NOT EXISTS $tablename (
									  ADM INT UNIQUE,
									  NAME VARCHAR(100)
									  ) ");
			if($sql)
			{
				foreach($subject->result() as $row)
				{
					$subject_itself = $row->SUBJECTS;
					
					$sql = $this->db->query(" ALTER TABLE $tablename 
											  ADD COLUMN ( $subject_itself INT) ");
				
				}
				
				if($sql)
				{
					$sql = $this->db->query(" ALTER TABLE $tablename 
											  ADD COLUMN ( TOTAL INT) ");
											  
					return $tablename;
				
				}
				
				
			
			}
		
		}
	
	}
	
	public function reports($input)
	{
		
		if($input['actionf'] == 'step0')
		{
			$tablename = $input['class'];
			
			$sql = $this->db->query(" SELECT * FROM $tablename ");
			
			return $sql;
		
		}
		
		
		if($input['actionf'] == 'get_streams')
		{
			$tablename = $input['class'].'_'.$input['stream'];
			
			$sql = $this->db->query(" SELECT * FROM $tablename ");
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'get_terms')
		{
			$tablename = $input['term'];
			
			$sql = $this->db->query(" SELECT * FROM $tablename ");
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'get_years')
		{
			$tablename = $input['year'];
			
			$sql = $this->db->query(" SELECT * FROM $tablename ");
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'get_class_list')
		{
			$tablename = $input['class'].'_'.$input['stream'].'_'.$input['year'];
			
			$sql = $this->db->query(" SELECT * FROM $tablename ");
			
			return $sql;
		
		}
		
		if($input['actionf'] == 'get_report')
		{
			$output = $_SESSION['output'];
			
			$class = $output['class'];
			$exam = 'examinations';
			
			$tablename = $class.'_'.$exam;
			
			$sql = $this->db->query(" SELECT * FROM $tablename ");
			
			if($sql)
			{
				$_SESSION['output']['exams'] = $sql;
				
				$subject = 'subjects';
				
				$tablename = $class.'_'.$subject;
				
				$sql = $this->db->query(" SELECT * FROM $tablename ");
				
				if($sql)
				{
					$_SESSION['output']['subjects'] = $sql;
					
					$sql = $this->db->query(" CREATE TEMPORARY TABLE report ( SUBJECT VARCHAR(50) UNIQUE ) ");
					if($sql)
					{
						$output = $_SESSION['output'];
						
						$exams = $output['exams'];
						
						foreach($exams->result() as $row)
						{
							$sql = $this->db->query(" ALTER TABLE report ADD COLUMN ( $row->EXAM INT ) ");
						
						}
						
						$sql = $this->db->query(" ALTER TABLE report ADD COLUMN ( AVG INT ) ");
						
						if($sql)
						{
							
							$adm = $output['adm'];
							
							static $total_avg;
							$total = 0;
							
							$subjects = $output['subjects'];
							$no_of_sub = $subjects->num_rows();
							
							foreach($subjects->result() as $subjects_row)
							{
								$subject_itself = $subjects_row->SUBJECTS;
								
								$this->db->query(" INSERT INTO report SET SUBJECT = '$subject_itself' ");
								
								$exams = $output['exams'];
								$iterations = $exams->num_rows();
								
								foreach($exams->result() as $exams_row)
								{
									static $val;
									static $itr;
									
									$itr = 1;
									
									$exam_itself = $exams_row->EXAM;
									$tablename = $output['class'].'_'.$output['stream'].'_'.$subject_itself.'_'.$exam_itself.'_'.$output['term'].'_'.$output['year'];

									$sql = $this->db->query(" SELECT SCORE FROM $tablename WHERE ADM = $adm ");
									
									if($sql->num_rows() > 0)
									{
										$row = $sql->row();
										
										$sql = $this->db->query(" UPDATE report SET $exam_itself = '$row->SCORE' WHERE SUBJECT = '$subject_itself' ");
										
										$val2 = $row->SCORE;
									
									}
									
									else
									{
										$row->SCORE = 0;
										
										$sql = $this->db->query(" UPDATE report SET $exam_itself = '$row->SCORE' WHERE SUBJECT = '$subject_itself' ");
										
										$val2 = $row->SCORE;
										
									}	
									
									$val += $val2;
									$itr +=1;
									
								}
								
								$average_score = $val/$iterations;
								$average_score_ = round($average_score);
								
								$this->db->query(" UPDATE report SET AVG = '$average_score_' WHERE SUBJECT = '$subject_itself' ");
								
								$total_avg += $average_score_;
								
								if($itr == $iterations)
								{
									$val = NULL;
									$itr = NULL;
									
								}
								
							}
							
							$out_of_score = $no_of_sub * 100;
							
							$_SESSION['output']['total_avg'] = $total_avg;
							$_SESSION['output']['out_of_score'] = $out_of_score;
							
							$sql = $this->db->query(" SELECT * FROM report ");
							
							if($sql)
							{
								$_SESSION['output']['report'] = $sql;
							
							}

							$total_avg = NULL;
							
						}
					
					}
				
				}
				
				$this->db->query(" DROP TABLE report ");
			
			}
			
			$class = $output['class'];
			$stream = $output['stream'];
			$term = $output['term'];
			$year = $output['year'];
			$sp = 'spreadsheet';
			
			$tablename = $class.'_'.$stream.'_'.$term.'_'.$year.'_'.$sp;
			
			$sql = $this->db->query(" ALTER TABLE $tablename ORDER BY TOTAL DESC ");
			
			if($sql)
			{
				$total = $_SESSION['output']['total_avg'];
				
				$sql = $this->db->query(" SELECT COUNT(*) AS POS FROM $tablename x WHERE x.TOTAL >= '$total' ");

				if($sql)
				{
					$row = $sql->row();

					$_SESSION['output']['pos'] = $row->POS;
				
				}
				
			}
			
			return $sql;
		
		}
		
	}
	
	public function grading_model($tablename)
	{
		$sql = $this->db->query(" SELECT * FROM $tablename ");
		
		return $sql;
	
	}
 
 }