<section id="content">
	<div id="main">

	<?php 

	echo "<img src=\"".base_url()."images/settings.png\" /><p>";
	echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

		echo '<div class="classes">';
			echo '<p> Set Grading Criteria. </p>';
			echo "<p>Select a Class.</p>";
			?>

			<ul>
			<?php 
			foreach($classes->result() as $row)
			{
				echo "<li class=\"acd_button\"><a href=\"".base_url()."academics/settings/id/grading/action/get_class/class/{$row->CLASS}\"> {$row->CLASS} </li>";

			}
			?>
			</ul>
		</div>

	</div>
</section>