<?php
class Academic extends CI_Model {
	
	//extend the parent construct
	function __construct()
	{
		parent::__construct();
		
		$this->db_prefix = DB_PREFIX.$this->session->userdata('client_id');
	
	}
	
	public function enter_marks($variable)
	{
		$variable = (object)$variable;
		
		
		if($variable->actionf == 'insert_marks')
		{
			//get class list to use for inserting marks
			$tablename = $this->db_prefix.'.student_information';
			$class_list = $this->db->query(" SELECT adm, f_name, m_name, l_name FROM $tablename WHERE coa = '$variable->class' AND soa = '$variable->stream' ");
			
			//get exam information to update
			$tablename = $this->db_prefix.'.'.$variable->year.'_examinations';
			
			foreach($class_list->result() as $row) //loop through class list inserting each students records into the database
			{
				$adm = $row->adm;
				
				//check if there are already results  in the database
				$exams_array = $this->db->query(" SELECT exams FROM $tablename WHERE adm = '$adm'");
				if($exams_array->num_rows() > 0) //there are already entries
				{
					$exams_arr = $exams_array->row();
					$exams = unserialize($exams_arr->exams);
					$exams[$variable->term][$variable->exam][$variable->subject] = $variable->scores[$adm];
					$exams = mysql_real_escape_string(serialize($exams));
					
					//update the database
					$this->db->query(" UPDATE $tablename SET exams = '$exams' WHERE adm = '$adm' ");
					
				}
				else
				{
					$exams_arr = array();
					$exams_arr[$variable->term][$variable->exam][$variable->subject] = $variable->scores[$adm];
					$exams_arr = mysql_real_escape_string(serialize($exams_arr));
					
					//insert into the database
					$this->db->query(" INSERT INTO  $tablename   SET adm = '$adm', exams = '$exams_arr', f_name = '$row->f_name', m_name = '$row->m_name', l_name = '$row->l_name', class = '$variable->class', stream = '$variable->stream' ");
					
				}
			
			}
			
			return;
		
		}
		
		if($variable->actionf == 'get_marks_by_class_n_stream')
		{
			$tablename = $this->db_prefix.'.'.$variable->year.'_examinations';
			
			$marks = $this->db->query(" SELECT * FROM $tablename WHERE class='$variable->class' AND stream = '$variable->stream'");
			
			return $marks;
			
		}
	
	}
	
	
	public function spreadsheets($variable)
	{
		$variable = (object)$variable;
		
		
			//get the pregnant raw marks array
			$tableName = $this->db_prefix.'.'.$variable->year.'_examinations';
			$raw_marks_array = $this->db->query(" SELECT * FROM $tableName WHERE class = '$variable->class' ");
			
			if($raw_marks_array->num_rows() < 1) { $error['error_message'] = '<p class="alert alert-danger">There are no marks entered yet</p>'; return $error;  } //there are no marks in the database yet. return at this point
			
			//get class exams  and subjects array
			$tableName = $this->db_prefix.'.options';
			$exams_n_subjects_array = $this->db->query(" SELECT exams, subjects  FROM $tableName WHERE class = '$variable->class' ");
			
			foreach($exams_n_subjects_array->result() as $something) { $subjects = $something->subjects; $exams = $something->exams; } //assign the exams and subjects to variables
			$subjects = unserialize(stripslashes($subjects));
			$exams = unserialize(stripslashes($exams));
			
			/*loop throught the $raw_marks_array result set one admission number at a time
			 *gettting the terms and subjects for which marks have been set and checking 
			 *their values against the exams and subjects array from the db and only using
			 *the marks if the exams and subjects are valid. We calculate the average for every 
			 *subject and insert the valuses in a temporary table plus the total sum of the subjects.
			 *we will then select the whole table and order by the TOTAL fields for ranking
			 */
			
			
			//define the arrays that we are going to use
			$overalRanking = array(); //contains all total marks in descending order, used to find position and compose the spreadsheetArray to be saved in the database finally
			$spreadsheetResultSet = array(); //contains all student scores ordered by admission number
			$subjectRanking = array(); //contains scores for every subject, used to find the top three per subject
			
			//start looping through the result set
			foreach($raw_marks_array->result() as $row)
			{
				$spreadsheetResultSet[$row->adm]['name'] = $row->f_name.' '.substr($row->m_name, 0, 1).'. '.$row->l_name;
				$spreadsheetResultSet[$row->adm]['stream'] = $row->stream;
				
				$marks = unserialize($row->exams);
				
				$term = array($variable->term);
				$terms = array_keys($marks);
				$term_check = array_intersect($terms, $term);
				
				//if(empty($term_check)) { $error['error_message'] = '<p class="alert alert-danger">There are no marks for '.$variable->term.'</p>'; return $error; }
				$this_exams = array_keys($marks[$variable->term]);
				$totalExamCount = count($exams);
				$exam_count = count($this_exams);
				$subject_count = count($subjects);
				
				$subjectsTotal = 0; //variable to hold subjects TOTAL score, it's incremented after every subject iteration
				for($subject_itr = 0; $subject_itr < $subject_count; $subject_itr++) //iterate through each subject calculating its average score
				{
					$subject = $subjects[$subject_itr];
					$score = 0;
					for($exam_itr = 0; $exam_itr < $exam_count; $exam_itr++)
					{
						$exam = $this_exams[$exam_itr];
						if(isset($marks[$variable->term][$exam][$subject])) { $score += $marks[$variable->term][$exam][$subject]; }
						else { $score += 0; }
					
					}
					
					$score_avg = round($score/$totalExamCount);
					$subjectsTotal += $score_avg;
					
					//insert score_avg into table
					$subject_field = preg_replace('/\s+/', '_', $subject);
					$spreadsheetResultSet[$row->adm][$subject] = $score_avg;
					$subjectRanking[$subject][] = $score_avg;
					
				}
				
				$totalAverageScore = round($subjectsTotal/$subject_count);
				$averageScore = $totalAverageScore;
				$grade = $this->grading->getGrade($averageScore);
				
				$spreadsheetResultSet[$row->adm]['total'] = $subjectsTotal;
				$spreadsheetResultSet[$row->adm]['grade'] = $grade;
				$overalRanking[] = $subjectsTotal;
				
			}
			
			//sort the overalRanking in DESC order
			array_multisort($overalRanking, SORT_DESC);
			
			//create a spreadsheet array
			$spreadsheetArray[$variable->year][$variable->term] = $overalRanking;
			
			//serialize the spreadsheetArray and insert into the database
			$spreadsheetArray = mysql_real_escape_string(serialize($spreadsheetArray));
			$tableName = $this->db_prefix.'.options';
			$this->db->query(" UPDATE $tableName SET spreadsheet = '$spreadsheetArray' WHERE class = '$variable->class' ");
			
		if($variable->actionf == 'get_spreadsheet_result_set')
		{	
			return array($spreadsheetResultSet,$overalRanking,$subjects,$subjectRanking);

		}
		else { return; }
	
	}
	
