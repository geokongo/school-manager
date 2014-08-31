<div id="main">

<?php 

echo "<img src=\"".base_url()."images/report.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

$exams = $this->session->userdata('exams');
$subjects = $this->session->userdata('subjects');
$report = $this->session->userdata('report');

$n_subjects = $subjects->num_rows();
$n_exams = $exams->num_rows();

$score_ = $this->session->userdata('total_avg')/$n_subjects;
$score = round($score_, 0);

echo "End of <b>{$this->session->userdata('term')} {$this->session->userdata('year')} </b><p>";
echo "Name : <b> ".$this->session->userdata('name')." </b> Admission Number : <b>{$this->session->userdata('adm')}</b><p> ";
echo "Class : <b>{$this->session->userdata('class')}</b> Stream : <b>{$this->session->userdata('stream')}</b> &nbsp Average Grade: <b>{$this->grading->get_grade($score)}</b><p> "; 

	echo "<table border=\"1\">";
	echo "<tr><td>SUBJECT</td>";

	foreach($exams->result() as $x)
	{
		echo "<td>{$x->EXAM}</td>";
 
	}

	echo "<td>AVG</td><td>GRADE</td><td>REMARKS</td></tr>";
	
	foreach($report->result_array() as $row)
	{
		echo "<tr>";
		
		foreach($row as $name => $value)
		{
			echo "<td>{$value}</td>";
		
		}
		
		$score = $row['AVG'];
		echo "<td> &nbsp {$this->grading->get_grade($score)}</td><td> &nbsp {$this->grading->get_remarks($score)}  </td></tr>";
	
	}
	
	$colspan = $n_exams + 1;
	
	echo "<tr><td colspan=\"{$colspan}\">TOTAL</td><td>{$this->session->userdata('total_avg')} </td><td>Out Of</td><td>{$this->session->userdata('out_of_score')} </td></tr> ";
	echo "<tr><td colspan=\"{$colspan}\">POSITION</td><td>{$this->session->userdata('pos')} </td><td>Out Of</td><td>{$this->session->userdata('no_of_students')} </td></tr> ";

	echo "</table>";
	
	echo "Class Teacher's Remarks ...........................................................<br />
		....................................................................................................<br />
		....................................................................................................<br />
		....................................Sign  ....................  Date  .....................<p>";
		
	echo "Head Teacher's Remarks ...........................................................<br />
		....................................................................................................<br />
		....................................................................................................<br />
		......................................Sign  ....................  Date  ...................<p>";
		

		
		
?>

</div>