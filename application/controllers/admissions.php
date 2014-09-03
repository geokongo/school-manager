<?php
/** 
 * This class has methods that will handle of queries within the admissions dashboard 
 * 
 * It containd the addnew method
 * It has the view method 
 * It has the update method 
 * It also has the delete method
 * It will help to generate clean URLs
 */
 class admissions extends CI_Controller {
 
/**
 *This method, index, is the default and loads the login page into the admissions dashboard
 *After successful login, the user is redirected to the admissions dashboard
 */
	public function index() 
	{
		//$this->load->view('admissions/header');
		$this->load->view('admissions/header');
		$this->load->view('admissions/home');
		$this->load->view('admissions/footer');
	}
	
	public function dashboard() 
	{
		$this->load->view('admissions/header');
		$this->load->view('admissions/home');
	}
	

/**
 *This method, addnew, handles all addnew queries
 *
 *I have used loops a lot in this method to enable it handle all the queries
 *from the addnew control panel 
 *This loops uniquely identify steps in the registrstion process and call the appropriate loop 
 */ 
	
 
	public function addnew() 
	{
	
/**
 *This loops loads the step one registration, because at this point no form has been
 *submitted so there is no $_POST data
 *
 */
 
		if( ! $_POST)
		{
			$this->load->view('admissions/header');
			$this->load->view('admissions/addnew1');
			$this->load->view('admissions/footer');
			
		}
	
/**
 *The existence of $_POST data means a form has been submitted and so we go 
 *ahead to identify which form it is by checking the data submitted in the hidden field actionflag
 *
*/ 
		if($_POST)
		{
			if($this->input->post('actionflag') == 'step1') 
			{
			
				if($this->input->post('is_ajax'))
				{
					$input['adm'] = $this->input->post('adm');
					$input['actionf'] = 'step1';
					$input['f_name'] = strtoupper($this->input->post('f_name'));
					$input['m_name'] = strtoupper($this->input->post('m_name'));
					$input['l_name'] = strtoupper($this->input->post('l_name'));
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res->num_rows() > 0 ) 
					{
						$data['error'] = "Error. This Admission Number is already in use. Please assign another.";
						
						$this->load->view('admissions/addnew1', $data);
					}
					else 
					{
						$input['actionf'] = 'basic_details';
						$this->load->model('admissions/admission');
						$res2 = $this->admission->insert($input);
					
					
						if($res2) 
						{
							$sess['adm'] = $input['adm'];
							$this->session->set_userdata('sess', $sess);
							
							$input['action'] = 'get';
							$input['actionf'] = 'get_classes';
							
							$this->load->model('admissions/admission');
							$classes = $this->admission->insert($input);
							
								$class = $classes->row();
								$input['class'] = $class->CLASS;
								$input['action'] = 'get';
								$input['actionf'] = 'get_streams';
								
								$this->load->model('admissions/admission');
								$streams = $this->admission->insert($input);
							
							$data['success'] = "Success. You entered the basic details successfully.";							
							$data['classes'] = $classes;
							$data['streams'] = $streams;
							
							$this->load->view('admissions/addnew2', $data);
						
						}
						
					}
					
				}
				
				else
				{
					
					$input['adm'] = $this->input->post('adm');
					$input['actionf'] = 'step1';
					$input['f_name'] = strtoupper($this->input->post('f_name'));
					$input['m_name'] = strtoupper($this->input->post('m_name'));
					$input['l_name'] = strtoupper($this->input->post('l_name'));
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
				
					if($res->num_rows() > 0 ) 
					{
						$data['error'] = "Error. This Admission Number is already in use. Please assign another.";

						
						$this->load->view('admissions/header');
						$this->load->view('admissions/addnew1',$data);
						$this->load->view('admissions/footer');
					}
					else 
					{
						$input['actionf'] = 'basic_details';
						$this->load->model('admissions/admission');
						$res2 = $this->admission->insert($input);
					
					
						if($res2) 
						{
							$sess['adm'] = $input['adm'];
							$this->session->set_userdata('sess', $sess);
							
							$input['action'] = 'get';
							$input['actionf'] = 'get_classes';
							
							$this->load->model('admissions/admission');
							$classes = $this->admission->insert($input);
							
								$class = $classes->row();
								$input['class'] = $class->CLASS;
								$input['action'] = 'get';
								$input['actionf'] = 'get_streams';
								
								$this->load->model('admissions/admission');
								$streams = $this->admission->insert($input);
							
							$data['success'] = "Success. You entered the basic details successfully.";							
							$data['classes'] = $classes;
							$data['streams'] = $streams;
							
							$this->load->view('admissions/header');
							$this->load->view('admissions/addnew2', $data);
							$this->load->view('admissions/footer');
						
						}
						
					}
					
				}
				
			}
		
		
			if($this->input->post('actionflag') == 'step2')
			{	
				if($this->input->post('actionf') == 'get_streams')
				{
					
					$input['class'] = $this->input->post('class1');
					$input['action'] = 'get';
					$input['actionf'] = 'get_streams';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res)
					{
						
						if($res->num_rows() > 0)
						{
							
							$html = "<p>Streams: <select name=\"stream\" id=\"stream\">";
							
							foreach($res->result() as $row)
							{
								$html .= "<option value=\"{$row->STREAMS}\">{$row->STREAMS}</option>";
							
							}
							
							$html .= "</select></p>";
							
							echo $html;
							exit;
						
						}
						else
						{
							echo "<p style=\" color: #ff6666; \">This class has no registered streams</p>";
							exit;
						
						}
						
					}
					else if(!$res)
					{
						echo "<p style=\" color: #ff6666; \">This class has no registered streams</p>";
						exit;
					
					}
				
				}
				
				if($this->input->post('is_ajax'))
				{
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['dob'] = $this->input->post('dob');
					$input['pob'] = $this->input->post('pob');
					$input['doa'] = $this->input->post('doa');
					$input['caa'] = $this->input->post('caa');
					$input['county'] = $this->input->post('county');
					$input['gender'] = $this->input->post('gender');
					$input['nationality'] = $this->input->post('nationality');
					$input['actionf'] = 'pdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You entered the personal details successfully.";
						$this->load->view('admissions/addnew3', $data);
					}
				
				}
				else
				{
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['dob'] = $this->input->post('dob');
					$input['pob'] = $this->input->post('pob');
					$input['doa'] = $this->input->post('doa');
					$input['caa'] = $this->input->post('caa');
					$input['county'] = $this->input->post('county');
					$input['gender'] = $this->input->post('gender');
					$input['nationality'] = $this->input->post('nationality');
					$input['actionf'] = 'pdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You entered the personal details successfully.";
						
						$this->load->view('admissions/header');
						$this->load->view('admissions/addnew3', $data);
						$this->load->view('admissions/footer');
					}
					
				}
			
			}
			
			if($this->input->post('actionflag') == 'step3')
			{	
				if($this->input->post('is_ajax'))
				{
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['pa'] = $this->input->post('pa');
					$input['pc'] = $this->input->post('pc');
					$input['town'] = $this->input->post('town');
					$input['actionf'] = 'cdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You entered the contact details successfully.";
						$this->load->view('admissions/addnew4', $data);
					
					}

				
				}
				else
				{
				
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['pa'] = $this->input->post('pa');
					$input['pc'] = $this->input->post('pc');
					$input['town'] = $this->input->post('town');
					$input['actionf'] = 'cdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You entered the contact details successfully.";
						$this->load->view('admissions/header');
						$this->load->view('admissions/addnew4', $data);
						$this->load->view('admissions/footer');
					
					}
					
				}

			}
			
			if($this->input->post('actionflag') == 'step4')
			{	
				if($this->input->post('is_ajax'))
				{
					$data['success'] = "Success. You uploaded the passport photo successfully.";
					$this->load->view('admissions/addnew5', $data);
				
				}
				else
				{
					$data['success'] = "Success. You uploaded the passport photo successfully.";
					
					$this->load->view('admissions/header');
					$this->load->view('admissions/addnew5', $data);
					$this->load->view('admissions/footer');
				
				}
				
			}
			
			if($this->input->post('actionflag') == 'step5')
			{
				if($this->input->post('is_ajax'))
				{
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['f_name'] = $this->input->post('f_name');
					$input['l_name'] = $this->input->post('l_name');
					$input['paddress'] = $this->input->post('paddress');
					$input['pcode'] = $this->input->post('pcode');
					$input['phone'] = $this->input->post('pcode');
					$input['email'] = $this->input->post('email');
					$input['actionf'] = 'fdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You entered the father's details successfully." ;
						$this->load->view('admissions/addnew6', $data);
						
					}
				
				}
				else
				{
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['f_name'] = $this->input->post('f_name');
					$input['l_name'] = $this->input->post('l_name');
					$input['paddress'] = $this->input->post('paddress');
					$input['pcode'] = $this->input->post('pcode');
					$input['phone'] = $this->input->post('pcode');
					$input['email'] = $this->input->post('email');
					$input['actionf'] = 'fdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You entered the father's details successfully." ;
						$this->load->view('admissions/header');
						$this->load->view('admissions/addnew6', $data);
						$this->load->view('admissions/footer');
						
					}
				
				}
				
			}
			
			if($this->input->post('actionflag') == 'step6')
			{	
				if($this->input->post('is_ajax'))
				{
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['f_name'] = $this->input->post('f_name');
					$input['l_name'] = $this->input->post('l_name');
					$input['paddress'] = $this->input->post('paddress');
					$input['pcode'] = $this->input->post('pcode');
					$input['phone'] = $this->input->post('pcode');
					$input['email'] = $this->input->post('email');
					$input['actionf'] = 'mdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You entered the mother's details successfully." ;
						$this->load->view('admissions/addnew7', $data);
						
					}
				
				}
				else
				{
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['f_name'] = $this->input->post('f_name');
					$input['l_name'] = $this->input->post('l_name');
					$input['paddress'] = $this->input->post('paddress');
					$input['pcode'] = $this->input->post('pcode');
					$input['phone'] = $this->input->post('pcode');
					$input['email'] = $this->input->post('email');
					$input['actionf'] = 'mdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You entered the mother's details successfully." ;
						$this->load->view('admissions/header');
						$this->load->view('admissions/addnew7', $data);
						$this->load->view('admissions/footer');
						
					}
					
				}
				
			}
			
			if($this->input->post('actionflag') == 'step7')
			{	
				if($this->input->post('is_ajax'))
				{
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['f_name'] = $this->input->post('f_name');
					$input['l_name'] = $this->input->post('l_name');
					$input['paddress'] = $this->input->post('paddress');
					$input['pcode'] = $this->input->post('pcode');
					$input['phone'] = $this->input->post('pcode');
					$input['email'] = $this->input->post('email');
					$input['actionf'] = 'gdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You registered the student successfully. To view the details, use the view link above." ;
						$this->load->view('admissions/addnew1', $data);
						
					}
				
				}
				else
				{
					$output = $this->session->userdata('sess');
					$input['adm'] = $output['adm'];
					$input['f_name'] = $this->input->post('f_name');
					$input['l_name'] = $this->input->post('l_name');
					$input['paddress'] = $this->input->post('paddress');
					$input['pcode'] = $this->input->post('pcode');
					$input['phone'] = $this->input->post('pcode');
					$input['email'] = $this->input->post('email');
					$input['actionf'] = 'gdetails';
					
					$this->load->model('admissions/admission');
					$res = $this->admission->insert($input);
					
					if($res) 
					{
						$data['success'] = "Success. You registered the student successfully. To view the details, use the view link above." ;
						$this->load->view('admissions/header');
						$this->load->view('admissions/addnew1', $data);
						$this->load->view('admissions/footer');
						
					}
					
				}
			
			}
			
		}
		
	}

	public function get()
	{
		if($this->input->post('actionf') == 'get_streams')
		{
			$info['class'] = $this->input->post('class');
			$info['actionf'] = $this->input->post('actionf');
			
			$this->load->model('admissions/admission');
			$data['streams'] = $this->admission->get($info);
			
			$this->load->view('admissions/json', $data);
		
		}
	
	}
	
