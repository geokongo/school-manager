<section id="content">
	<div id="main">
		<?php 
		
		$output = $this->session->userdata('sess');
		$title = $output['class'].' '.$output['streams'];
		$exam = $output['terms'].' '.$output['years'];
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
