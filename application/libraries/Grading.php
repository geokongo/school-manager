<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grading {

	private $variable;
	private $class_grading;
	private $grade_points;
	
    public function __construct($class)
    {
		
		$this->variable['class'] = $class['class'];
		
		$CI = &get_instance();
		
		$CI->load->model('academic');
		$this->class_grading = $CI->academic->grading_model($this->variable);
		
    }
	
	
	public function getGrade($averageScore)
	{
		$grading;
		$grade;
		$from;
		$to;
		
		foreach($this->class_grading->result() as $row)
		{
			$this->grading = unserialize($row->grading);
			
			foreach($this->grading as $gradeName => $gradeParam)
			{
				$this->grade = $gradeName;
				$this->from = $gradeParam['from'];
				$this->to = $gradeParam['to'];
				
				if($averageScore >= $this->from && $averageScore <= $this->to )
				{
					return $this->grade;
				
				}
			
			}
			
		}
	
	}
	
	public function getRemarks($averageScore)
	{
		$grading;
		$remarks;
		$from;
		$to;
		
		foreach($this->class_grading->result() as $row)
		{
			$this->grading = unserialize($row->grading);
			
			foreach($this->grading as $gradeName => $gradeParam)
			{
				$this->remarks = $gradeParam['remarks'];
				$this->from = $gradeParam['from'];
				$this->to = $gradeParam['to'];
				
				if($averageScore >= $this->from && $averageScore <= $this->to )
				{
					return $this->remarks;
				
				}
			
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