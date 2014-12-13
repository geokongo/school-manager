<?php 

class Academics extends SM_Controller {
	
	//extend parent construct
	function __construct()
	{
		parent::__construct();
		$this->db_prefix = DB_PREFIX.$this->session->userdata('client_id');
		$this->load->model('academic');
		$this->load->model('admission');
	
	}
	
	public function index()
	{
		$this->load->view('academics/header');
		$this->load->view('academics/home');
		$this->load->view('academics/footer');
	
	
	}
	
	
	
	
	
	public function grading()
	{
		if(!$this->input->post())
		{
			//get classes to use for setting grading
			{
				//getClasses
				$tableName = $this->db_prefix.'.options';
				$data['classes'] = $this->db->get($tableName);
				
				$this->load->view('academics/header');
				$this->load->view('academics/grading', $data);
				$this->load->view('academics/footer');
			
			}
		
		}
		
		if($this->input->post())
		{
			if($this->input->post('actionf') == 'add_new_grading' OR $this->input->post('actionf') == 'edit_grading')
			{
				//check to see if there are already defined grades in the system
				//get classOptions
				$tableName = $this->db_prefix.'.options';
				$classOptionsObject = $this->db->get_where($tableName, array('class' => addslashes($this->input->post('class'))) );
				
				if($classOptionsObject) //query executed successully
				{
					foreach($classOptionsObject->result() as $classOptions)
					{
						$gradingArray = unserialize(stripslashes($classOptions->grading));
						
						if(empty($gradingArray)) //no grading defined yet
						{
							$gradingArray = array(
											addslashes(trim($this->input->post('grade'))) => array(
																						'from' => addslashes(trim($this->input->post('from'))),
																						'to' => addslashes(trim($this->input->post('to'))),
																						'remarks' => addslashes(trim($this->input->post('remarks'))),
																						'points' => addslashes(trim($this->input->post('points')))
																			)
										);
							$variable['option'] = 'grading';
							$variable['option_array'] = addslashes(serialize($gradingArray));
							$variable['class'] = addslashes($this->input->post('class'));
							$variable['actionf'] = 'add_class_options';
							
							$this->admission->classes($variable); //insert the serialized grading array into the database
							
							//reload the grading page
							{
								//getClasses
								$tableName = $this->db_prefix.'.options';
								$data['classes'] = $this->db->get($tableName);
								
								$this->load->view('academics/header');
								$this->load->view('academics/grading', $data);
								$this->load->view('academics/footer');
							
							}
							
						}
						
						else //there are already grades defined so we update the array
						{
							$gradingArray[addslashes(trim($this->input->post('grade')))]['from'] = addslashes(trim($this->input->post('from')));						
							$gradingArray[addslashes(trim($this->input->post('grade')))]['to'] = addslashes(trim($this->input->post('to')));						
							$gradingArray[addslashes(trim($this->input->post('grade')))]['remarks'] = addslashes(trim($this->input->post('remarks')));						
							$gradingArray[addslashes(trim($this->input->post('grade')))]['points'] = addslashes(trim($this->input->post('points')));		

							//serialize the grades array and update the database
							$variable['option'] = 'grading';
							$variable['option_array'] = addslashes(serialize($gradingArray));
							$variable['class'] = addslashes($this->input->post('class'));
							$variable['actionf'] = 'add_class_options';
							
							$this->admission->classes($variable); //insert the serialized grading array into the database
							
							//reload the grading page
							{
								//getClasses
								$tableName = $this->db_prefix.'.options';
								$data['classes'] = $this->db->get($tableName);
								
								$this->load->view('academics/header');
								$this->load->view('academics/grading', $data);
								$this->load->view('academics/footer');
							
							}
							
						}
					
					}
				
				}
				
			}
			
			if($this->input->post('actionf') == 'delete_grade') //grade is supposed to be deleted
			{
				//check to see if there are already defined grades in the system
				//get classOptions
				$tableName = $this->db_prefix.'.options';
				$classOptionsObject = $this->db->get_where($tableName, array('class' => addslashes($this->input->post('class'))) );
				
				if($classOptionsObject) //query executed successully
				{
					$classOptions = $classOptionsObject->row();
					$gradingArray = unserialize(stripslashes($classOptions->grading));
					
					$array[addslashes($this->input->post('grade'))] = ''; //we make the array to be deleted empty
					
					$gradingArray = array_diff_key($gradingArray, $array); //remove this particular array key from the grading array

					//serialize the grades array and update the database
					$variable['option'] = 'grading';
					$variable['option_array'] = addslashes(serialize($gradingArray));
					$variable['class'] = addslashes($this->input->post('class'));
					$variable['actionf'] = 'add_class_options';
					
					$this->admission->classes($variable); //insert the serialized grading array into the database
					
					//reload the grading page
					{
						//getClasses
						$tableName = $this->db_prefix.'.options';
						$data['classes'] = $this->db->get($tableName);
						
						$this->load->view('academics/header');
						$this->load->view('academics/grading', $data);
						$this->load->view('academics/footer');
					
					}
					
				}
			
			}
		}
	
	}
	
