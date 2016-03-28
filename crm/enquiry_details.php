<?php
include("header.php");
if($_SESSION['isLogged']==false) {
  header("location:index.php"); 
  die(); 
}

$id=@$_GET['client_id'];
$client_list="select * from new_client where client_id='$id'";
$res=mysql_query($client_list);
while($row=mysql_fetch_array($res))
{
  
  $name=$row['name'];
  $email=$row['email'];
  $phone=$row['phone'];
  //$budget=$row['budget'];
  //$currency=$row['currency'];
  //$requirement=$row['requirement'];
  //$date=$row['enquirydate'];
 $file=$row['file'];
  //$name=md5($name);
}
$sql_list="select * from newclient_requirement where name='$name'";
$result=mysql_query($sql_list);
while($row=mysql_fetch_array($result))
{
  $budget=$row['budget'];
  $currency=$row['currency'];
  $priority=$row['priority'];
  $enquirydate=$row['enquirydate'];

}
?>
<form method="POST" action="requirement_table.php">
<input type="hidden" name="id"  value="<?php echo $id;?>">
<div class="row">
	<div class="col-sm-6">
		<div class="form-group" id="form_group">
      <label class="col-sm-3 control-label">Name</label>
      <div class="col-sm-9">
        <input class="form-control" id="input" type="text" value="<?php echo $name;?>" readonly="">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-3 control-label">Email</label>
      <div class="col-sm-9">
        <input class="form-control" id="input" type="text" value="<?php echo $email;?>" readonly="">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-3 control-label">Phone</label>
      <div class="col-sm-9">
        <input class="form-control" id="input" type="text" value="<?php echo $phone; ?>" readonly="">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-3 control-label">Enquiry Date</label>
      <div class="col-sm-9">
        <input class="form-control" id="input" name="enquiry_date" type="text" value="<?php echo $enquirydate; ?>" readonly="">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-3 control-label">Next Call Date</label>
      <div class="col-sm-9">
       <input type="text" class="form-control" id="datepicker4" name="next_calldate" placeholder="Select Next Call Date">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-3 control-label">Change Date</label>
      <div class="col-sm-9">
       <input type="text" class="form-control" name="change_date"  id="datepicker" placeholder="Change Next Call Date" >
      </div>
    </div>
    <div class="form-group" id="form_group1">
    	<label class="col-sm-3 control-label">Status</label>
    	<div class="col-sm-9">
    	<select class="form-control" id="status_options1" name="status">
            <option value="processing"> Processing </option>
				  	<option value="success"> Success </option>
				    <option value="onhold"> On Hold </option>
				    <option value="failed"> Failed </option>
				  </select>
		</div>		  

    </div>

    <div class="form-group" id="form_group1">
      <label class="col-sm-3 control-label">Budget</label>
      <div class="col-sm-9">
       <input type="text" class="form-control" name="budget" id="input">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-3 control-label"> Priority/Weightage  </label>
      <div class="col-sm-9">
       <select class="form-control" id="input" name="priority">
            <option value="">Choose Priority/Weightage </option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
          </select>
      </div>
    </div>
   	<div class="form-group" id="form_group1">
      <label class="col-sm-3 control-label">Already Uploaded Documents</label>
      <div class="col-sm-9" id="file_handle">
<?php

$filepath="./upload/$id/"; 
if ($handle = opendir($filepath)) {
   $blacklist = array('.', '..');

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
      if (!in_array($entry, $blacklist)) {

        echo "<a href=\"http://crm.varinformatics.com/crm/upload/$id/$entry\" target=\"_blank\">$entry</a></br>";
  
    }
}

    closedir($handle);
}


