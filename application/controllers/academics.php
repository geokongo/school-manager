<?php 

/**
 *This is the academics controller
 *
 *This controller will handle all file requests from the academics user dashboard
 */
 
class Academics extends Academics_Controller {

	//immediately after successful login, the index function logs in the user into the academics dashboard. This happens because at this time
	//no variables have yet been defined so the rest of the functions will not be executed.
	
	
	public function index() 
	{
			$this->load->view('academics/header');
			$this->load->view('academics/home');
			$this->load->view('academics/footer');
			
		
	}
	
	//This method will handle all requests that are related to the entering of results into the database
	public function enter() 
	{
		/*These variables will come as post variabels when the forms are submitted. We use these variables to narrow down tp the specific data that is supposed to
		 *beinserted into the database. We also use the varibles to compose the tablename which is going to hold this data in the database.
		 *The actionf is used to trigger particular methods in the model to retrieve particular data
		*/
		
		$class = '';
		$stream = '';
		$subject = '';
		$exam = '';
		$term = '';
		$year = '';
		$actionf = '';
		
		if(!$_POST)
		{
			//The absense of $_POST means no form has been submitted yet so we just go ahead to get the respective classes for which we might need to enter results.
			$actionf = 'step0';
			$class = 'classes';
			
			$this->load->model('academics/academic');
			$data['classes'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->load->view('academics/header');
			$this->load->view('academics/step1', $data);
			$this->load->view('academics/footer');
		
		}
		
		if($_POST)
		{
			//Presense of $_POST means some form has been submitted so we go ahead and get a specific value form a hidden form field called 'actionf' that we use to 
			//trigger the right method on the controller and model
			if($_POST['actionf'] == 'step1')
			{
				//when class has been selected we go ahead and fetch the streams
				$class = $_POST['class'];
				$stream = 'streams';
				
				$this->load->model('academics/academic');
				$data['streams'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
				$this->session->set_userdata('class', $class);
				
				$this->load->view('academics/header');
				$this->load->view('academics/step2', $data);
				$this->load->view('academics/footer');
			
			}
			
			if($_POST['actionf'] == 'step2')
			{
				//when both class and streams has bee set we go ahead and fetch the subjects
				$streams = $_POST['stream'];
				$class = $this->session->userdata('class');
				$subject = 'subjects';
				
				$this->load->model('academics/academic');
				$data['subjects'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
				
				$this->session->set_userdata('streams', $streams);
				
				$this->load->view('academics/header');
				$this->load->view('academics/step3', $data);
				$this->load->view('academics/footer');
			}
			
			if($_POST['actionf'] == 'step3')
			{
				//when class, stream and subject has been set we go ahead and get the examinations for that specific class
				$subjects = $_POST['subject'];
				$class = $this->session->userdata('class');
				$exam = 'examinations';
				
				$this->load->model('academics/academic');
				$data['exams'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
				
				$this->session->set_userdata('subjects', $subjects);
				
				$this->load->view('academics/header');
				$this->load->view('academics/step4', $data);
				$this->load->view('academics/footer');
			
			}
			
			if($_POST['actionf'] == 'step4')
			{
				//we then get the terms so that the user can choose the one for which to enter results
				$exams = $_POST['exam'];
				$term = 'terms';
				
				$this->load->model('academics/academic');
				$data['terms'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
				
				$this->session->set_userdata('exams', $exams);
				
				$this->load->view('academics/header');
				$this->load->view('academics/step5', $data);
				$this->load->view('academics/footer');
		
			}
			
			if($_POST['actionf'] == 'step5')
			{
				//we then get the years so that the user can choose the one for which to enter results

				$terms = $_POST['term'];
				$year = 'years';
				
				$this->load->model('academics/academic');
				$data['years'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
				
				$this->session->set_userdata('terms', $terms);
				
				$this->load->view('academics/header');
				$this->load->view('academics/step6', $data);
				$this->load->view('academics/footer');
			
			}
			
			if($_POST['actionf'] == 'create_table')
			{
				//once all the varibales are set, we now start by creating a tablename based on the varibles that have been set previously
				//after creating the table succssfully, we present the user with a form upload so that he can upload the results.
				$actionf = $_POST['actionf'];
				$year = $_POST['year'];
				$class = $this->session->userdata('class');
				$stream = $this->session->userdata('streams');
				$subject = $this->session->userdata('subjects');
				$exam = $this->session->userdata('exams');
				$term = $this->session->userdata('terms');
								
				$this->load->model('academics/academic');
				$tablename = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);

				$this->session->set_userdata('tablename', $tablename);
				$this->session->set_userdata('years', $year);
				
				$this->load->view('academics/header');
				$this->load->view('academics/upload');
				$this->load->view('academics/footer');
			
			}
			
			if($_POST['actionf'] == 'insert_records')
			{
				$actionf = $_POST['actionf'];
				
				$this->load->model('academics/academic');
				$res = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
				
				if($res)
				{
					$actionf = 'fetch_records';
					
					$this->load->model('academics/academic');
					$data['data'] = $this->academic->get($actionf);
					
					$this->load->view('academics/header');
					$this->load->view('academics/inserted_data', $data);
					$this->load->view('academics/footer');
				
				}
			
			}
			
		}
		
		if($_FILES)
		{
			//when the user selects and file, uploads it and then submits it, the $_FILES variable will be available.
			//in the varibles below we set the upload folder path, the allowed file types, which we have set to .csv to avoid raw excel data 
			//being inserted because this will ruin the database.
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'csv';
			$config['max_size'] = '1000';
		
			$this->load->library('upload', $config);
		
			if( ! $this->upload->do_upload())
			{
				//if the do_upload() function does not run successfully, it means theres is an error, therefore we redisplay the upload form with the appropriate error message.
				$data['error'] = $this->upload->display_errors();
				
				$this->load->view('academics/header');
				$this->load->view('academics/upload2', $data);
				$this->load->view('academics/footer');
		
			}
		
			else
			{
				//this means the upload was successful and so we ask the user ti cinfirm entering the data into the database before we actually insert into mysql.
				$data = array( 'upload_data' => $this->upload->data());
				$this->session->set_userdata('file_path', $data['upload_data']['full_path']);
				
				$this->load->view('academics/header');
				$this->load->view('academics/confirm');
				$this->load->view('academics/footer');
		
			}
		
		
		}
	
	}
	
	
	//this method will handle all requests related to viewing the entered results
	public function view() 
	{
		//we begin by defining these varibles and initializing them to empty. This is because the model will be expecting all these variables so its good to have them define even if empty to avoid minor errors
		//these variables will come form the uri segments
		$class = '';
		$stream = '';
		$subject = '';
		$exam = '';
		$term = '';
		$year = '';
		$actionf = '';
		
		$default_keys = array('class', 'streams', 'subjects', 'exams', 'terms', 'years');
		$variables = $this->uri->uri_to_assoc(3, $default_keys);
		
		if($this->uri->segment(3) === FALSE)
		{
			//if there is no value in uri segment 3, then it means to variable has been set yet, so we go and get the classes for the user to choose which he would like to view results
			$actionf = 'step0';
			$class = 'classes';
			
			$this->load->model('academics/academic');
			$data['classes'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->load->view('academics/header');
			$this->load->view('academics/view/classes', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['class']))
		{
			//once the class has been set, we get the streams
			$class = $variables['class'];
			$stream = 'streams';
			
			$this->load->model('academics/academic');
			$data['streams'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->session->set_userdata('class', $class);
			
			$this->load->view('academics/header');
			$this->load->view('academics/view/streams', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['streams']))
		{
			//once class and stream have been set, we get the years
			$this->session->set_userdata('streams', $variables['streams']);
			$year = 'years';
			
			$this->load->model('academics/academic');
			$data['years'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->load->view('academics/header');
			$this->load->view('academics/view/years', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['years']))
		{
			//once class, stream and year  have been set, we get the terms
			$this->session->set_userdata('years', $variables['years']);
			$term = 'terms';
			
			$this->load->model('academics/academic');
			$data['terms'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->load->view('academics/header');
			$this->load->view('academics/view/terms', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['terms']))
		{
			//once class, stream, year and term have been set, we get the exminations
			$this->session->set_userdata('terms', $variables['terms']);
			$class = $this->session->userdata('class');
			$exam = 'examinations';
			
			$this->load->model('academics/academic');
			$data['exams'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->load->view('academics/header');
			$this->load->view('academics/view/examinations', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['exams']))
		{
			//the last variable we want is the particular subject for which to fetch results
			$this->session->set_userdata('exams', $variables['exams']);
			$class = $this->session->userdata('class');
			$subject = 'subjects';
			
			$this->load->model('academics/academic');
			$data['subjects'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->load->view('academics/header');
			$this->load->view('academics/view/subjects', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['subjects']))
		{
			//once all variables are set, we retrieve them from the session userdata and assign them to the particular variable names and then pass them on to the model
			//this model would return an array called results which has the related data for this particular class and then pass it on to the view for display.
			$subject = $variables['subjects'];
			
			$class = $this->session->userdata('class');
			$stream = $this->session->userdata('streams');
			$exam = $this->session->userdata('exams');
			$term = $this->session->userdata('terms');
			$year = $this->session->userdata('years');
			
			$this->load->model('academics/academic');
			$data['results'] = $this->academic->fetch_records($class, $stream, $subject, $exam, $term, $year);
			
			$this->session->set_userdata('subjects', $variables['subjects']);
			
			$this->load->view('academics/header');
			$this->load->view('academics/view/results', $data);
			$this->load->view('academics/footer');
		
		}
	
	}
	
	//this method would handle all request related to the generation of a spreadsheet.
	public function spreadsheets()
	{
		//we will need these variables to pass to the model, so we intialize them to empty
		$class = '';
		$stream = '';
		$subject = '';
		$exam = '';
		$term = '';
		$year = '';
		$actionf = '';
		
		$default_keys = array('class', 'streams', 'subjects', 'exams', 'terms', 'years');
		$variables = $this->uri->uri_to_assoc(3, $default_keys);
		
		if($this->uri->segment(3) === FALSE)
		{
			$actionf = 'step0';
			$class = 'classes';
			
			$this->load->model('academics/academic');
			$data['classes'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->load->view('academics/header');
			$this->load->view('academics/spreadsheets/classes', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['class']))
		{
			$class = $variables['class'];
			$stream = 'streams';
			
			$this->load->model('academics/academic');
			$data['streams'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->session->set_userdata('class', $class);	//assign chosen class to a session variable.
			
			$this->load->view('academics/header');
			$this->load->view('academics/spreadsheets/streams', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['streams']))
		{
			$this->session->set_userdata('streams', $variables['streams']);	//assign chosen stream to a session variable.
			$year = 'years';
			
			$this->load->model('academics/academic');
			$data['years'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->load->view('academics/header');
			$this->load->view('academics/spreadsheets/years', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['years']))
		{
			$this->session->set_userdata('years', $variables['years']);	//assign chosen year to a session variable.
			$term = 'terms';
			
			$this->load->model('academics/academic');
			$data['terms'] = $this->academic->enter($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			$this->load->view('academics/header');
			$this->load->view('academics/spreadsheets/terms', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['terms']))
		{
			//after all variables have been set, we start to generate the spreadsheet by getting the class list, subjects, examinations
			$this->session->set_userdata('terms', $variables['terms']);
			
			$actionf = 'get_class_list';
			
			$class = $this->session->userdata('class');
			$stream = $this->session->userdata('streams');
			$year = $this->session->userdata('years');
			
			$this->load->model('academics/academic');
			$class_list = $this->academic->spreadsheets($actionf, $class, $stream, $subject, $exam, $term, $year);
			
			if($class_list)
			{
				//we will loop through this class list by admission numbers one at a time in order to get the students results in the table
				$this->session->set_userdata('class_list', $class_list);
				
				$actionf = 'get_exams';
				$exam = 'examinations';
				
				$this->load->model('academics/academic');
				$exams = $this->academic->spreadsheets($actionf, $class, $stream, $subject, $exam, $term, $year);
				
				if($exams)
				{
					//the exam names will help us to generate the table names in order to get the subject results and the calculate the average_score to populate the spreadsheet with.
					$this->session->set_userdata('exams', $exams);
					
					$actionf = 'get_subjects';
					$subject = 'subjects';
					
					$this->load->model('academics/academic');
					$subjects = $this->academic->spreadsheets($actionf, $class, $stream, $subject, $exam, $term, $year);
					
					if($subjects)
					{
						//we create the spreadsheet table using the class, stream, term and year names
						$this->session->set_userdata('subjects', $subjects);
						
						$actionf = 'create_spreadsheet_table';
						$term = $this->session->userdata('terms');
						$subject = $this->session->userdata('subjects');
						
						$this->load->model('academics/academic');
						$res = $this->academic->spreadsheets($actionf, $class, $stream, $subject, $exam, $term, $year);
						
						if($res)
						{
							//after spreadsheet table has been created successfully we loop through the class list to get the admission numbers one at a time.
							$this->session->set_userdata('spreadsheet_tablename', $res);
							
							$class_list = $this->session->userdata('class_list');
							foreach($class_list->result() as $class_list_row)
							{
								//foreach admission number we will fetch the associated results, calculate averages and then populate into the spreadsheet.
								$adm = $class_list_row->ADM;
								$name = $class_list_row->NAME;
								$spreadsheet_tablename = $this->session->userdata('spreadsheet_tablename');
								
								static $total;
								$total = 0;
								
								
								$this->load->model('academics/academic');
								$this->academic->insert_adm_name($spreadsheet_tablename, $adm, $name, $total);
								
								$class_subjects = $this->session->userdata('subjects');
								foreach($class_subjects->result() as $class_subjects_row)
								{
									//we will start with one subject at a time and loop through until all subjects are entered.
									$subject_itself = $class_subjects_row->SUBJECTS;
									$class_exams = $this->session->userdata('exams');
									$iterations = $class_exams->num_rows();
									foreach($class_exams->result() as $class_exams_row)
									{
										/*we use each subject name from above together with each exam name to get the score for the particular admission number and assign the score to a 
										 *static variable $val. This is incremented for every exam and then we use the number of exams to calculate the average at the end of the loop and 
										 *then insert the value into the database.
										 *we use the static variable $itr to destroy the value in the static variable $val when the loop is finished. This would help against carrying forward values from
										 *the previous iterations.
										 */
										static $val;
										static $itr;
										
										$itr = 1;
										
										
										$exam_itself = $class_exams_row->EXAM;
										$bt = '_';
										$tablename = $this->session->userdata('class').$bt.$this->session->userdata('streams').$bt.$subject_itself.$bt.$exam_itself.$bt.$this->session->userdata('terms').$bt.$this->session->userdata('years');
										
										$this->load->model('academics/academic');
										$res = $this->academic->fetch_records2($tablename, $adm);
										
										if($res->num_rows() > 0)
										{
											//this means there was a score value returned
											$row = $res->row();
											$val2 = $row->SCORE;
										
										}
										
										else
										{
											//this means no score value returned, may be the table was blank
											$val2 = 0;
										}
										
										$val += $val2;
										$itr +=1;
										
									}
									
									$average_score = $val/$iterations;
									$average_score_ = round($average_score, 0);  //we round of the average to the nearest whole number to avoid decimals in the final result.
									
									$total += $average_score_;	//we increment the $total variable once the subject average has been established
									$spreadsheet_tablename = $this->session->userdata('spreadsheet_tablename');
									
									
									$this->load->model('academics/academic');
									$res = $this->academic->update_score($spreadsheet_tablename, $adm, $subject_itself, $average_score_);	//this sql inserts the average score into the spreadsheet table
								
									if($itr == $iterations)	//at this point we reset the static variables to null so that they are ready for the next iteration.
									{
										$val = NULL;
										$itr = NULL;
										
									}
								}
								
								//once all subjects have been populated, we then insert the total score into the database using this query.
								$this->load->model('academics/academic');
								$this->academic->insert_adm_name($spreadsheet_tablename, $adm, $name, $total);
								
								$total = NULL;	//after inserting the total score we reset the static variable $score to make it ready for the next iteration.
							
							}
							
							$this->load->model('academics/academic');
							$task = $this->academic->sort_table($spreadsheet_tablename); //this sql orders the spreadsheet table by the totals field in descending order.
							
							if($task)
							{
								//once the table has been sorted successfully, we select * from it and assign the result object to the variable $object and the pass this to the view
								$this->load->model('academics/academic');
								$data['object'] = $this->academic->select_table($spreadsheet_tablename);
								
								$class_['class'] = $this->session->userdata('class');
								
								$this->load->library('grading', $class_);
								
								$this->load->view('academics/header');
								$this->load->view('academics/spreadsheets/spreadsheet', $data);
								$this->load->view('academics/footer');
							
							}
						
						}
					
					}
				
				}
			
			}
		}
	
	}
	
	//this method will handle all reports related 
	public function reports()
	{
		//we will need to send these variables to the model so we intialize them to empty. The values will come from the uri segments
		$class = '';
		$stream = '';
		$term = '';
		$year = '';
		$adm = '';
		$actionf = '';
		
		$default_keys = array('class', 'stream', 'term', 'year', 'adm', 'name');
		$variables = $this->uri->uri_to_assoc(3, $default_keys);
		
		if($this->uri->segment(3) === FALSE)
		{
			//if no uri segment has been defined it means this method is being called for the first time so we get the classes and display them.
			$actionf = 'step0';
			$class = 'classes';
			
			$this->load->model('academics/academic');
			$data['classes'] = $this->academic->reports($actionf, $class, $stream, $term, $year, $adm);
			
			$this->load->view('academics/header');
			$this->load->view('academics/reports/classes', $data);
			$this->load->view('academics/footer');
		
		}
	
		if( !empty($variables['class']))
		{
			//if the class has been chosen we get the streams.
			$class = $variables['class'];
			$stream = 'streams';
			$actionf = 'get_streams';
			
			$this->load->model('academics/academic');
			$data['streams'] = $this->academic->reports($actionf, $class, $stream, $term, $year, $adm);
			
			$this->session->set_userdata('class', $class); 	//assign chosen class to a session variable.
			
			$this->load->view('academics/header');
			$this->load->view('academics/reports/streams', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['stream']))
		{
			//once the class has been chosen we get the years.
			$this->session->set_userdata('stream', $variables['stream']);	//assign chosen stream to a session variable.
			$year = 'years';
			$actionf = 'get_years';
			
			$this->load->model('academics/academic');
			$data['years'] = $this->academic->reports($actionf, $class, $stream, $term, $year, $adm);
			
			$this->load->view('academics/header');
			$this->load->view('academics/reports/years', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['year']))
		{
			//once year is chosen we get the terms.
			$this->session->set_userdata('year', $variables['year']);	//assign chosen year to a session variable.
			$term = 'terms';
			$actionf = 'get_terms';
			
			$this->load->model('academics/academic');
			$data['terms'] = $this->academic->reports($actionf, $class, $stream, $term, $year, $adm);
			
			$this->load->view('academics/header');
			$this->load->view('academics/reports/terms', $data);
			$this->load->view('academics/footer');
		
		}
		
		if( !empty($variables['term']))
		{
			//once the term has been chosen we generate the class list so that the use can choose the student for whom he wants to generate the report.
			$this->session->set_userdata('term', $variables['term']);	//assign the chosen term to a session variable.
			
			$actionf = 'get_class_list';
			
			//we reassign the session variables to the respective variables so that we then pass them to the model.
			$class = $this->session->userdata('class');
			$stream = $this->session->userdata('stream');
			$year = $this->session->userdata('year');
			
			$this->load->model('academics/academic');
			$class_list = $this->academic->reports($actionf, $class, $stream, $term, $year, $adm);
			
			$no_of_students = $class_list->num_rows();	//the number of students will help us in filling the position out of file in the report form.
				
			$this->session->set_userdata('no_of_students', $no_of_students);
			
			$data['class_list'] = $class_list;
			
			$this->load->view('academics/header');
			$this->load->view('academics/reports/class_list', $data);
			$this->load->view('academics/footer');
		}
		
		if( !empty($variables['adm']))
		{
			//when the user selects on a student, the admission number is passed through a uri segment.
			//the admission number, as a unique value, is then used to get the report. The result object from the model is assigned to a session variable and 
			//then accessed in the view via the session userdata at display.
			$this->session->set_userdata('adm', $variables['adm']);
			$this->session->set_userdata('name', $variables['name']);
			
			$actionf = 'get_report';
			$adm = $variables['adm'];
			
			$this->load->model('academics/academic');
			$res = $this->academic->reports($actionf, $class, $stream, $term, $year, $adm);
			
			if($res)
			{
				$class_['class'] = $this->session->userdata('class');
				$this->load->library('grading', $class_);	//we initialize the grading library with this particular class for use in the view to get grade and remarks.
				
				$this->load->view('academics/header');
				$this->load->view('academics/reports/report');
				$this->load->view('academics/footer');
			
			}

		}
		
	}
	
	//this method will handle all setting related requests.
	public function settings()
	{
		//we will need these variables to pass to the model so we intialize them as empty. Their values however, will come as uri segments.
		
		$grade = '';
		$points = '';
		$actionf = '';
		$grade_ = '';
		$to = '';
		$from = '';
		$remarks = '';
		
		$default_keys = array('id', 'action', 'grade', 'points', 'class', 'name');
		$var = $this->uri->uri_to_assoc(3, $default_keys);
		
		//the id variable is used to trigger an action, when absent, it means this method is being called for the first time so we load the home page so the user can begin selecting options.
		if($var['id'] === FALSE)
		{
			$this->load->view('academics/header');
			$this->load->view('academics/settings/home');
			$this->load->view('academics/footer');
		
		}
		
		if($var['id'] == 'new_grade')
		{
			$this->load->view('academics/header');
			$this->load->view('academics/settings/grades/addnew');
			$this->load->view('academics/footer');
		
		}
		
		if($var['id'] == 'grades')		//this enables us to set different grades and their respective points.
		{
			if($var['action'] === FALSE)	//action has not been set yet so we get the grades from the database and display them to the user.
			{
				$actionf = 'get_grades';
				
				$this->load->model('academics/academic');
				$data['grades'] = $this->academic->get($actionf);
				
				$this->load->view('academics/header');
				$this->load->view('academics/settings/grades/grade1', $data);
				$this->load->view('academics/footer');
			
			}
			
			if($var['action'] == 'addnew')	//this action would enable adding new grades into the database. Once new grade has been added, the page with grades is reloaded to reflect the new addition.
			{
				$grade = $_POST['grade'];
				$points = $_POST['points'];
				$actionf = 'grade_points';
				
				$this->load->model('academics/academic');
				$res = $this->academic->insert_grades($actionf, $grade_, $grade, $points, $from, $to, $remarks);
				
				if($res)
				{
					$actionf = 'get_grades';
					
					$this->load->model('academics/academic');
					$data['grades'] = $this->academic->get($actionf);
				
					$this->load->view('academics/header');
					$this->load->view('academics/settings/grades/grade1', $data);
					$this->load->view('academics/footer');
				
				}
			}
			
			if($var['action'] == 'edit')		//this action enables editing of grades that have already been inserted into the database.
			{
				if( $var['points'] !== FALSE)	//chose the grade to edit and then display the editing page.
				{
					$data['grade'] = $var['grade'];
					$data['points'] = $var['points'];
				
					$this->load->view('academics/header');
					$this->load->view('academics/settings/grades/edit_grade_point', $data);
					$this->load->view('academics/footer');
				
				}
				
				else	//editing has been done and there are new values to be entered into the database.
				{
					$grade_ = $var['grade'];
					$points = $_POST['point'];
					$actionf = 'grade_points';
					
					$this->load->model('academics/academic');
					$res = $this->academic->insert_grades($actionf, $grade_, $grade, $points, $from, $to, $remarks);
					
					if($res)
					{
						$actionf = 'get_grades';
				
						$this->load->model('academics/academic');
						$data['grades'] = $this->academic->get($actionf);
				
						$this->load->view('academics/header');
						$this->load->view('academics/settings/grades/grade1', $data);
						$this->load->view('academics/footer');
					
					}
				
				}
				
			}
		
		}
		
		if($var['id'] == 'grading')		//this helps us to set the grading criteria for various classes.
		{
			if($var['action'] === FALSE)	//no action yet so get classes so that the user can choose an action.
			{
				$actionf = 'get_classes';	//this actionf value is used to trigger a model to get list of available classes.
				
				$this->load->model('academics/academic');
				$data['classes'] = $this->academic->get($actionf);
				
				$this->load->view('academics/header');
				$this->load->view('academics/settings/grading/home', $data);
				$this->load->view('academics/footer');
				
			}
			
			if($var['action'] == 'get_class')
			{
				$this->session->set_userdata('class', $var['class']);	//assign the chosen class to a session variable.
				
				$actionf = 'get_grading';	//class has been chosen so get the grading criteria already set for this particular class.
				
				$this->load->model('academics/academic');
				$data['grading'] = $this->academic->get($actionf);
				
				$this->load->view('academics/header');
				$this->load->view('academics/settings/grading/grade2', $data);
				$this->load->view('academics/footer');
			
			}
			
			if($var['action'] == 'add_grading')	//load the page to set a new grading criteria.
			{
			
				$this->load->view('academics/header');
				$this->load->view('academics/settings/grading/grade1');
				$this->load->view('academics/footer');
			
			}
			
			if($var['action'] == 'addnew')		//gets the new grading criteria set from the form and inserts into database.
			{
				$grade = $_POST['grade'];
				$from = $_POST['from'];
				$to = $_POST['to'];
				$remarks = $_POST['remarks'];
				$actionf = 'grading';
				
				$this->load->model('academics/academic');
				$res = $this->academic->insert_grades($actionf, $grade_, $grade, $points, $from, $to, $remarks);
				
				if($res)
				{
					$actionf = 'get_grading';
				
					$this->load->model('academics/academic');
					$data['grading'] = $this->academic->get($actionf);
				
					$this->load->view('academics/header');
					$this->load->view('academics/settings/grading/grade2', $data);
					$this->load->view('academics/footer');
				
				}
				
			}
			
			if($var['action'] == 'edit')	//this enables us to edit existing grading criteria.
			{
				if( !$_POST)		//no user submitted data yet, so we load the grading criteria editing page for the particular grading chosen.
				{
					$data['grade'] = $var['grade'];
					$data['from'] = $var['from'];
					$data['to'] = $var['to'];
					$data['remarks'] = $var['remarks'];
				
					$this->load->view('academics/header');
					$this->load->view('academics/settings/grading/edit_grading', $data);
					$this->load->view('academics/footer');
				
				}
				
				else		//user has submitted a form, so we get the post data and insert into the database.
				{
					$grade_ = $var['grade'];
					$from = $_POST['from'];
					$to = $_POST['to'];
					$remarks = $_POST['remarks'];
					
					$actionf = 'grading';
					
					$this->load->model('academics/academic');
					$res = $this->academic->insert_grades($actionf, $grade_, $grade, $points, $from, $to, $remarks);
					
					if($res)
					{
						$actionf = 'get_grading';
				
						$this->load->model('academics/academic');
						$data['grading'] = $this->academic->get($actionf);
				
						$this->load->view('academics/header');
						$this->load->view('academics/settings/grading/grade2', $data);
						$this->load->view('academics/footer');
					
					}
				
				}
				
			}
		
		}
	}
	
	public function test()
	{
		$val = 'CLASS1';
		$class['class'] = $val;
		$this->load->library('grading', $class);
		
		$score = '69';
		
		echo $this->grading->get_grade($score)."&nbsp&nbsp&nbsp";
		echo $this->grading->get_remarks($score)."&nbsp&nbsp&nbsp";
		
	
	}
	
 }
 