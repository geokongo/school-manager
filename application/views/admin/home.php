<div id="main">

<?php 

echo "<p>This is the admin control panel, please configure your options<p>";
echo "<p>Welcome to the admin Control Panel where you can register various variables so that they are available or use to other users of this system</p>";
echo "<p>As an administrator, you can register the following";
?>
<ul>
	<li><a href="<?php echo base_url(); ?>admin/rclasses" >Classes</a></li>
	<li><a href="<?php echo base_url(); ?>admin/rstreams" >Streams</a></li>
	<li><a href="<?php echo base_url(); ?>admin/rsubjects" >Subjects</a></li>
	<li><a href="<?php echo base_url(); ?>admin/rexams" >Examinations</a></li>
	<li><a href="<?php echo base_url(); ?>admin/rterms" >Terms</a>, and </li>
	<li><a href="<?php echo base_url(); ?>admin/ryear" >Year</a></li>
</ul>
<p>The registration of these variables is done in the order in which they appear in the list above</p>
<P>
<P>
Initialize the following variables in  order to setup the system</p>
<?php
	echo form_open('ini/adm');
	echo form_submit('submit', 'Initialize Admission Tables');
	echo form_close();
?>


</div>