	public function reports($variable)
	{
		$variable = (object)$variable;
		
		if($variable->actionf == 'getReportsResultSet')
		{
			//get the pregnant raw marks array
			$tableName = $this->db_prefix.'.'.$variable->year.'_examinations';
			$rawMarksArray = $this->db->query(" SELECT * FROM $tableName WHERE class = '$variable->class' ");
			
			//get the spreadsheetArray
			$tableName = $this->db_prefix.'.options';
			$spreadsheetObject = $this->db->query(" SELECT spreadsheet FROM $tableName WHERE class = '$variable->class' ");
			$spreadsheetObject = $spreadsheetObject->row();
			$spreadsheetObject = unserialize(stripslashes($spreadsheetObject->spreadsheet));
			
			if(isset($spreadsheetObject[$variable->year][$variable->term])) {   $spreadsheetArray = $spreadsheetObject[$variable->year][$variable->term]; }
			else { $error['error_message'] = '<p class="alert alert-danger">You have not created the spreadsheet yet!</p>'; return $error;  } //there are no marks in the database yet. return at this point
			
			
			//we create a multidimensional array called metaData to hold variables that we will need in the view to process the report forms
			$metaData['numberOfStudents'] = $rawMarksArray->num_rows();
			
			if($rawMarksArray->num_rows() < 1) { $error['error_message'] = '<p class="alert alert-danger">There are no marks entered yet</p>'; return $error;  } //there are no marks in the database yet. return at this point
			
			//get class exams  and subjects array
			$tableName = $this->db_prefix.'.options';
			$examsSubjectsArray = $this->db->query(" SELECT exams, subjects  FROM $tableName WHERE class = '$variable->class' ");
			
			foreach($examsSubjectsArray->result() as $something) { $subjects = $something->subjects; $exams = $something->exams; } //assign the exams and subjects to variables
			$subjects = unserialize(stripslashes($subjects));
			$exams = unserialize(stripslashes($exams));
			
			$metaData['subjectsArray'] = $subjects;
			$metaData['examsArray'] = $exams;
			$metaData['dateOfPreparation'] = date('l, F jS, Y');
			
			/*loop throught the $raw_marks_array result set one admission number at a time
			 *gettting the terms and subjects for which marks have been set and checking 
			 *their values against the exams and subjects array from the db and only using
			 *the marks if the exams and subjects are valid. We calculate the average for every 
			 *subject and insert the valuses in a multidimensional array $resultSet plus the total sum of the subjects.
			 *we will then pass this array back to the controller for passing to the view
			 */
			 
			$resultSet = array(); //initialize the $resultSet array
			
			//start looping through the result set
			foreach($rawMarksArray->result() as $row)
			{
				$resultSet[$row->adm]['name'] = $row->f_name.' '.$row->m_name.' '.$row->l_name;
				$resultSet[$row->adm]['stream'] = $row->stream;
				
				$marks = unserialize(stripslashes($row->exams));
				
				$term = array($variable->term);
				$terms = array_keys($marks);
				$term_check = array_intersect($terms, $term);
				
				//if(empty($term_check)) { $error['error_message'] = '<p class="alert alert-danger">There are no marks for '.$variable->term.'</p>'; return $error; }
				$thisExams = array_keys($marks[$variable->term]);
				$examsCount = count($exams);
				$subjectCount = count($subjects);
				
				$subjectsTotal = 0; //variable to hold subjects TOTAL score, it's incremented after every subject iteration
				foreach($subjects as $subjectIndex => $subjectName) //iterate through each subject calculating its average score
				{
					$score = 0;
					foreach($thisExams as $examIndex => $examName)
					{
						
						if(isset($marks[$variable->term][$examName][$subjectName])) 
						{ 
							$score += $marks[$variable->term][$examName][$subjectName];
							$resultSet[$row->adm][$subjectName][$examName] = $marks[$variable->term][$examName][$subjectName];
							
						}
						else { $score += 0;   }
						
					}
					
					$averageScore = round($score/$examsCount);
					$resultSet[$row->adm][$subjectName]['avg'] = $averageScore;
					$resultSet[$row->adm][$subjectName]['grade'] = $this->grading->getGrade($averageScore);
					$resultSet[$row->adm][$subjectName]['remarks'] = $this->grading->getRemarks($averageScore);
					
					$subjectsTotal += $averageScore;
					
				}
				
				$totalAverageScore = round($subjectsTotal/$subjectCount);
				$averageScore = $totalAverageScore;
				$resultSet[$row->adm]['avgGrade'] = $this->grading->getGrade($averageScore);
				$resultSet[$row->adm]['total'] = $subjectsTotal;
				$resultSet[$row->adm]['outOf'] = $subjectCount * 100;
				$resultSet[$row->adm]['pos'] = array_search($subjectsTotal, $spreadsheetArray) + 1;
				
			}
			
			return array($resultSet,$metaData);
		
		}
	
	}
	
	public function grading_model($variable)
	{
		$variable = (object)$variable;
		
		$tablename = $this->db_prefix.'.options';
		
		$query  = $this->db->query(" SELECT grading FROM $tablename WHERE class = '$variable->class' ");
		
		return $query;
	
	}
}
