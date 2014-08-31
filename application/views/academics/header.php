<!DOCTYPE html>
<html>
<head><title></title>
</head>
<body>
<header>

<?php 

echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."style/css.css\">";
echo "<p>Sample School Academy.</p>";

echo "<ul><li class=\"button\"><a href=\"";
echo base_url();
echo "academics\"";
echo ">Dashboard</a></li>";
?>
<li class="button"><a href="<?php echo base_url(); ?>academics/enter">Record Exams</a></li>
<li class="button"><a href="<?php echo base_url(); ?>academics/view">View Results</a></li>
<li class="button"><a href="<?php echo base_url(); ?>academics/reports">Reports</a></li>
<li class="button"><a href="<?php echo base_url(); ?>academics/spreadsheets">Spreadsheets</a></li>
<li class="button"><a href="<?php echo base_url(); ?>academics/settings">Settings</a></li>

</ul>


</header>

