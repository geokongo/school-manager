<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grading {

	private $tablename;
	private $bt = '_';
	private $value = 'grading';

	private $class;
	private $class_grading;
	private $grade_points;
	
    public function __construct($class_)
    {
		
		$this->class = $class_['class'];
		$this->tablename = $this->class.$this->bt.$this->value;
		
		$CI = &get_instance();
		
		$CI->load->model('academics/academic');
		$this->class_grading = $CI->academic->grading_model($this->tablename);
		
		$this->tablename = 'grade_points';
		
		$CI->load->model('academics/academic');
		$this->grade_points = $CI->academic->grading_model($this->tablename);
		
    }
	
	
	
	public function get_grade($score)
	{
		$grade;
		$from;
		$to;
		
		foreach($this->class_grading->result() as $row)
		{
			
			
			$this->grade = $row->GRADE;
			$this->from = $row->FROM_;
			$this->to = $row->TO_;
			
			if($score >= $this->from && $score <= $this->to )
			{
				
				return $this->grade;
			
			}
		
		}
	
	}
	
	public function get_remarks($score)
	{
		$remarks;
		$from;
		$to;
		
		foreach($this->class_grading->result() as $row)
		{
			
			
			$this->remarks = $row->REMARKS;
			$this->from = $row->FROM_;
			$this->to = $row->TO_;
			
			if($score >= $this->from && $score <= $this->to )
			{
				return $this->remarks;
			
			}
		
		}
		
	
	}
	
	/*Utilizing CodeIgniter Resources within Your Library
	$CI =& get_instance();

	$CI->load->helper('url');
	$CI->load->library('session');
	$CI->config->item('base_url');
	//etc. 
	*/
}