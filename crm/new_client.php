<?php
include("dbconfig.php");
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$im_type=$_POST['im_option'];
$im=$_POST['im'];
$address=$_POST['address'];
$requirement=$_POST['requirement'];
$budget=$_POST['budget'];
$currency=$_POST['currency'];
$priority=$_POST['priority'];
 $finalfile ="";
 if(isset($_FILES['files'])){
 	 foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
  $file_name = $_FILES['files']['name'][$key];
  $file_size =$_FILES['files']['size'][$key];
  $file_tmp =$_FILES['files']['tmp_name'][$key];
  $file_type=$_FILES['files']['type'][$key]; 
        if($file_size > 21097152){
  			 $errors[]='File size must be less than 20 MB';
        }  
       
        if(empty($errors)==true){

 $filename = $file_name;
 $source = $file_tmp;
 $type = $file_type;
 if($finalfile==""){
 $finalfile=$filename;
 }
 else{
 $finalfile = $finalfile.','.$filename;
 }
 	}
 }
}
$file=$finalfile;
$newclients="insert into new_client(name,email,phone,im_type,im,address,file)
values('$name','$email','$phone','$im_type','$im','$address','$file')";

mysql_query($newclients);
$requirement_details="insert into newclient_requirement values('','$name','$requirement',NOW(),'$budget','$currency','$priority')";
mysql_query($requirement_details);

//move_uploaded_file($_FILES['file']['tmp_name'],"upload/" .time(). $_FILES['file']['name']);

$session_sql="select * from new_client where name='$name'";
$res=mysql_query($session_sql);
while($row=mysql_fetch_array($res)){
	$client_id=$row['client_id'];
}

$dir    = 'upload/';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);
$reqpath="upload/";

mkdir($reqpath.$client_id, 0777);
foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
//echo  $finalfile ;
$file_name = $_FILES['files']['name'][$key];
move_uploaded_file($tmp_name,"upload/".$client_id."/" .time(). $file_name);

//move_uploaded_file($tmp_name, "upload/". $_SESSION["name"] ."/". $file_name);
}

//echo "Client Details saved successfully.";
//header("Location:add_enquiry.php");
?>