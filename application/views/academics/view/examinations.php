<div id="main">

<?php 

echo "<img src=\"".base_url()."images/view.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<b>{$this->session->userdata('class')} {$this->session->userdata('streams')} {$this->session->userdata('years')}</b><p>";
echo "<b>{$this->session->userdata('terms')}</b>";
echo "<p>Choose the Exam below and view results.</p>";
?>
<ul>
<?php 
foreach($exams->result() as $row)
{
	echo "<li><a href=\"".base_url()."academics/view/exams/{$row->EXAM}\">{$row->EXAM}</a></li>"; 

}
?>
</ul>


</div>