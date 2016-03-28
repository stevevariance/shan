<?php 
include('header.php');
?>
<div class="wrapper">
<div class="content">
<script type="text/javascript">


function validate()
{

   
    if(document.checkval.email.value == "" )
   {
     alert( "Please keyin the Email" );
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
    if( document.checkval.pass.value == "" )
   {
     alert( "Please Enter the Password!" );
     document.checkval.pass.focus() ;
     return false;
   }
    if( document.checkval.pass.value.length <= 7)
   {
     alert( "Please provide a password of min length 8" );
     document.checkval.pass.focus() ;
     return false;
   }
    if( document.checkval.pass.value != document.checkval.passc.value )
   {
     alert( "Please Enter the Re Type Password correctly!" );
     document.checkval.passc.focus() ;
     return false;
   }

  
     return( true );
}

</script>
 


<?php 
$formactive=0;
if(isset($_POST['email'])){

$verifyemail=@$_GET['vid'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$insertpass=md5($pass);
$vid = md5($email);

$checkexist_check="";
$checkexist = "SELECT * FROM `login` WHERE email='$email'";
$checkexist_query=mysql_query($checkexist);
$checkexist_check=mysql_num_rows($checkexist_query);


if($checkexist_check != 1 ){
?>
<br>
<center>
<h4><p class="notify_text">The given email id does not belongs to you. Please try another one.</p></h4>
</center>
<?php

  }
else {


while($listdetails_query_fetch=mysql_fetch_array($checkexist_query))
{
$username=$listdetails_query_fetch['username'];

}

if($verifyemail==$vid){
$userupdate= "UPDATE `login` SET `password` = '$insertpass' where `email`='$email'"; 
$userupdate_result=mysql_query($userupdate);

?>
<center>
<h4><p class="notify_text">Your Password has been successfully reset</p></h4></center>

<?php

} else {

?>
<center>
<h4><p class="notify_text">The given email id does not belongs to you. Please try another one.</p></h4>
</center>

<?php

 }
}

 }

if($formactive !=1){
?>

  <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Password Verification</div>
            </div>     

            <div class="panel-body" >
<form action="" name="checkval" id="checkval"  method="post"  onsubmit="return(validate());">
  
   <div class="input-group">

        <input type="text" class="form-control" id="email1" name="email" value="<?php echo @$_POST['email']; ?>" placeholder="Enter Your Registered Email Id" >                                        
    </div>

   <div class="input-group">

        <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter a new password" >                                        
    </div>
    <div class="form-group">
      <div class="input-group">

        <input type="password" class="form-control" id="passc" name="passc" placeholder="Re Type the password " >                                        
    </div>
    <div class="form-group">
    <div class="col-sm-12 controls">
        <button type="submit" size="11" id="register1" class="btn btn-primary pull-center">Submit</button>                          
    </div>

    </div>
    </div>
    </div>
    </div>
</div>
</form>
<?php 
}
?>
</div><!-- End of content -->
</div><!-- End of wrapper -->


<?php 
include('footer.php');
?>