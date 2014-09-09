<section id="content">
	<div id="main">

	<?php 
	
	echo heading('You entered the results below', 3);
	echo "<b>{$output['class']} {$output['streams']} <p>";
	echo "{$output['subjects']} {$output['exams']} <p>";
	echo "{$output['terms']}, {$output['years']}.</b>";

	echo "<table>";
	echo "<tr><td>NAME</td><td>ADM NO.</td><td>SCORE</td></tr>";

	foreach($data->result() as $row)
	{
		echo "<tr><td>{$row->NAME}</td><td>{$row->ADM}</td><td>{$row->SCORE}</td></tr>";

	}

	echo "</table>";


	?>

	</div>
</section>