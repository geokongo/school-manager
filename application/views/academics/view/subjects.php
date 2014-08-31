<div id="main">

<?php 

echo "<img src=\"".base_url()."images/view.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<b>{$this->session->userdata('class')} {$this->session->userdata('streams')} {$this->session->userdata('years')}</b><p>";
echo "<b>{$this->session->userdata('terms')}, {$this->session->userdata('exams')}</b>";
echo "<p>Choose the Subject below and view results.</p>";
?>
<ul>
<?php 
foreach($subjects->result() as $row)
{
	echo "<li><a href=\"".base_url()."academics/view/subjects/{$row->SUBJECTS}\">{$row->SUBJECTS}</a></li>"; 

}
?>
</ul>


</div>