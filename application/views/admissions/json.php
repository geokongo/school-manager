<?php 

if(isset($streams))
{
	if($streams->num_rows() > 0)
	{
		echo form_label('Streams', 'stream');
		
		echo "<select name=\"stream\" id=\"stream\">";
		 foreach($streams->result() as $row)
		 {
			echo "<option value=\"{$row->STREAMS}\">{$row->STREAMS}</option>";
		 
		 }
		 
		echo "</select><p>";
	}

}

?>