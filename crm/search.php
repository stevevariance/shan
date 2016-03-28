<?php 
include("dbconfig.php");

$term = strip_tags(substr($_POST['searchit'],0, 100));
$term = mysql_real_escape_string($term); // Attack Prevention
if($term=="")
echo "Enter Something to search";
else{
$query = mysql_query("select * from new_client where name like '{$term}%'");
$string = '';
if (mysql_num_rows($query)){
while($row = mysql_fetch_assoc($query)){
	
$string .= "<b><a href='enquiry_details.php?client_id=".$row['client_id']."'>".$row['name']."</a></b> <br>";

$string .= "\n";
}
}else{
$string = "No matches found!";
}
echo $string;
}
?>

