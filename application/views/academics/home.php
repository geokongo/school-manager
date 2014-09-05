<div id="main">
<?php 

echo heading('Welcome!', 2);


echo heading('This is the Academics Department Dashboard', 3);

echo "As an Academics Office you can do any of the following tasks.<p>";
?>

<ul>
<style>
ul li {
	list-style: none;
	display: inline;
	margin: 10px;
}
</style>

<li><a href="<?php echo base_url(); ?>academics/enter"><img src="<?php echo base_url(); ?>images/enter_ex.png" alt="Enter Examinations Results" /></a></li>
<li><a href="<?php echo base_url(); ?>academics/view"><img src="<?php echo base_url(); ?>images/view.png" alt="View Examination Results" /></a></li>
<li><a href="<?php echo base_url(); ?>academics/reports"><img src="<?php echo base_url(); ?>images/report.png" alt="Generate End Term Reports" /></a></li>
<li><a href="<?php echo base_url(); ?>academics/spreadsheets"><img src="<?php echo base_url(); ?>images/spreadsheets.png" alt="Generate Spreadsheets" /></a></li>
<li><a href="<?php echo base_url(); ?>academics/settings"><img src="<?php echo base_url(); ?>images/settings.png" alt="Settings" /></a></li>


<!--<li><a href="<?php echo base_url(); ?>academics">Generate Graphical Results Analysis</a></li> -->
</ul>

</div>