/**
 *This method, view, handles all view operations from the view panel in the dashboard
 *
 *We will identify the various requests by a unique hidden field in every form submission
 *In this case this is an actionflag variable with a unique value assigned to it in a hidden field
 */
	
	public function view() 
	{
		if(!$_POST)
		{
			$this->load->view('admissions/header');
			$this->load->view('admissions/view1');
			$this->load->view('admissions/footer');
		
		}
		
		if($_POST)
		{
			if($this->input->post('actionflag') == 'step1')
			{
				if($this->input->post('is_ajax'))
				{
					$input['actionf'] = $this->input->post('actionflag');
					$input['adm'] = $this->input->post('adm');
					
					$this->load->model('admissions/admission');
					$res = $this->admission->view($input);
					
					if($res->num_rows() == 0)
					{
						$data['error'] = "Error. A student with this Admission Number does not exist.";
						$this->load->view('admissions/view1', $data);
					
					}
					
					else
					{
						$sess['adm'] = $input['adm'];
						foreach($res->result() as $row)
						{
							$sess['f_name'] = $row->f_name;
							$sess['m_name'] = $row->m_name;
							$sess['l_name'] = $row->l_name;
						}
						$this->session->set_userdata('sess', $sess);
						
						$data['success'] = "Success. Student found.";
						$this->load->view('admissions/view2', $data);

					}
				
				}
				else
				{
					$input['actionf'] = $this->input->post('actionflag');
					$input['adm'] = $this->input->post('adm');
					
					$this->load->model('admissions/admission');
					$res = $this->admission->view($input);
					
					if($res->num_rows() == 0)
					{
						$data['error'] = "Error. A student with this Admission Number does not exist.";
						$this->load->view('admissions/header');
						$this->load->view('admissions/view1', $data);
						$this->load->view('admissions/footer');
					
					}
					
					else
					{
						$sess['adm'] = $input['adm'];
						foreach($res->result() as $row)
						{
							$sess['f_name'] = $row->f_name;
							$sess['m_name'] = $row->m_name;
							$sess['l_name'] = $row->l_name;
						}
						$this->session->set_userdata('sess', $sess);
						
						$data['success'] = "Success. Student found.";
						
						$this->load->view('admissions/header');
						$this->load->view('admissions/view2', $data);
						$this->load->view('admissions/footer');

					}
					
				}
				
			}
			
			if($_POST['actionflag'] == 'step2')
			{
				$adm = $this->session->userdata('admission');
				$actionf = $_POST['actionflag'];

				if(isset($_POST['pdetails']))
				{
					$tablename = 'personal';
					
					$this->load->model('admissions/admission');
					$data['personal'] = $this->admission->view($actionf, $tablename, $adm);
					
					$tablename = 'contacts';
					
					$this->load->model('admissions/admission');
					$data['contacts'] = $this->admission->view($actionf, $tablename, $adm);
					
				}
				
				if(isset($_POST['pgdetails']))
				{
					$tablename = 'father_details';
					
					$this->load->model('admissions/admission');
					$data['father_details'] = $this->admission->view($actionf, $tablename, $adm);
					
					$tablename = 'mother_details';
					
					$this->load->model('admissions/admission');
					$data['mother_details'] = $this->admission->view($actionf, $tablename, $adm);
					
					$tablename = 'guardian_details';
					
					$this->load->model('admissions/admission');
					$data['guardian_details'] = $this->admission->view($actionf, $tablename, $adm);
				
				}
				
				$this->load->view('admissions/header');
				$this->load->view('admissions/view3', $data);
				$this->load->view('admissions/footer');
			
			}
		}
	
	
	}
	
