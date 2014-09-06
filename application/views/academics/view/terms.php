<section id="content">
	<div id="main">
		<?php 
		
		$output = $this->session->userdata('sess');
		$title = $output['class'].' '.$output['streams'];
		$exam = $output['years'];
		echo '<div class="classes">';
			echo '<p> View Results </p>';
			echo heading($title, 3);
			echo heading($exam, 3);
			echo "<p>Select a Term.</p>";
			?>

			<ul>
			<?php 
			foreach($terms->result() as $row)
			{
				echo '<li class="acd_button"><a href="'.base_url()."academics/view/terms/{$row->TERM}\">{$row->TERM}</a></li>"; 

			}
			?>
			</ul>
		</div>

	</div>
</section>
