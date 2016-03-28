<?php
	include("dbconfig.php");
	$q = intval($_GET['q']);
	if(isset($_GET['q']))
	$status=$_GET['q'];
	$sql="select * from new_client where status='$status'";
	$res=mysql_query($sql);				
	echo "
	<table class='table table-bordered' id='table1'>
		<caption><h4>List of Enquiry</h4></caption>
		<thead>
			<tr>
				<th> Name </th>
				<th> Email </th>
				<th> Phone </th>
				<th> Enquiry Date </th>
				<th> Next Call Date </th>
				<th> Status </th>
			</tr>
		</thead>";
	while($row=mysql_fetch_array($res))
	{
	echo "<tbody>";
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['phone']."</td>";   
    echo "<td>14-02-2015</td>";
    echo "<td>17-02-2015</td>";
    echo "<td>".$row['status']."</td>";
    echo "</tr>"; 
    echo "</tbody>";
	 }
    echo "</table>";

   ?>