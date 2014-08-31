<?php

echo "<div id=\"main\">";

echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";

echo heading('We will now enter data into the database', 1);
echo "<p>Confirm that the data is okay and you now want it into a table in the database.</p>";

echo form_open('academics/enter');
echo form_hidden('actionf', 'insert_records');
echo form_label('Confirm to insert results into database','confirm');
echo "<p>";
echo form_submit('submit', 'Confirm');
echo form_close();

echo $this->session->userdata('file_path');
echo "<p>";
echo $this->session->userdata('tablename');


echo "</div>";