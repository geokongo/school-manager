<section id="content">
	<div id="main">
		<?php 
		
		$output = $this->session->userdata('sess');
		$title = $output['class'].' '.$output['streams'];
		$exam = $output['exams'].' '.$output['terms'].' '.$output['years'];
		echo '<div class="classes">';
			echo '<p> View Results </p>';
			echo heading($title, 3);
			echo heading($exam, 3);
			echo "<p>Select a Subject.</p>";
			?>

			<ul>
			<?php 
			foreach($subjects->result() as $row)
			{
				echo '<li class="acd_button"><a href="'.base_url()."academics/view/subjects/{$row->SUBJECTS}\">{$row->SUBJECTS}</a></li>"; 

			}
			?>
			</ul>
		</div>

	</div>
</section>

