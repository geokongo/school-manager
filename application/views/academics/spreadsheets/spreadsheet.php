<div id="main">

<?php 

echo "<img src=\"".base_url()."images/spreadsheets.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

$subjects = $this->session->userdata('subjects');

if($object)
{
	echo "<b>{$_SESSION['output']->class} {$_SESSION['output']->stream} <p>";
	echo "{$_SESSION['output']->term}, {$_SESSION['output']->year} Spreadsheet<p></b>";
	
	echo "<table border=\"1\">";
	echo "<tr><td>ADM</td><td>NAME</td>";
	
	foreach($subjects->result() as $row)
	{
		echo "<td>".substr($row->SUBJECTS, 0, 3)."</td>";
	
	}
	
	echo "<td>TOTAL</td><td>POS</td><td>GRADE</td></tr>";
	
	static $pos;
	$pos = 1;
	
	foreach($object as $row)
	{
		
		
		echo "<tr>";
		
		foreach($row as $name => $value)
		{
			echo "<td>{$value}</td>";
		
		}
		
		$n_subjects = $subjects->num_rows();
		$avg_score = $row['TOTAL']/$n_subjects;
		$score = round($avg_score);
		echo "<td> {$this->grading->get_grade($score)} </td>";
		//echo "<td>";
		//echo $pos;
		//echo "</td>";
		
		echo "</tr>";
		
		$pos++;
	
	}

	echo "</table>";
	

}



?>


</div>