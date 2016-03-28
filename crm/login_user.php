<?php
include("dbconfig.php");
$username=$_POST['username'];
$password=md5($_POST['password']);
$sql="select * from login where username='$username' and password='$password'";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)){
	 $role=$row['role'];
}
$totaluser=mysql_num_rows($res);
if($totaluser>0)
{
	$_SESSION['username']=$username;
	$_SESSION['role']=$role;
	if($_SESSION['role']==1){
		header("Location:list_enquiry.php"); 
		  $_SESSION['isLogged'] = true;  
		die();
	}
	else{
		header("Location:index.php");   
	}
}
else{
header("Location:index.php");   	
}




?>