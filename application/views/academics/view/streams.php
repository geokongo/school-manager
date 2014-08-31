<div id="main">

<?php 

echo "<img src=\"".base_url()."images/view.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<b>{$this->session->userdata('class')}</b>";
echo "<p>Choose the Stream below and view results.</p>";
?>
<ul>
<?php 
foreach($streams->result() as $row)
{
	echo "<li><a href=\"".base_url()."academics/view/streams/{$row->STREAMS}\">{$row->STREAMS}</a></li>"; 

}
?>
</ul>



</div>