//=============================================================================================//
	public function update() 
	{
		if(!$_POST && $this->uri->segment(3) === FALSE)
		{
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/choose_adm');
			$this->load->view('admissions/footer');
		
		}
		
		if($_POST)
		{
			if($this->input->post('actionflag') == 'step1')
			{
				$actionf = $this->input->post('actionflag');
				$adm = $this->input->post('adm');
				$this->session->set_userdata('admission', $adm);
				
				$this->load->model('admissions/admission');
				$res = $this->admission->update($actionf);
				
				if($res->num_rows() == 0)
				{
					echo "A student with this Admission Number does not exist.<p>";
					exit;
				
				}
				
				if($res->num_rows() > 0)
				{
					
					foreach($res->result() as $row)
					{
						
						$this->session->set_userdata('f_name', $row->f_name);
						$this->session->set_userdata('m_name', $row->m_name);
						$this->session->set_userdata('l_name', $row->l_name);
						
						$this->load->view('admissions/header');
						$this->load->view('admissions/update/view2');
						$this->load->view('admissions/footer');
					
					}

				}
			}
			
			if($this->input->post('actionflag') == 'step2')
			{
				$adm = $this->session->userdata('admission');
				$actionf = $this->input->post('actionflag');

				if(isset($_POST['pdetails']))
				{
					$actionf = 'get_bdetails';
					
					$this->load->model('admissions/admission');
					$data['basic'] = $this->admission->update($actionf);
					
					$actionf = 'get_pdetails';
					
					$this->load->model('admissions/admission');
					$data['personal'] = $this->admission->update($actionf);
					
					$actionf = 'get_contacts';
					
					$this->load->model('admissions/admission');
					$data['contacts'] = $this->admission->update($actionf);
					
				}
				
				if(isset($_POST['pgdetails']))
				{
					$actionf = 'get_fdetails';
					
					$this->load->model('admissions/admission');
					$data['father_details'] = $this->admission->update($actionf);
					
					$actionf = 'get_mdetails';
					
					$this->load->model('admissions/admission');
					$data['mother_details'] = $this->admission->update($actionf);
					
					$actionf = 'get_gdetails';
					
					$this->load->model('admissions/admission');
					$data['guardian_details'] = $this->admission->update($actionf);
				
				}
				
				$this->load->view('admissions/header');
				$this->load->view('admissions/update/view3', $data);
				$this->load->view('admissions/footer');
			
			}
		}
		
		if($this->uri->segment(3) == 'personal')
		{
			$actionf = 'get_pdetails';
			
			$this->load->model('admissions/admission');
			$data['personal'] = $this->admission->update($actionf);
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/pdetails', $data);
			$this->load->view('admissions/footer');

		
		}
		
		if($this->uri->segment(3) == 'personal_up')
		{
			$actionf = 'personal';
			
			if($this->input->post('dob'))
			{
				$this->session->set_userdata('dob', $this->input->post('dob'));
			
			}
			if($this->input->post('pob'))
			{	
				$this->session->set_userdata('pob', $this->input->post('pob'));
			
			}
			if($this->input->post('doa'))
			{
				$this->session->set_userdata('doa', $this->input->post('doa'));
			
			}
			if($this->input->post('coa'))
			{
				$this->session->set_userdata('coa', $this->input->post('coa'));
			
			}
			if($this->input->post('county'))
			{
				$this->session->set_userdata('county', $this->input->post('county'));
			
			}
			if($this->input->post('gender'))
			{
				$this->session->set_userdata('gender', $this->input->post('gender'));
			
			}
			if($this->input->post('nationality'))
			{
				$this->session->set_userdata('nationality', $this->input->post('nationality'));
			
			}
			
			$this->load->model('admissions/admission');
			$this->admission->update($actionf);
			
			$actionf = 'get_bdetails';
			
			$this->load->model('admissions/admission');
			$data['basic'] = $this->admission->update($actionf);
			
			$actionf = 'get_pdetails';
			
			$this->load->model('admissions/admission');
			$data['personal'] = $this->admission->update($actionf);
			
			$actionf = 'get_contacts';
			
			$this->load->model('admissions/admission');
			$data['contacts'] = $this->admission->update($actionf);
			
		
			$actionf = 'get_fdetails';
			
			$this->load->model('admissions/admission');
			$data['father_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_mdetails';
			
			$this->load->model('admissions/admission');
			$data['mother_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_gdetails';
			
			$this->load->model('admissions/admission');
			$data['guardian_details'] = $this->admission->update($actionf);
		
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/view3', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'basic')
		{
			$actionf = 'get_bdetails';
			
			$this->load->model('admissions/admission');
			$data['basic'] = $this->admission->update($actionf);
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/basic', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'basic_up')
		{
			$actionf = 'basic';
			$names = array();
			
			if($this->input->post('f_name'))
			{
				$names['f_name'] = $this->input->post('f_name');
				
			}
			if($this->input->post('m_name'))
			{
				$names['m_name'] = $this->input->post('m_name');
			
			}
			if($this->input->post('l_name'))
			{
				$names['l_name'] = $this->input->post('l_name');
			
			}
			
			$this->session->set_userdata('names', $names);
			
			$this->load->model('admissions/admission');
			$this->admission->update($actionf);
			
			$actionf = 'get_bdetails';
			
			$this->load->model('admissions/admission');
			$data['basic'] = $this->admission->update($actionf);
	
			$actionf = 'get_pdetails';
			
			$this->load->model('admissions/admission');
			$data['personal'] = $this->admission->update($actionf);
			
			$actionf = 'get_contacts';
			
			$this->load->model('admissions/admission');
			$data['contacts'] = $this->admission->update($actionf);
			
		
			$actionf = 'get_fdetails';
			
			$this->load->model('admissions/admission');
			$data['father_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_mdetails';
			
			$this->load->model('admissions/admission');
			$data['mother_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_gdetails';
			
			$this->load->model('admissions/admission');
			$data['guardian_details'] = $this->admission->update($actionf);
		
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/view3', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'contacts')
		{
			$actionf = 'get_contacts';
			
			$this->load->model('admissions/admission');
			$data['contacts'] = $this->admission->update($actionf);
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/contacts', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'contacts_up')
		{
			$actionf = 'contacts';
			$values = array();
			
			if($this->input->post('paddress'))
			{
				$values['paddress'] = $this->input->post('paddress');
				
			}
			if($this->input->post('pcode'))
			{
				$values['pcode'] = $this->input->post('pcode');
			
			}
			if($this->input->post('town'))
			{
				$values['town'] = $this->input->post('town');
			
			}
			
			$this->session->set_userdata('values', $values);
			
			$this->load->model('admissions/admission');
			$this->admission->update($actionf);
			
			$actionf = 'get_bdetails';
			
			$this->load->model('admissions/admission');
			$data['basic'] = $this->admission->update($actionf);
	
			$actionf = 'get_pdetails';
			
			$this->load->model('admissions/admission');
			$data['personal'] = $this->admission->update($actionf);
			
			$actionf = 'get_contacts';
			
			$this->load->model('admissions/admission');
			$data['contacts'] = $this->admission->update($actionf);
			
		
			$actionf = 'get_fdetails';
			
			$this->load->model('admissions/admission');
			$data['father_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_mdetails';
			
			$this->load->model('admissions/admission');
			$data['mother_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_gdetails';
			
			$this->load->model('admissions/admission');
			$data['guardian_details'] = $this->admission->update($actionf);
		
		
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/view3', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'fdetails')
		{
			$actionf = 'get_fdetails';
			
			$this->load->model('admissions/admission');
			$data['fdetails'] = $this->admission->update($actionf);
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/fdetails', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'fdetails_up')
		{
			$actionf = 'fdetails';
			$values = array();
			
			if($this->input->post('f_name'))
			{
				$values['f_name'] = $this->input->post('f_name');
				
			}
			if($this->input->post('l_name'))
			{
				$values['l_name'] = $this->input->post('l_name');
			
			}
			if($this->input->post('paddress'))
			{
				$values['paddress'] = $this->input->post('paddress');
			
			}
			
			if($this->input->post('pcode'))
			{
				$values['pcode'] = $this->input->post('pcode');
			
			}
			if($this->input->post('phone'))
			{
				$values['phone'] = $this->input->post('phone');
			
			}
			
			if($this->input->post('email'))
			{
				$values['email'] = $this->input->post('email');
			
			}
			
			$this->session->set_userdata('values', $values);
			
			$this->load->model('admissions/admission');
			$this->admission->update($actionf);
			
			$actionf = 'get_bdetails';
			
			$this->load->model('admissions/admission');
			$data['basic'] = $this->admission->update($actionf);
	
			$actionf = 'get_pdetails';
			
			$this->load->model('admissions/admission');
			$data['personal'] = $this->admission->update($actionf);
			
			$actionf = 'get_contacts';
			
			$this->load->model('admissions/admission');
			$data['contacts'] = $this->admission->update($actionf);
			
		
			$actionf = 'get_fdetails';
			
			$this->load->model('admissions/admission');
			$data['father_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_mdetails';
			
			$this->load->model('admissions/admission');
			$data['mother_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_gdetails';
			
			$this->load->model('admissions/admission');
			$data['guardian_details'] = $this->admission->update($actionf);
		
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/view3', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'mdetails')
		{
			$actionf = 'get_mdetails';
			
			$this->load->model('admissions/admission');
			$data['mdetails'] = $this->admission->update($actionf);
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/mdetails', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'mdetails_up')
		{
			$actionf = 'mdetails';
			$values = array();
			
			if($this->input->post('f_name'))
			{
				$values['f_name'] = $this->input->post('f_name');
				
			}
			if($this->input->post('l_name'))
			{
				$values['l_name'] = $this->input->post('l_name');
			
			}
			if($this->input->post('paddress'))
			{
				$values['paddress'] = $this->input->post('paddress');
			
			}
			
			if($this->input->post('pcode'))
			{
				$values['pcode'] = $this->input->post('pcode');
			
			}
			if($this->input->post('phone'))
			{
				$values['phone'] = $this->input->post('phone');
			
			}
			
			if($this->input->post('email'))
			{
				$values['email'] = $this->input->post('email');
			
			}
			
			$this->session->set_userdata('values', $values);
			
			$this->load->model('admissions/admission');
			$this->admission->update($actionf);
			
			$actionf = 'get_bdetails';
			
			$this->load->model('admissions/admission');
			$data['basic'] = $this->admission->update($actionf);
	
			$actionf = 'get_pdetails';
			
			$this->load->model('admissions/admission');
			$data['personal'] = $this->admission->update($actionf);
			
			$actionf = 'get_contacts';
			
			$this->load->model('admissions/admission');
			$data['contacts'] = $this->admission->update($actionf);
			
		
			$actionf = 'get_fdetails';
			
			$this->load->model('admissions/admission');
			$data['father_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_mdetails';
			
			$this->load->model('admissions/admission');
			$data['mother_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_gdetails';
			
			$this->load->model('admissions/admission');
			$data['guardian_details'] = $this->admission->update($actionf);
		
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/view3', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'gdetails')
		{
			$actionf = 'get_gdetails';
			
			$this->load->model('admissions/admission');
			$data['gdetails'] = $this->admission->update($actionf);
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/gdetails', $data);
			$this->load->view('admissions/footer');
		
		}
		
		if($this->uri->segment(3) == 'gdetails_up')
		{
			$actionf = 'gdetails';
			$values = array();
			
			if($this->input->post('f_name'))
			{
				$values['f_name'] = $this->input->post('f_name');
				
			}
			if($this->input->post('l_name'))
			{
				$values['l_name'] = $this->input->post('l_name');
			
			}
			if($this->input->post('paddress'))
			{
				$values['paddress'] = $this->input->post('paddress');
			
			}
			
			if($this->input->post('pcode'))
			{
				$values['pcode'] = $this->input->post('pcode');
			
			}
			if($this->input->post('phone'))
			{
				$values['phone'] = $this->input->post('phone');
			
			}
			
			if($this->input->post('email'))
			{
				$values['email'] = $this->input->post('email');
			
			}
			
			$this->session->set_userdata('values', $values);
			
			$this->load->model('admissions/admission');
			$this->admission->update($actionf);
			
			$actionf = 'get_bdetails';
			
			$this->load->model('admissions/admission');
			$data['basic'] = $this->admission->update($actionf);
	
			$actionf = 'get_pdetails';
			
			$this->load->model('admissions/admission');
			$data['personal'] = $this->admission->update($actionf);
			
			$actionf = 'get_contacts';
			
			$this->load->model('admissions/admission');
			$data['contacts'] = $this->admission->update($actionf);
			
		
			$actionf = 'get_fdetails';
			
			$this->load->model('admissions/admission');
			$data['father_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_mdetails';
			
			$this->load->model('admissions/admission');
			$data['mother_details'] = $this->admission->update($actionf);
			
			$actionf = 'get_gdetails';
			
			$this->load->model('admissions/admission');
			$data['guardian_details'] = $this->admission->update($actionf);
		
			
			$this->load->view('admissions/header');
			$this->load->view('admissions/update/view3', $data);
			$this->load->view('admissions/footer');
		
		}

	
	}
	
	
//=============================================================================================//
	public function delete() 
	{
	
	
	}
 
 }
 


