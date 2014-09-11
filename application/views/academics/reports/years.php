<section id="content">
	<div id="main">
		<?php 
		
		$title = $_SESSION['output']->class.' '.$_SESSION['output']->stream;
		echo '<div class="classes">';
			echo '<p> View Reports </p>';
			echo heading($title, 3);
			echo "<p>Select a Year.</p>";
			?>

			<ul>
			<?php 
			foreach($years->result() as $row)
			{
				echo '<li class="acd_button"><a href="'.base_url()."academics/reports/year/{$row->YEAR}\">{$row->YEAR}</a></li>"; 

			}
			?>
			</ul>
		</div>

	</div>
</section>
