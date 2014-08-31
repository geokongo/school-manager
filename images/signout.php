<?php
session_start();
include_once 'connect.php';
$myusername=$_SESSION['myusername'];
$ql=mysql_query("UPDATE attendance SET time_out=NOW() WHERE staff_id='$myusername'");
if($ql)
{
unset($_SESSION['myusername']);
session_destroy();
header("location:../");
}
?>