	public function class_list()
	{
		if(!$this->input->post())
		{
			//get a list of classes and display the options
			//getClasses
			$tableName = $this->db_prefix.'.options';
			$data['availableClassesObject'] = $this->db->get($tableName);
			
			$this->load->view('academics/header');
			$this->load->view('academics/class_list', $data);
			$this->load->view('academics/footer');
			
		}
		
		if($this->input->post())
		{
			if($this->input->post('actionf') == 'get_class_options')
			{
				//get classOptions
				$tableName = $this->db_prefix.'.options';
				$classOptionsObject = $this->db->get_where($tableName, array( 'class' => addslashes($this->input->post('selected_class')) ) );
				
				if($classOptionsObject) //query executed successfully
				{
					$classOptions = $classOptionsObject->row();
					
					$classSubjectsArray = unserialize(stripslashes($classOptions->subjects));
					$streamsArray = unserialize(stripslashes($classOptions->streams));
					
					$classOptionsHtml = '<label for="stream_cl">Stream</label>';
					
					if(empty($streamsArray))
					{
						$classOptionsHtml .= '<p class="alert alert-danger"> There are no streams for this class yet!</p><p><p>';
					
					}
					else
					{
						$classOptionsHtml .= '<select name="stream" id="stream_cl" class="form-control" required >';
						
						$streamsArray = array_keys($streamsArray);
						
						foreach($streamsArray as $streamIndex => $streamName )
						{
							$classOptionsHtml .= '<option value="'.stripslashes($streamName).'">'.stripslashes($streamName).'</option>';
						
						}
						
						$classOptionsHtml .= '</select><p><p>';
						
					}
					
					$classOptionsHtml .= '<label for="subject">Subject</label>';
					
					if(empty($classSubjectsArray))
					{
						$classOptionsHtml .= '<p class="alert alert-danger">There are no subjects yet!</p><p><p>';
					
					}
					else
					{
						$classOptionsHtml .= '<select name="subject" class="form-control" required >';
						
						foreach($classSubjectsArray as $subjectIndex => $subjectName)
						{
							$classOptionsHtml .= '<option value="'.stripslashes($subjectName).'">'.stripslashes($subjectName).'</option>';
						
						}
						
						$classOptionsHtml .= '</select><p><p>';
						
					}
					
					echo $classOptionsHtml;
					
				}
				
			}
			
			if($this->input->post('actionf') == 'get_class_list')
			{
				//get students
				$tableName = $this->db_prefix.'.student_information';
				$data['listOfStudents'] = $this->db->get_where($tableName, array( 'coa' => addslashes($this->input->post('class')), 'soa' => addslashes($this->input->post('stream')) ) );
				
				//get classOptions
				$tableName = $this->db_prefix.'.options';
				$data['classOptionsObject'] = $this->db->get_where( $tableName, array( 'class' => addslashes($this->input->post('class') ) ) );
				
				$data['class'] = $this->input->post('class');
				$data['stream'] = $this->input->post('stream');
				$data['subject'] = $this->input->post('subject');
				
				$this->load->view('academics/header');
				$this->load->view('academics/class_list', $data);
				$this->load->view('academics/footer');
				
			}
		
		}
	
	}
	
