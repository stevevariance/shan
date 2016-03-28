<?php 
ob_start();
session_start();
$conn=mysql_connect("localhost","varcrm_crm","%VRshan@");
mysql_select_db("varcrm_crm",$conn);
?>
