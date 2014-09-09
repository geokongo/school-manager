<section id="content">
	<div id="main">
		<?php 
		
		$output = $_SESSION['output'];
		
		$title = $output['class'];
		echo '<div class="classes">';
			echo '<p> View Reports </p>';
			echo heading($title, 3);
			echo "<p>Select a Stream.</p>";
			?>

			<ul>
			<?php 
			foreach($streams->result() as $row)
			{
				echo '<li class="acd_button"><a href="'.base_url()."academics/reports/stream/{$row->STREAMS}\">{$row->STREAMS}</a></li>"; 

			}
			?>
			</ul>
		</div>

	</div>
</section>