	public function enter_marks()
	{
		if(!$this->input->post())
		{
			if($this->uri->segment(3) == 'enter_marks')
			{
				$this->load->view('academics/header');
				$this->load->view('academics/enter');
				$this->load->view('academics/footer');
			
			}
			if($this->uri->segment(3) == 'get_marks')
			{
				$this->load->view('academics/header');
				$this->load->view('academics/get');
				$this->load->view('academics/footer');
			
			}
		}
		if($this->input->post())
		{
			if($this->input->post('actionf') == 'chooseOptions')
			{
				$data['class'] = $this->input->post('class');
				$data['exam'] = $this->input->post('exam');
				$data['term'] = $this->input->post('term');
				$data['year'] = $this->input->post('year');
				
				//get class list
				$tableName = $this->db_prefix.'.student_information';
				$data['studentRecords'] = $this->db->get_where($tableName, array( 'coa' => $this->input->post('class') ) );
				
				//get exams Array
				$tableName = $this->db_prefix.'.2014_examinations';
				$data['examsArray'] = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
				
				//get spreadsheetArray
				$tableName = $this->db_prefix.'.options';
				$data['spreadsheetArray'] = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
				
				$this->load->view('academics/header');
				$this->load->view('academics/enter', $data);
				$this->load->view('academics/footer');
			
			}
			
			if($this->input->post('actionf') == 'enter_marks')
			{
				//get class list
				$tableName = $this->db_prefix.'.student_information';
				$studentRecords = $this->db->get_where($tableName, array( 'coa' => $this->input->post('class') ) );
				
				//get spreadsheetArray
				$tableName = $this->db_prefix.'.options';
				$spreadsheetArray = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
				
				if($spreadsheetArray->num_rows() < 1) //nothing has been entered yet
				{
					$this->db->insert($tableName, array( 'class' => $this->input->post('class'), 'spreadsheet' => addslashes(serialize($this->input->post('exams'))) ) );
				
				}
				else
				{
					$array = $this->input->post('exams');
					$spreadsheet = $spreadsheetArray->row();
					$spreadsheet = unserialize(stripslashes($spreadsheet->spreadsheet));
					$spreadsheet[$this->input->post('year')][$this->input->post('term')][$this->input->post('exam')] = $array[$this->input->post('year')][$this->input->post('term')][$this->input->post('exam')];
					
					$this->db->where('class', $this->input->post('class') );
					$this->db->update($tableName, array( 'spreadsheet' => addslashes(serialize($spreadsheet)) ) );
				
				}
				//get exams Array
				$tableName = $this->db_prefix.'.2014_examinations';
				$examsArray = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
				
				if($examsArray->num_rows() < 1) //no exams entered yet
				{
					foreach($studentRecords->result() as $studentRecord)
					{
						$adm = $studentRecord->adm;
						$exams = $this->input->post($adm);
						$exams = addslashes(serialize($exams));
						
						
						//compose dataArray
						$dataArray = array( 
										'adm' => $studentRecord->adm,
										'f_name' => $studentRecord->f_name,
										'm_name' => $studentRecord->m_name,
										'l_name' => $studentRecord->l_name,
										'exams' => $exams,
										'stream' => $studentRecord->soa,
										'class' => $studentRecord->coa
						);
						
						//insert into the db-
						$this->db->insert($tableName, $dataArray);
					
					}
				
				}
				else
				{
					foreach($studentRecords->result() as $studentRecord)
					{
						$adm = $studentRecord->adm;
						$exams = $this->input->post($adm);
						
						foreach($examsArray->result() as $examArray)
						{
							if($examArray->adm == $adm)
							{
								$marks = unserialize(stripslashes($examArray->exams));
						
								$marks[$this->input->post('year')][$this->input->post('term')]['ENGLISH'][$this->input->post('exam')]['LANG'] = $exams[$this->input->post('year')][$this->input->post('term')]['ENGLISH'][$this->input->post('exam')]['LANG'];
								$marks[$this->input->post('year')][$this->input->post('term')]['ENGLISH'][$this->input->post('exam')]['COMP'] = $exams[$this->input->post('year')][$this->input->post('term')]['ENGLISH'][$this->input->post('exam')]['COMP'];
								$marks[$this->input->post('year')][$this->input->post('term')]['ENGLISH'][$this->input->post('exam')]['PERCENTAGE'] = $exams[$this->input->post('year')][$this->input->post('term')]['ENGLISH'][$this->input->post('exam')]['PERCENTAGE'];
								$marks[$this->input->post('year')][$this->input->post('term')]['KISWAHILI'][$this->input->post('exam')]['LUG'] = $exams[$this->input->post('year')][$this->input->post('term')]['KISWAHILI'][$this->input->post('exam')]['LUG'];
								$marks[$this->input->post('year')][$this->input->post('term')]['KISWAHILI'][$this->input->post('exam')]['INS'] = $exams[$this->input->post('year')][$this->input->post('term')]['KISWAHILI'][$this->input->post('exam')]['INS'];
								$marks[$this->input->post('year')][$this->input->post('term')]['KISWAHILI'][$this->input->post('exam')]['PERCENTAGE'] = $exams[$this->input->post('year')][$this->input->post('term')]['KISWAHILI'][$this->input->post('exam')]['PERCENTAGE'];
								$marks[$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES'][$this->input->post('exam')]['SST'] = $exams[$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES'][$this->input->post('exam')]['SST'];
								$marks[$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES'][$this->input->post('exam')]['CRE'] = $exams[$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES'][$this->input->post('exam')]['CRE'];
								$marks[$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES'][$this->input->post('exam')]['PERCENTAGE'] = $exams[$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES'][$this->input->post('exam')]['PERCENTAGE'];
								$marks[$this->input->post('year')][$this->input->post('term')]['MATHS'][$this->input->post('exam')] = $exams[$this->input->post('year')][$this->input->post('term')]['MATHS'][$this->input->post('exam')];
								$marks[$this->input->post('year')][$this->input->post('term')]['SCIENCE'][$this->input->post('exam')] = $exams[$this->input->post('year')][$this->input->post('term')]['SCIENCE'][$this->input->post('exam')];
								$marks[$this->input->post('year')][$this->input->post('term')][$this->input->post('exam')]['TOTAL'] = $exams[$this->input->post('year')][$this->input->post('term')][$this->input->post('exam')]['TOTAL'];
								$marks[$this->input->post('year')][$this->input->post('term')][$this->input->post('exam')]['POS'] = $exams[$this->input->post('year')][$this->input->post('term')][$this->input->post('exam')]['POS'];
						

								//compose dataArray
								$dataArray = array( 
												'f_name' => $studentRecord->f_name,
												'm_name' => $studentRecord->m_name,
												'l_name' => $studentRecord->l_name,
												'exams' => addslashes(serialize($marks)),
												'stream' => $studentRecord->soa,
												'class' => $studentRecord->coa
								);
								
								//update  the db-
								$this->db->where('adm', $studentRecord->adm);
								$this->db->update($tableName, $dataArray);
							
							}
							
						}
						
					}
				
				}
				
				//get spreadsheetArray
				$tableName = $this->db_prefix.'.options';
				$data['spreadsheetArray'] = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
				
				//get exams Array
				$tableName = $this->db_prefix.'.2014_examinations';
				$data['studentRecords'] = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
				$data['class'] = $this->input->post('class');
				$data['exam'] = $this->input->post('exam');
				$data['term'] = $this->input->post('term');
				$data['year'] = $this->input->post('year');
				
				$this->load->view('academics/header');
				$this->load->view('academics/get', $data);
				$this->load->view('academics/footer');
			
			}
			
			if($this->input->post('actionf') == 'get_marks')
			{
				
				//get spreadsheetArray
				$tableName = $this->db_prefix.'.options';
				$data['spreadsheetArray'] = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
				
				//get exams Array
				$tableName = $this->db_prefix.'.2014_examinations';
				$data['studentRecords'] = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
				$data['class'] = $this->input->post('class');
				$data['exam'] = $this->input->post('exam');
				$data['term'] = $this->input->post('term');
				$data['year'] = $this->input->post('year');
				
				$this->load->view('academics/header');
				$this->load->view('academics/get', $data);
				$this->load->view('academics/footer');
			}
			
		}
		
	}
	
