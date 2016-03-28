<?php 
include("header.php");
?>
<script type="text/javascript">
function validate()
{
     if(document.checkval.name.value == "" )
   {
     document.checkval.name.focus() ;
     return false;
   }
   
    if(document.checkval.email.value == "" )
   {
     document.checkval.email.focus() ;
     return false;
   }
if(document.checkval.email.value!="")  {
    var x = document.checkval.email.value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
    document.checkval.email.focus() ;
        return false;
    }
 }
    if( document.checkval.phone.value == "" )
   {
     
     document.checkval.phone.focus() ;
     return false;
   }
 if(isNaN(document.checkval.phone.value))
   {
     
     document.checkval.phone.focus() ;
     return false;
   }
    if( document.checkval.phone.value.length <= 9)
   {
     alert( "Please provide a Phone Number of length 10" );
     document.checkval.phone.focus() ;
     return false;
   }
   if( document.checkval.im_option.value == "" )
   {
     
     document.checkval.im_option.focus() ;
     return false;
   }

     if( document.checkval.im.value == "" )
   {
     
     document.checkval.im.focus() ;
     return false;
   }

    if( document.checkval.address.value == "" )
   {
    
     document.checkval.address.focus() ;
     return false;
   }

   if( document.checkval.requirement.value == "" )
   {
     
     document.checkval.requirement.focus() ;
     return false;
   }

   if( document.checkval.budget.value == "" )
   {
    
     document.checkval.budget.focus() ;
     return false;
   }
   if( document.checkval.currency.value == "" )
   {
     
     document.checkval.currency.focus() ;
     return false;
   }
    if( document.checkval.priority.value == "" )
   {
     
     document.checkval.priority.focus() ;
     return false;
   }
    

  
     return( true );
}


</script>

<div class="row">
	<div class="col-sm-12">
	<div class="list-group">
	<label style="text-align:left"> <h3> Add a Requirement : </h3></label>		
	</div>	
	</div>
	
	<div class="col-sm-6">
		<div class="row" id="clients">
			<div class="col-sm-6">
				<div class="radio">

				<label><input type="radio" id="existing_client" name="optradio">Existing Client</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="radio">
				<label><input type="radio" id="new_client" name="optradio">New Client</label>
				</div>
			</div>	
		</div><br>	
    <form method="POST" action="update_client.php" enctype="multipart/form-data" name="checkval1" id="checkval1" onsubmit="return(validate1());"> 
		<div class="row" id="client_details">
			<div class="col-sm-9">
				<div class="form-group">  
					<?php 
					$query = "SELECT * FROM new_client" ;
					$result = mysql_query($query);
					echo'<select class="form-control" id="sel1" name="client_name">';
					echo '<option value=""> Select Client Name </option>';
					while($row = mysql_fetch_assoc( $result )) { 		
					echo '<option value="'.$row['name'].'">' . $row['name'] . '</option>'; 
					}
					echo '</select>'; 

         
         ?>
				</div>
			</div>
      <div class="col-sm-9">
       <input type="text" class="form-control" id="input2" name="requirement" placeholder="Requirement">

      </div>
      <div class="col-sm-9">
       <div class="col-sm-5" id="budget">
  				<input type="text" class="form-control" id="budget1" name="budget" placeholder="Budget">
  				</div>
  				<div class="col-sm-4" id="budget_option1">
  				<select class="form-control" name="currency">
  					<option value="">Currency</option>
  					<option value="INR">INR</option> 
  					<option value="Dollar">Dollar</option>
  					<option value="Euro">Euro</option>
  				</select>
  			</div>
      </div>
  	    <div class="col-sm-9">
    	<select class="form-control" id="priority_options1" name="priority">
  					<option value="">Choose Priority/Weightage </option>
  					<option value="high">High</option>
  					<option value="medium">Medium</option>
  					<option value="low">Low</option>
  				</select>
		</div>	

      <div class="col-sm-9">
       <input type="file" id="input2" name="files[]" class="form-control" multiple="">
      </div>
    	<div class="col-sm-9">
    		<button type="submit" class="btn btn-default pull-right"> Submit </button> 
    	</div>
		</div>
  </form>
		<div class="row" id="client_new">
			<div class="col-sm-9">
				<div class="form-group">
				<form action="new_client.php" method="POST" name="checkval" id="checkval" enctype="multipart/form-data" onsubmit="return(validate());">
  				<input type="text" class="form-control" id="name"  name="name"  placeholder="Name">
  				<input type="text" class="form-control" id="email" name="email" placeholder="Email">
  				<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
  				<div class="col-sm-4" id="im_option">
          <select class="form-control" name="im_option">
                                   <option value=""> IM Type</option>
                                   <option value="yahoo">Yahoo</option>
                                   <option value="skype">Skype</option>
                                   <option value="googletalk">Google Talk</option>
                                   <option value="whatsapp">Whatsapp</option>

          </select></div>
                                <div class="col-sm-5" id="im_input">
          <input type="text" class="form-control" id="im" name="im" placeholder="IM">
          </div>
          
  				<textarea name="address" id="address" class="form-control" cols="30" rows="4" placeholder="Adress"></textarea>
  				<input type="text" class="form-control" id="requirement" name="requirement" placeholder="Requirement">
  				<div class="col-sm-5" id="budget">
  				<input type="text" class="form-control" id="budget" name="budget" placeholder="Budget">
  				</div>
  				<div class="col-sm-4" id="budget_option">
  				<select class="form-control" name="currency">
  					<option value="">Currency</option>
  					<option value="INR">INR</option> 
  					<option value="Dollar">Dollar</option>
  					<option value="Euro">Euro</option>
  				</select></div><br>
  				<select class="form-control" id="priority_options" name="priority">
  					<option value="">Choose Priority/Weightage </option>
  					<option value="high">High</option>
  					<option value="medium">Medium</option>
  					<option value="low">Low</option>
  				</select>
  				<input type="file" id="file" name="files[]" class="form-control" multiple="">

  				<button type="submit" class="btn btn-default pull-right"> Submit</button> 
	  			</form>
				</div>
			</div>	
		</div>	
	</div>	
</div>	

<?php 
include("footer.php");
?>