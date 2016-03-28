<?php 
include("dbconfig.php");
$notes=$_POST['notes'];
$id=$_POST['notes_id'];
$sql="insert into notes(client_id,notes,date) values('$id','$notes',NOW())";
mysql_query($sql);
header("Location:list_enquiry.php");
?>