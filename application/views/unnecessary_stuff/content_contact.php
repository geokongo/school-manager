<div id="content">
		<?php 
		$title = "My Home Page";
		echo heading($title, 1); 
		?>
		<p>The following data is from the database</p>
		<?php 
		
		echo "Position\t";
		echo "Name<br />";
			foreach($results as $row) {
				
				echo "<pre>";
				echo $row->id;
				echo "\t";
				echo $row->name;
				echo "</pre>";
				echo "<br />";
			
			}
		?>
	</div>