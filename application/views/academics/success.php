<div id="main">

<?php 
echo "<img src=\"".base_url()."images/enter_ex.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" />";

echo heading('You form was successfully uploaded', 3);

?>
<ul>
<li><?php echo $this->session->userdata('file_path');?></li>

</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
<?php 
echo $this->session->userdata('file_path');;


?>

</div>