	public function spreadsheets()
	{
		if(!$this->input->post())
		{
			$this->load->view('academics/header');
			$this->load->view('academics/spreadsheet');
			$this->load->view('academics/footer');
		
		}
		
		if($this->input->post())
		{
			
			
			
			//get spreadsheetArray
			$tableName = $this->db_prefix.'.options';
			$data['spreadsheetArray'] = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
			
			//get exams Array
			$tableName = $this->db_prefix.'.2014_examinations';
			$studentRecords = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
			
			//define the totalAverageScores array
			$totalAverageScores = array();
			$subjectTotalsArray = array();
			
			$totalEnglish = 0;
			$totalKiswahili = 0;
			$totalSocialStudies = 0;
			$totalMaths = 0;
			$totalScience = 0;
			
			$resultsArray = array();
			
			$noOfStudents = $studentRecords->num_rows();
			
			foreach($studentRecords->result() as $studentRecord)
			{
				$resultsArray[$studentRecord->adm]['f_name'] = $studentRecord->f_name;
				$resultsArray[$studentRecord->adm]['m_name'] = $studentRecord->m_name;
				$resultsArray[$studentRecord->adm]['l_name'] = $studentRecord->l_name;
				$resultsArray[$studentRecord->adm]['stream'] = $studentRecord->stream;
				$resultsArray[$studentRecord->adm]['class'] = $studentRecord->class;
				$resultsArray[$studentRecord->adm]['marks'] = unserialize(stripslashes($studentRecord->exams));
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['LANG'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST1']['LANG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST2']['LANG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST3']['LANG']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['COMP'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST1']['COMP'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST2']['COMP'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST3']['COMP']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['PERCENTAGE'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['LANG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['COMP']) / 90 * 100);
				
				$totalEnglish += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['PERCENTAGE'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['LUG'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST1']['LUG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST2']['LUG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST3']['LUG']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['INS'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST1']['INS'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST2']['INS'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST3']['INS']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['PERCENTAGE'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['LUG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['INS']) / 90 * 100);
				
				$totalKiswahili += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['PERCENTAGE'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['SST'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST1']['SST'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST2']['SST'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST3']['SST']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['CRE'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST1']['CRE'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST2']['CRE'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST3']['CRE']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['PERCENTAGE'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['SST'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['CRE']) / 90 * 100);
				
				$totalSocialStudies += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['PERCENTAGE'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['AVG'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['TEST1'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['TEST2'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['TEST3']) / 3);
				
				$totalMaths += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['AVG'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['AVG'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['TEST1'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['TEST2'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['TEST3']) / 3);
				
				$totalSocialStudies += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['AVG'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['AVG']['TOTAL'] =  
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['AVG'] +
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['AVG'] +
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['PERCENTAGE'] +
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['PERCENTAGE'] +			
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['PERCENTAGE'] ;
				

				$totalAverageScores[] = $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['AVG']['TOTAL'];

				
			}
			
			@$averageEngScore = round($totalEnglish / $noOfStudents);
			@$averageKisScore = round($totalKiswahili / $noOfStudents);
			@$averageSSTScore = round($totalSocialStudies / $noOfStudents);
			@$averageSciScore = round($totalScience / $noOfStudents);
			@$averageMathsScore = round($totalMaths / $noOfStudents);
			
			$subjectTotalsArray = array($averageEngScore, $averageKisScore, $averageMathsScore, $averageSSTScore, $averageSciScore);
			array_multisort($subjectTotalsArray, SORT_DESC);
			array_multisort($totalAverageScores, SORT_DESC);
			
			$class = $this->input->post('class');
			$term = $this->input->post('term');
			$year = $this->input->post('year');
			$data['averageEngScore'] = $averageEngScore;
			$data['averageKisScore'] = $averageKisScore;
			$data['averageSSTScore'] = $averageSSTScore;
			$data['averageSciScore'] = $averageSciScore;
			$data['averageMathsScore'] = $averageMathsScore;
			$data['subjectTotalsArray'] = $subjectTotalsArray;
			$data['totalAverageScores'] = $totalAverageScores;
			$data['resultsArray'] = $resultsArray;
			
			
			
			$this->load->library('tcpdf/tcpdf');
		 
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);   
		 
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor($this->session->userdata('client_name'));
			$pdf->SetTitle('End Term Spreadsheets');
			$pdf->SetSubject('SPREADSHEET');
			$pdf->SetKeywords('SPREADSHEET, PDF, END TERM, MARKS, RANKING');  
		 
			// remove default header/footer
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);		 
		 
			/*set default header data
			$pdf->SetHeaderData('','' , $this->session->userdata('client_name'), '', array(0,64,255), array(0,64,128));
			$pdf->setFooterData(array(0,64,0), array(0,64,128));
		 
			// set header and footer fonts
			$pdf->setHeaderFont(Array('times', '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array('times', '', PDF_FONT_SIZE_DATA)); 
		 
			*/
		 
			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		 
			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);   
		 
			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		 
			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
		 
			// set some language-dependent strings (optional)
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
				require_once(dirname(__FILE__).'/lang/eng.php');
				$pdf->setLanguageArray($l);
			}  
		 
			// ---------------------------------------------------------   
		 
			// set default font subsetting mode
			$pdf->setFontSubsetting(true);  
		 
			// Set font
			// dejavusans is a UTF-8 Unicode font, if you only need to
			// print standard ASCII chars, you can use core fonts like
			// helvetica or times to reduce file size.
			$pdf->SetFont('times', '', 14, '', true);  
		 
			// Add a page
			// This method has several options, check the source code documentation for more information.
			$pdf->AddPage();
		 
			// set text shadow effect
			//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));   
		 
			// Set some content to print

			$html =  '<div class="col-lg-12"><style> table td, th { font-size: 12px; } </style><p class="lead">';

			$html .= '<p style="text-align:center;">'.$this->session->userdata('client_name').'<br />'.$class.' '.$term.' '.$year.' SPREADSHEET</p>';
			
			$html .= '<table border="1" cellspacing="0" cellpadding="2" border-collapse="collapse">';
			
			$html .= '<thead><tr><td colspan="1" style="width : 6%;">AD</td><td colspan="6" style="width : 44%;">NAME</td><th style="width : 4%; ">LAN</th><th style="width : 4%; ">COM</th><th style="width : 4%; " class="success" >%</th><th style="width : 4%; ">LUG</th><th style="width : 4%; ">INS</th><th style="width : 4%; " class="success">%</th><th style="width : 4%; ">SST</th><th style="width : 4%; ">CRE</th><th style="width : 4%; " class="success">%</th><th style="width : 4%; " class="success">MAT</th><th style="width : 4%; " class="success">SCI</th><th style="width : 4%; ">TOT</th><th style="width : 4%; ">POS</th></tr></thead>';
			$html .= '<tbody>';
			
			foreach($resultsArray as $admissionNumber => $moreInfo)
			{
				$pos = array_search($moreInfo['marks'][$year][$term]['AVG']['TOTAL'], $totalAverageScores) + 1 ;
				$html .= '<tr><td colspan="1" >'.$admissionNumber.'</td><td  colspan="6">'.$moreInfo['f_name'].' '.$moreInfo['l_name'].'</td><td>'.$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['LANG'].'</td><td>'.$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['COMP'].'</td><td>'.$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['PERCENTAGE'].'</td><td>'.$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['LUG'].'</td><td>'.$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['INS'].'</td><td>'.$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['PERCENTAGE'].'</td><td>'.$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['SST'].'</td><td>'.$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['CRE'].'</td><td>'.$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['PERCENTAGE'].'	</td><td>'.$moreInfo['marks'][$year][$term]['MATHS']['AVG'].'</td><td>'.$moreInfo['marks'][$year][$term]['SCIENCE']['AVG'].'</td><td>'.$moreInfo['marks'][$year][$term]['AVG']['TOTAL'].'</td><td>'.$pos.'</td></tr>';
			
			}
			
			$html .= '</tbody></table>';
		 
		 
		 
			// Print text using writeHTMLCell()
			$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);  
		 
			// ---------------------------------------------------------   
		 
			// Close and output PDF document
			// This method has several options, check the source code documentation for more information.
			$pdf->Output('example_001.pdf', 'I');   
		 
			//============================================================+
			// END OF FILE
			//============================================================+
			
		
		 
		/* End of file c_test.php */
		/* Location: ./application/controllers/c_test.php */			
			
			
			
			
			/*
			
			$this->load->view('academics/header');
			$this->load->view('academics/spreadsheet');
			$this->load->view('academics/footer');
			
			*/
			
		}
	
	}
	
	public function reports()
	{
		if(!$this->input->post())
		{
			$this->load->view('academics/header');
			$this->load->view('academics/report');
			$this->load->view('academics/footer');
		
		}
		
		if($this->input->post())
		{
			//get spreadsheetArray
			$tableName = $this->db_prefix.'.options';
			$data['spreadsheetArray'] = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
			
			//get exams Array
			$tableName = $this->db_prefix.'.2014_examinations';
			$studentRecords = $this->db->get_where($tableName, array( 'class' => $this->input->post('class') ) );
			
			//define the totalAverageScores array
			$totalAverageScores = array();
			$subjectTotalsArray = array();
			
			$totalEnglish = 0;
			$totalKiswahili = 0;
			$totalSocialStudies = 0;
			$totalMaths = 0;
			$totalScience = 0;
			
			$resultsArray = array();
			
			$noOfStudents = $studentRecords->num_rows();
			
			foreach($studentRecords->result() as $studentRecord)
			{
				$resultsArray[$studentRecord->adm]['f_name'] = $studentRecord->f_name;
				$resultsArray[$studentRecord->adm]['m_name'] = $studentRecord->m_name;
				$resultsArray[$studentRecord->adm]['l_name'] = $studentRecord->l_name;
				$resultsArray[$studentRecord->adm]['stream'] = $studentRecord->stream;
				$resultsArray[$studentRecord->adm]['class'] = $studentRecord->class;
				$resultsArray[$studentRecord->adm]['marks'] = unserialize(stripslashes($studentRecord->exams));
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['LANG'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST1']['LANG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST2']['LANG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST3']['LANG']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['COMP'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST1']['COMP'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST2']['COMP'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['TEST3']['COMP']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['PERCENTAGE'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['LANG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['COMP']) / 90 * 100);
				
				$totalEnglish += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['PERCENTAGE'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['LUG'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST1']['LUG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST2']['LUG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST3']['LUG']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['INS'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST1']['INS'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST2']['INS'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['TEST3']['INS']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['PERCENTAGE'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['LUG'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['INS']) / 90 * 100);
				
				$totalKiswahili += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['PERCENTAGE'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['SST'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST1']['SST'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST2']['SST'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST3']['SST']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['CRE'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST1']['CRE'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST2']['CRE'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['TEST3']['CRE']) / 3);
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['PERCENTAGE'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['SST'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['CRE']) / 90 * 100);
				
				$totalSocialStudies += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['PERCENTAGE'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['AVG'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['TEST1'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['TEST2'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['TEST3']) / 3);
				
				$totalMaths += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['AVG'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['AVG'] =  round((@$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['TEST1'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['TEST2'] + @$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['TEST3']) / 3);
				
				$totalSocialStudies += $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['AVG'];
				
				$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['AVG']['TOTAL'] =  
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['MATHS']['AVG'] +
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SCIENCE']['AVG'] +
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['SOCIALSTUDIES']['AVG']['PERCENTAGE'] +
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['KISWAHILI']['AVG']['PERCENTAGE'] +			
					$resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['ENGLISH']['AVG']['PERCENTAGE'] ;
				

				$totalAverageScores[] = $resultsArray[$studentRecord->adm]['marks'][$this->input->post('year')][$this->input->post('term')]['AVG']['TOTAL'];

				
			}
			
			@$averageEngScore = round($totalEnglish / $noOfStudents);
			@$averageKisScore = round($totalKiswahili / $noOfStudents);
			@$averageSSTScore = round($totalSocialStudies / $noOfStudents);
			@$averageSciScore = round($totalScience / $noOfStudents);
			@$averageMathsScore = round($totalMaths / $noOfStudents);
			
			@$subjectTotalsArray = array($averageEngScore, $averageKisScore, $averageMathsScore, $averageSSTScore, $averageSciScore);
			array_multisort($subjectTotalsArray, SORT_DESC);
			array_multisort($totalAverageScores, SORT_DESC);
			
			$classQ = $this->input->post('class');
			$term = $this->input->post('term');
			$year = $this->input->post('year');
			$data['noOfStudents'] = $noOfStudents;
			$data['averageEngScore'] = $averageEngScore;
			$data['averageKisScore'] = $averageKisScore;
			$data['averageSSTScore'] = $averageSSTScore;
			$data['averageSciScore'] = $averageSciScore;
			$data['averageMathsScore'] = $averageMathsScore;
			$data['subjectTotalsArray'] = $subjectTotalsArray;
			$data['totalAverageScores'] = $totalAverageScores;
			$data['resultsArray'] = $resultsArray;
			
			$class['class'] = $this->input->post('class');
			$this->load->library('grading',$class);
		
		/*
			$this->load->view('academics/header');
			$this->load->view('academics/report', $data);
			$this->load->view('academics/footer');
		
		
		*/
		
			$this->load->library('tcpdf/tcpdf');
		 
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);   
		 
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor($this->session->userdata('client_name'));
			$pdf->SetTitle('End Term Spreadsheets');
			$pdf->SetSubject('SPREADSHEET');
			$pdf->SetKeywords('SPREADSHEET, PDF, END TERM, MARKS, RANKING');  
		 
		 
			// remove default header/footer
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);		 
		 
		 
		/*
			// set default header data
			$pdf->SetHeaderData('','' , $this->session->userdata('client_name'), '', array(0,64,255), array(0,64,128));
			$pdf->setFooterData(array(0,64,0), array(0,64,128));
		 
			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
		 
		*/
		 
			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		 
			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);   
		 
			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		 
			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
		 
			// set some language-dependent strings (optional)
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
				require_once(dirname(__FILE__).'/lang/eng.php');
				$pdf->setLanguageArray($l);
			}  
		 
			// ---------------------------------------------------------   
		 
			// set default font subsetting mode
			$pdf->setFontSubsetting(true);  
		 
			// Set font
			// dejavusans is a UTF-8 Unicode font, if you only need to
			// print standard ASCII chars, you can use core fonts like
			// helvetica or times to reduce file size.
			$pdf->SetFont('times', '', 14, '', true);  
		 
			// Add a page
			// This method has several options, check the source code documentation for more information.
			$pdf->AddPage();
		 
			// set text shadow effect
			//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));   
		 
			// Set some content to print
			
			
			
								foreach($resultsArray as $admissionNumber => $moreInfo)
								{
									
									$pos = array_search($moreInfo['marks'][$year][$term]['AVG']['TOTAL'], $totalAverageScores) + 1 ;
									$html = '<style> p.header {text-align: center; font-size:18px;} p.footer { font-size: 14px; }td, th { font-size: 14px; }</style>';
									
									$html .= '<p class="header">'.$this->session->userdata('client_name').'<br />';
									$html .= 'END OF '.$term.' '.$year.' REPORT<br />';
									$html .= 'NAME : '.$moreInfo['f_name'].' '.$moreInfo['l_name'].' ADM NO :  '.$admissionNumber.' '.$classQ.'</p>';
									
									$html .= '<table border="1" cellspacing="0" cellpadding="2" border-collapse="collapse">';
									$html .=  '<tr><td colspan="4">SUBJECT</td><td>TEST 1</td><td>TEST 2</td><td>TEST 3</td><td>AVG</td><td>GRADE</td><td  colspan="2">REMARKS</td></tr>';
									$html .=  '<tr><td colspan="4">ENGLISH LANGUAGE</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST1']['LANG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST2']['LANG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST3']['LANG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['LANG'].'</td><td></td><td colspan="2"></td></tr>';
									$html .=  '<tr><td colspan="4">ENGLISH COMPOSITION</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST1']['COMP'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST2']['COMP'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST3']['COMP'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['COMP'].'</td><td></td><td colspan="2"></td></tr>';
									$html .=  '<tr><td colspan="4" style="text-align:right;">%</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST1']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST2']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST3']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['PERCENTAGE'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['PERCENTAGE']).'</td><td colspan="2">'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['PERCENTAGE']).'</td></tr>';
									$html .=  '<tr><td colspan="4">KISWAHILI LUGHA</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST1']['LUG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST2']['LUG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST3']['LUG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['LUG'].'</td><td></td><td colspan="2"></td></tr>';
									$html .=  '<tr><td colspan="4">KISWAHILI INSHA</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST1']['INS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST2']['INS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST3']['INS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['INS'].'</td><td></td><td colspan="2"></td></tr>';
									$html .=  '<tr><td colspan="4"style="text-align:right;">%</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST1']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST2']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST3']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['PERCENTAGE'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['PERCENTAGE']).'</td><td colspan="2">'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['PERCENTAGE']).'</td></tr>';
									$html .=  '<tr><td colspan="4">MATHEMATICS</td><td>'.@$moreInfo['marks'][$year][$term]['MATHS']['TEST1'].'</td><td>'.@$moreInfo['marks'][$year][$term]['MATHS']['TEST2'].'</td><td>'.@$moreInfo['marks'][$year][$term]['MATHS']['TEST3'].'</td><td>'.@$moreInfo['marks'][$year][$term]['MATHS']['AVG'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['MATHS']['AVG']).'</td><td colspan="2">'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['MATHS']['AVG']).'</td></tr>';
									$html .=  '<tr><td colspan="4">SOCIAL STUDIES</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST1']['SST'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST2']['SST'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST3']['SST'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['SST'].'</td><td></td><td colspan="2"></td></tr>';
									$html .=  '<tr><td colspan="4">C . R . E .</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST1']['CRE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST2']['CRE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST3']['CRE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['CRE'].'</td><td></td><td colspan="2"></td></tr>';
									$html .=  '<tr><td colspan="4"style="text-align:right;">%</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST1']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST2']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST3']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['PERCENTAGE'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['PERCENTAGE']).'</td><td colspan="2">'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['PERCENTAGE']).'</td></tr>';
									$html .=  '<tr><td colspan="4">SCIENCE</td><td>'.@$moreInfo['marks'][$year][$term]['SCIENCE']['TEST1'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SCIENCE']['TEST2'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SCIENCE']['TEST3'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SCIENCE']['AVG'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['SCIENCE']['AVG']).'</td><td colspan="2">'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['SCIENCE']['AVG']).'</td></tr>';
									$html .=  '<tr><td colspan="4">TOTAL </td><td>'.@$moreInfo['marks'][$year][$term]['TEST1']['TOTAL'].'</td><td>'.@$moreInfo['marks'][$year][$term]['TEST2']['TOTAL'].'</td><td>'.@$moreInfo['marks'][$year][$term]['TEST3']['TOTAL'].'</td><td>'.@$moreInfo['marks'][$year][$term]['AVG']['TOTAL'].'</td><td></td><td colspan="2"></td></tr>';
									$html .=  '<tr><td colspan="4">OUT OF </td><td>500</td><td>500</td><td>500</td><td>500</td><td></td><td colspan="2"></td></tr>';
									$html .=  '<tr><td colspan="4">CLASS POSITION </td><td>'.@$moreInfo['marks'][$year][$term]['TEST1']['POS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['TEST2']['POS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['TEST3']['POS'].'</td><td>'.@$pos.'</td><td></td><td colspan="2"></td></tr>';
									$html .=  '<tr><td colspan="4">OUT OF </td><td>'.@$noOfStudents.'</td><td>'.@$noOfStudents.'</td><td>'.@$noOfStudents.'</td><td>'.@$noOfStudents.'</td><td></td><td colspan="2"></td></tr>';
									
									$html .= '</table>';
									
									$html .=  '<p class="footer"> CLASS TEACHER\'S REMARKS <br />
									...........................................................................................................................................................
									............................................................................................................................................................</p>';
									$html .=  '<p class="footer">HEAD TEACHER\'S REMARKS <br />
									.............................................................................................................................................................
									.............................................................................................................................................................</p>';
									$html .=  '<p class="footer"> PARENT/GUARDIAN SIGN.....................DATE.....................REMARKS................................................</p>';
									$html .=  '<p class="footer">CLOSING DATE ...................................NEXT TERM OPENS ON.........................................................</p>';
									
									
									/*$html .=  $this->session->userdata('p_address').'</p>';
									
									$html .=  '<p> CLASS TEACHER\'S REMARKS <br />
									...........................................................................................................................................................
									............................................................................................................................................................</p>';
									$html .=  '<p>HEAD TEACHER\'S REMARKS <br />
									.............................................................................................................................................................
									.............................................................................................................................................................</p>';
									$html .=  '<p> PARENT/GUARDIAN SIGN.....................DATE.....................REMARKS................................................</p>';
									$html .=  '<p>CLOSING DATE ...................................NEXT TERM OPENS ON.........................................................</p>';
									
									*/
									
									$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);  
								
									// reset pointer to the last page
									$pdf->lastPage();

									// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
									// Print all HTML colors

									// add a page
									$pdf->AddPage();								
								
								}
			
			
			

		 
			// Print text using writeHTMLCell()
		 
			// ---------------------------------------------------------   
		 
			// Close and output PDF document
			// This method has several options, check the source code documentation for more information.
			$pdf->Output('example_001.pdf', 'I');   
		 
			//============================================================+
			// END OF FILE
			//============================================================+
			
		
		 
		/* End of file c_test.php */
		/* Location: ./application/controllers/c_test.php */			
		
		
		
		
		}
		
	}

}
