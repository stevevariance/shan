<?php 
include("dbconfig.php");
//$id=$_POST['id'];
$name=$_POST['client_name'];
$requirement=$_POST['requirement'];
//$enquiry_date=$_POST['enquiry_date'];
$budget=$_POST['budget'];
$currency=$_POST['currency'];
//$status=$_POST['status'];
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

$requirement_sql="insert into existingclient_requirement
values('','$name','$requirement',CURDATE(),'$budget','$currency','$priority','$file')";
mysql_query($requirement_sql);
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


}



/*SELECT new_client.client_ID, project_details.project_name, new_client.name 
FROM new_client 
INNER JOIN project_details 
ON new_client.client_ID=project_details.client_ID

SELECT new_client.client_ID, new_client.name, new_client.email, new_client.phone,requirement_table.status,requirement_table.enquirydate 
FROM new_client 
INNER JOIN requirement_table 
ON new_client.client_ID=requirement_table.client_ID



SELECT p.client_ID, p.name, p.email, p.phone,q.status,q.enquirydate,q.nextcall_date 
FROM new_client as p 
INNER JOIN requirement_table as q 
ON p.client_id=q.client_id;



*/

?>