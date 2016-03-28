<?php 
include("dbconfig.php");
$id=$_POST['id'];
$nextcall_date=$_POST['next_calldate'];
$change_date=$_POST['change_date'];
$status=$_POST['status'];
$budget=$_POST['budget'];
$priority=$_POST['priority'];
$requirement_list="insert into requirement_status_table
values('','$id',NOW(),'$nextcall_date','$change_date','$status','$budget','$priority')";
mysql_query($requirement_list);

if($status=="success"){
	$success_query="update new_client set `client_status` = '1' where client_id='$id'";
	mysql_query($success_query);
}
header("Location:list_enquiry.php");
?>