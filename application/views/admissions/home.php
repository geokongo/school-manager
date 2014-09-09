<div id="main">

<script type="text/javascript">

$('form').click(function() {
	alert('Hey');
	return false;

});

</script>

<?php 
echo "As an Admissions Office, you can do any of the following.<p>";

?>

<div id="banner"> </div>


<ul>
<style>
ul li {
	list-style: none;
	display: inline;
	margin: 10px;
}
</style>

	<li><a href="<?php echo base_url(); ?>admissions/addnew"><img src="<?php echo base_url(); ?>images/admission.png" alt="Admit New Student" /></a></li>
	<li><a href="<?php echo base_url(); ?>admissions/view"><img src="<?php echo base_url(); ?>images/view_records.png" alt="View Details" /></a></li>
	<li><a href="<?php echo base_url(); ?>admissions/update"><img src="<?php echo base_url(); ?>images/manage_records.png" alt="Update Records" /></a></li>
</ul>


</div>