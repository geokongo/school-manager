<div id="main">

<?php 

?>
<script>
function printPage(id)
{
   var html="<html>";
   html+= document.getElementById(id).innerHTML;
   html+="</html>";

   var printWin = window.open('','','left=0,top=0,width=1,height=5,toolbar=0,scrollbars=0,status  =0');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
}
</script>

<?php

echo "<img src=\"".base_url()."images/view.png\" /><p>";
echo "<img src=\"".base_url()."images/underline.jpg\" /><p>";

echo "<b>{$this->session->userdata('class')} {$this->session->userdata('streams')} <p>";
echo "{$this->session->userdata('subjects')} {$this->session->userdata('exams')} <p>";
echo "{$this->session->userdata('terms')}, {$this->session->userdata('years')}.</b>";

echo "<div id=\"block1\">";

echo "<table border=\"1\">";
echo "<tr><td>NAME</td><td>ADM NO.</td><td>SCORE</td></tr>";

foreach($results->result() as $row)
{
	echo "<tr><td>{$row->NAME}</td><td>{$row->ADM}</td><td>{$row->SCORE}</td></tr>";

}

echo "</table>";

echo "</div>";

?>
<p><a href="javascript:printPage('block1')">Print Results</a></p>

<?php 
/* <input type="button" value="Print Results" onclick="printPage('block1');"></input>

*/


?>

</div>