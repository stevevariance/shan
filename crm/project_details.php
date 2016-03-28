<?php 
include("dbconfig.php");
$id=$_POST['client_id'];
$Project_name=$_POST['Project_name'];
$estimated_closedate=$_POST['estimated_closedate'];
$project_duration=$_POST['project_duration'];
$total_projectcost=$_POST['total_projectcost'];
$next_paymentdate=$_POST['next_paymentdate'];
$next_paymentamount=$_POST['next_paymentamount'];
$manager_name=$_POST['manager_name'];
$developer_name=$_POST['developer_name'];
$project_details="insert into project_details
values('','$id','$Project_name','$estimated_closedate','$project_duration','$total_projectcost','$next_paymentdate','$next_paymentamount','$manager_name','$developer_name')";
mysql_query($project_details);
//header("Location:enquiry_details.php");
?>
