<div id="main">

<?php 

echo "<img src=\"".base_url()."images/report.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

$output = $_SESSION['output'];
echo "<b>{$output['class']} {$output['stream']} {$output['year']}</b>";
echo "<p>Choose a Student from the class list below and view results.</p>";

echo "<table>";
echo "<tr><td>NO</td><td>ADM</td><td>NAME</td><td>Report</td></tr>";

static $no;
$no = 1;

foreach($class_list->result() as $row)
{
	echo "<tr><td>{$no}</td><td>{$row->ADM}</td><td>{$row->NAME}</td><td><a href=\"".base_url()."academics/reports/adm/{$row->ADM}/name/{$row->NAME}\">View Report</a></td></tr>"; 
	
	$no++;
	
}

echo "</table>";


?>

</div>