<section id="content">
	<div id="main">
		<?php 
		
		$title = $_SESSION['output']->class;
		echo '<div class="classes">';
			echo '<p> View Results </p>';
			echo heading($title, 3);
			echo "<p>Select a Stream.</p>";
			?>

			<ul>
			<?php 
			foreach($streams->result() as $row)
			{
				echo '<li class="acd_button"><a href="'.base_url()."academics/view/streams/{$row->STREAMS}\">{$row->STREAMS}</a></li>"; 

			}
			?>
			</ul>
		</div>

	</div>
</section>
