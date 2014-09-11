<section id="content">
	<div id="main">


	<?php

	echo "<img src=\"".base_url()."images/view.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

	echo "<b>{$_SESSION['output']->class} {$_SESSION['output']->stream} <p>";
	echo "{$_SESSION['output']->subject} {$_SESSION['output']->exam} <p>";
	echo "{$_SESSION['output']->term}, {$_SESSION['output']->year}.</b>";

	echo "<div id=\"block1\">";

	echo "<table border=\"1\">";
	echo "<tr><td>NAME</td><td>ADM NO.</td><td>SCORE</td></tr>";

	foreach($results->result() as $row)
	{
		echo "<tr><td>{$row->NAME}</td><td>{$row->ADM}</td><td>{$row->SCORE}</td></tr>";

	}

	echo "</table>";

	echo "</div>";

	?>

	</div>
</section>