<div id="main">

<?php 

echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";

echo heading('You entered the results below', 3);
echo "<b>{$this->session->userdata('class')} {$this->session->userdata('streams')} <p>";
echo "{$this->session->userdata('subjects')} {$this->session->userdata('exams')} <p>";
echo "{$this->session->userdata('terms')}, {$this->session->userdata('years')}.</b>";

echo "<table>";
echo "<tr><td>NAME</td><td>ADM NO.</td><td>SCORE</td></tr>";

foreach($data->result() as $row)
{
	echo "<tr><td>{$row->NAME}</td><td>{$row->ADM}</td><td>{$row->SCORE}</td></tr>";

}

echo "</table>";


?>

</div>