<div id="main">

<?php 

echo "<img src=\"".base_url()."images/report.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<b>{$this->session->userdata('class')} {$this->session->userdata('streams')} {$this->session->userdata('years')}</b>";
echo "<p>Choose the Term below and view results.</p>";
?>
<ul>
<?php 
foreach($terms->result() as $row)
{
	echo "<li><a href=\"".base_url()."academics/reports/term/{$row->TERM}\">{$row->TERM}</a></li>"; 

}
?>
</ul>


</div>