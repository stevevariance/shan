<?php 
include("header.php");
if($_SESSION['isLogged']==false) {
  header("location:index.php"); 
  die(); 
}


?>
<script>
$(document).ready(function(){
$("#search_results").slideUp();
$("#button_find").click(function(event){
event.preventDefault();
search_ajax_way();
});
$("#search_query").keyup(function(event){
event.preventDefault();
search_ajax_way();
});
});
function search_ajax_way(){
$("#search_results").show();
var search_this=$("#search_query").val();
$.post("search.php", {
	searchit : search_this
	
}, 
	function(data){
$("#display_results").html(data);
})
}


</script>
<script>
function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("table1").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (str=="success") {
      document.getElementById("table1").innerHTML = xhttp.responseText;
    }
    if (str=="failed") {
      document.getElementById("table1").innerHTML = xhttp.responseText;
    }
    if (str=="processing") {
      document.getElementById("table1").innerHTML = xhttp.responseText;
    }
    if (str=="onhold") {
      document.getElementById("table1").innerHTML = xhttp.responseText;
    }
    
  };
  xhttp.open("GET", "getclient.php?q="+str, true);
  xhttp.send();

}

function loadstatus(){
	var stat=document.getElementById("status_options").value;
	alert(stat);

}
function loaddate(){
	var stat=document.getElementById("datepicker3").value;
	//alert(stat);
	

}
</script>

<?php 
	$num_rec_per_page=10;
	
	if (isset($_GET["page"])&& is_numeric($_GET["page"])) { $page  = (int)$_GET["page"]; } else { $page=1; } 

	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["status_options"])){
	$status_options=$_GET["status_options"];
	$requirementlist = "SELECT  p.*,q.* 
	FROM new_client as p 
	INNER JOIN requirement_status_table as q 
	ON  p.client_id = q.client_id 
	where q.status='$status_options' 
	LIMIT $start_from, $num_rec_per_page";	
	$totalrequirement = "SELECT  p.*,q.* 
	FROM new_client as p 
	INNER JOIN requirement_status_table as q 
	ON  p.client_id = q.client_id 
	where q.status='$status_options' "; 
	}
	else{

	$requirementlist = "SELECT  p.*,q.* 
	FROM new_client as p 
	INNER JOIN requirement_status_table as q 
	ON  p.client_id = q.client_id 
	where q.status='processing'
	LIMIT $start_from, $num_rec_per_page";
	$totalrequirement = "SELECT  p.*,q.* 
	FROM new_client as p 
	INNER JOIN requirement_status_table as q 
	ON  p.client_id = q.client_id 
	where q.status='processing'"; 
	}
	if(isset($_GET["datepicker3"])){
	$datepicker3=$_GET["datepicker3"];
	$requirementlist = "SELECT  p.*,q.* 
	FROM new_client as p 
	INNER JOIN requirement_status_table as q 
	ON  p.client_id = q.client_id 
	where q.enquirydate='$datepicker3'  
	LIMIT $start_from, $num_rec_per_page";	
	$totalrequirement = "SELECT  p.*,q.* 
	FROM new_client as p 
	INNER JOIN requirement_status_table as q 
	ON  p.client_id = q.client_id 
	where q.enquirydate='$datepicker3' "; 
	}
	
	
	
	//$sql="select * from new_client";
?>

<div class="table">
	<div class="row">
		<div class="col-sm-4">

		</div>
		<div class="col-sm-2">
		<h4>Filters:</h4>

		</div>	
		<div class="col-sm-2">
		<form  method="GET" name="status_options">
		<select class="form-control" name ="status_options" id="status_options"  onchange="this.form.submit()">
				  	
				    <option value="processing"> Processing </option>
				    <option value="onhold" 
				    <?php 
				    if(@$status_options=='onhold'){
				    	 echo "selected= 'selected'";
				    }
				    ?> > OnHold</option>
				    <option value="success" 
				    <?php 
				    if(@$status_options=='success'){
				    	 echo "selected= 'selected'";
				    }
				    ?> > Success </option>
				    <option value="failed" 
				    <?php 
				    if(@$status_options=='failed'){
				    	 echo "selected= 'selected'";
				    }
				    ?> > Failed </option>
				  </select>
				  
		</div>
	</form>
	<form name="datepicker" method="GET" onsubmit="loaddate()">
		<div class="col-sm-2">
			<div id="imaginary_container1"> 
				 <div class="input-group stylish-input-group">
					<input type="text" class="form-control" placeholder="Select Date" name="datepicker3" id="datepicker3">
					<span class="input-group-addon" id="datepicker_span">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
				</div>
			</div>
		</div>
		</form>	
		<div class="col-sm-2">
			<div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control"  name="search_query" id="search_query" placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
            <div id="display_results"></div>
		</div>	
	
	</div>	
	<?php
	
	$res=mysql_query($requirementlist);
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
	    
	    echo "<td><a href='enquiry_details.php?client_id=".$row['client_id']."'>".$row['name']."</a></td>";
	    echo "<td>".$row['email']."</td>";
	    echo "<td>".$row['phone']."</td>";   
	    echo "<td>".$row['enquirydate']."</td>";
	    echo "<td>".$row['nextcall_date']."</td>";
	    echo "<td>".$row['status']."</td>";
	    echo "</tr>"; 
	    echo "</tbody>";
	}

    echo "</table>";

   ?>
    <?php 
	echo "<div class='pagination_num'>";
	$rs_result = mysql_query($totalrequirement); //run the query
	$total_records = mysql_num_rows($rs_result);
	$numrows=$rs_result[0]; 
	$total_pages = ceil($total_records / $num_rec_per_page);
	if (isset($_GET['page']) && is_numeric($_GET['page'])) {
	   $page = (int) $_GET['page'];
	} 
	else {
	   
	   $page = 1;
	} 

	if ($page > $total_pages) {
	  
	   $page = $total_pages;
	} 

	if ($page < 1) {
	  
	   $page = 1;
	}
	if ($page > $total_pages) {
	   
	   $page = $total_pages;
	} 
	
	if ($page < 1) {
	   
	   $page = 1;
	} 
	$offset = ($page - 1) * $num_rec_per_page;

	if ($page > 1) {
	   
	   echo " <a id='link_page' href='{$_SERVER['PHP_SELF']}?page=1'> First Page </a> ";
	   
	   $prevpage = $page - 1;
	  
	   echo " <a id='link_page' href='{$_SERVER['PHP_SELF']}?page=$prevpage'> | Previous | </a> ";
	} 
	$range = 3;

	
	for ($x = ($page - $range); $x < (($page + $range)  + 1); $x++) {
	
	   if (($x > 0) && ($x <= $total_pages)) {
	     
	      if ($x == $page) {
	         
	         echo " [<b>$x</b>] ";
	     
	      } else {
	       
	         echo " <a id='link_page' href='{$_SERVER['PHP_SELF']}?page=$x'>$x</a> ";
	      } 
	   } 
	} 
	   if ($page != $total_pages) {
	   $nextpage = $page + 1;
	   echo " <a id='link_page' href='{$_SERVER['PHP_SELF']}?page=$nextpage'> | Next | </a> ";
	   echo " <a id='link_page' href='{$_SERVER['PHP_SELF']}?page=$total_pages'> Last Page </a> ";
	} 

	echo "</div>";
	?>	

	   </div>	

<?php 
include("footer.php");
?>