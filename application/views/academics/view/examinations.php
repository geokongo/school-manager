<section id="content">
	<div id="main">
		<?php 
		
		$title = $_SESSION['output']->class.' '.$_SESSION['output']->stream;
		$exam = $_SESSION['output']->term.' '.$_SESSION['output']->year;
		echo '<div class="classes">';
			echo '<p> View Results </p>';
			echo heading($title, 3);
			echo heading($exam, 3);
			echo "<p>Select an Exam.</p>";
			?>

			<ul>
			<?php 
			foreach($exams->result() as $row)
			{
				echo '<li class="acd_button"><a href="'.base_url()."academics/view/exams/{$row->EXAM}\">{$row->EXAM}</a></li>"; 

			}
			?>
			</ul>
		</div>

	</div>
</section>
