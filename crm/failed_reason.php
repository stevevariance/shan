<?php 
include("dbconfig.php");
$reason=$_POST['reason'];
$id=$_POST['failed_id'];
$sql="insert into failed_reason(client_id,reason) values('$id','$reason')";
mysql_query($sql);
header("Location:list_enquiry.php");
?>