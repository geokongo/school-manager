<?php 

class Admin extends Admin_Controller {
	
	public function index() 
	{
		$this->load->view('admin/header');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
		
		
/*********************************************************************************************/
/************************************Registration of Classes**********************************/
	public function rclasses() {
		$this->load->view('admin/header');
		$this->load->view('admin/rclasses');
		$this->load->view('admin/footer');
		}
		
	public function rclassesn() {
		$this->load->model('admin/register');
		$res = $this->register->classes();
		
		if($res) {
			$this->load->view('admin/header');
			$this->load->view('admin/do_register');
			$this->load->view('admin/footer');
			}
		}
		
	public function rclassesnw() {
		 $class = $_POST['class'];
		 
		 $this->load->model('admin/register');
		 $res = $this->register->insert($class);
		 
		 if($res) {
			
			echo "Registration Successful";
			exit;
			}
		}
/*********************************************************************************************/
/************************************Registration of Streams**********************************/		
	public function rstreams() {
		$this->load->model('admin/select');
		$data["classes"] = $this->select->classes();
		
		
		$this->load->view('admin/header');
		$this->load->view('admin/rstreams', $data);
		$this->load->view('admin/footer');

		}
		
	public function rstreamsnw() {
	
		$class = $_POST['class'];
		$stream = $_POST['stream'];
		
		$this->load->model('admin/register');
		$res = $this->register->streams($class, $stream);
		
		if($res) {
			echo "You registered the stream successfully";
			exit;
		}
	}

	public function rsubjects() {
		$this->load->model('admin/select');
		$data["classes"] = $this->select->classes();
		
		$this->load->view('admin/header');
		$this->load->view('admin/rsubjects', $data);
		$this->load->view('admin/footer');

		}
		
	public function rsubjectsnw() {
		$class = $_POST['class'];
		$subject = $_POST['subject'];
		$this->load->model('admin/register');
		$res = $this->register->subjects($class, $subject);

		if($res) {
			echo "You regsitered the Subject successfully<p>";
			exit;
		}
	
	}
		
	public function rexams() {
		$this->load->model('admin/select');
		$data["classes"] = $this->select->classes();
						
		
		$this->load->view('admin/header');
		$this->load->view('admin/rexams', $data);
		$this->load->view('admin/footer');

		}
		
	public function rexamsnw() {
		$class = $_POST['class'];
		$exam = $_POST['exam'];
		
		$this->load->model('admin/register');
		$res = $this->register->exams($class, $exam);
		
		if($res) {
			echo "You registered the Examinations Successfully!<p>";
			exit;
		
		}
	
	}

	public function rterms() {
		$this->load->view('admin/header');
		$this->load->view('admin/rterms');
		$this->load->view('admin/footer');

		}
	
	public function rtermsnw() {
		$term = $_POST['term'];
		
		$this->load->model('admin/register');
		$res = $this->register->terms($term);
	
		if($res) {
			echo "You registered the Term Successfully!<p>";
			exit;
		}
	}
		
	public function ryear() {
		$this->load->view('admin/header');
		$this->load->view('admin/ryear');
		$this->load->view('admin/footer');
		}
		
	public function ryearnw() {
		$year = $_POST['year'];
		
		$this->load->model('admin/register');
		$res = $this->register->year($year);
		
		if($res) {
			echo "Cmon, you registered the Year Successfully!<p>";
			exit;
		}

	
	}
}
?>