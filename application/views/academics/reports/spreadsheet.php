<section id="content">
	<div id="main">

	<?php 

	echo "<img src=\"".base_url()."images/report.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

	$subjects = $_SESSION['output']->subjects;

	if($object->num_rows() > 0)
	{
		echo "<b>{$_SESSION['output']->class} {$_SESSION['output']->stream} <p>";
		echo "{$_SESSION['output']->term}, {$_SESSION['output']->year} Spreadsheet<p></b>";
		
		echo "<table border=\"1\">";
		echo "<tr><td>ADM</td><td>NAME</td>";
		
		foreach($subjects->result() as $row)
		{
			echo "<td>".substr($row->SUBJECTS, 0, 3)."</td>";
		
		}
		
		echo "<td>TOTAL</td><td>POS</td></tr>";
		
		static $pos;
		$pos = 1;
		
		foreach($object->result_array() as $row)
		{
			
			
			echo "<tr>";
			
			foreach($row as $name => $value)
			{
				echo "<td>{$value}</td>";
			
			}
			
			echo "<td>";
			echo $pos;
			echo "</td>";
			
			echo "</tr>";
			
			$pos++;
		
		}

		echo "</table>";
		

	}

	?>

	</div>
</section>