?>
      </div>
    </div>
   	<center>
            </br><button class="btn btn-default ">Submit</button>
        
        </center>
    	</div>
    </form>
	<form name="form" action="new_notes.php" method="POST">

	<div class="col-sm-6" >
		<div class="col-sm-4" id="display_notes">
      <input type="hidden" name="notes_id"  value="<?php echo $id;?>">
		<p id="display_notes1">
      <?php
        $notes_sql="select * from notes";
        $notes_res=mysql_query($notes_sql);
        while($row=mysql_fetch_array($notes_res))
        {
          $notes=$row['notes'];
          $date=$row['date'];
        }
        ?>
     
		<span name="date"><?php echo $notes ;?></span><br>
    <span><?php echo $date; ?></span>
	</div>
	</div>	
  <div class="col-sm-6" id="new_notesdata">
       <?php 
          $query = "SELECT * FROM notes" ;
          $result = mysql_query($query);
         
          while($row = mysql_fetch_assoc( $result )) { 
          
        echo " " . $row["notes"]. "</br>  " . $row["date"]. " " . "<br>"."<br>";
          }
          ?>
       
  </div>
	<div class="col-sm-6">
    
		<div class="form-group" id="text_area">
			<textarea name="notes" id="textarea_data" class="form-control" cols="10" rows="8" placeholder="Notes"></textarea>
			<button class="btn btn-default pull-right" >Submit</button>
		</div>	
  
	</div>
  </form>
  <form name="project_details" action="project_details.php" method="POST">
    <input type="hidden" name="client_id"  value="<?php echo $id; ?>">
	<div class="col-sm-6" id="options">
		<div class="form-group" id="form_group">
      <label class="col-sm-4 control-label"> Project Name</label>
      <div class="col-sm-8">
        <input class="form-control" id="input1" type="text" name="Project_name">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-4 control-label">Estimated Close Date</label>
      <div class="col-sm-8">
        <input type="text" name="estimated_closedate" class="form-control"  id="datepicker1">

      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-4 control-label">Project Duration</label>
      <div class="col-sm-8">
        <input class="form-control" name="project_duration" id="input1" type="text" placeholder="Project Duration in Days">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-4 control-label">Total Project Cost</label>
      <div class="col-sm-8">
        <input class="form-control" id="input1" type="text" name="total_projectcost">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-4 control-label">Next Payment Date</label>
      <div class="col-sm-8">
       <input type="text" class="form-control"  id="datepicker2" name="next_paymentdate">
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-4 control-label">Next Payment Amount</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="input1" name="next_paymentamount">
      </div>
    </div>

    <div class="form-group" id="form_group1">
      <label class="col-sm-4 control-label">Manager Name</label>
      <div class="col-sm-8">
       <select class="form-control" id="input1" name="manager_name">
          <option value="">Choose</option>
          <option value="manager1">Manager1</option>
          <option value="manager2">Manager2</option>
       </select>
      </div>
    </div>
    <div class="form-group" id="form_group1">
      <label class="col-sm-4 control-label">Developer Name</label>
      <div class="col-sm-8">
       <select class="form-control" name="developer_name" id="input1">
          <option value="">Choose</option>
          <option value="developer1">Developer1</option>
          <option value="developer2">Developer2</option>
       </select>
      </div>
    </div>	
    <div class="form-group" id="form_group1">
      <div class="col-sm-8">
      </br><button class="btn btn-default pull-right" type="submit">Submit</button>
    </div>
    </div>
   	 	</div>
     </form>
   	 <div class="col-sm-6" id="failed_options">
   	 	<label>Choose reason from :</label>
   	 	<select class="form-control" id="status_options2">
   	 	<option>Choose reasons to failed</option>
   	 	<option>The client does not have the budget.</option>
			<option>We do not have expertise.</option>
			<option>Time line is not feasible.</option>
			<option>We cannot match clients expectations.</option>
			<option value="others">Others</option>
   	 	</select>	
   	 </div>	
  <form name="form1" action="failed_reason.php" method="POST">
    <input type="hidden" name="failed_id"  value="<?php echo $id;?>">
   	 <div class="col-sm-6" id="failed_textarea">
   	 	<textarea name="reason"  class="form-control" cols="10" rows="8"></textarea>
   	 	<button class="btn btn-default pull-right">Submit</button>
   	 </div>	
   </form>
</div>	



<?php
include("footer.php");
?>