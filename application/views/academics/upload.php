<div id="main">

<?php

echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";

echo heading('We will upload some excel data', 1);
echo form_open_multipart('academics/enter');
echo form_hidden('actionf', 'upload');
echo form_label('Upload your Spreadsheet results', 'userfile');
echo "<p>";

$attrib1 = array( 'name' => 'userfile',
				  'id' => 'userfile',
				  'size' => '20'
				  );
echo form_upload($attrib1);
echo "<p>";

echo form_submit('submit', 'Submit');
echo form_close();



?>

</div>