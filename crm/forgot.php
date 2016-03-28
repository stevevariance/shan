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
     alert( "Please Enter the Email" );
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
  
     return( true );
}

</script>
<?php
 function mailfun($nam,$emd,$mg,$link){
$email='support@varinformatics.com';   
$to = $emd;
$subject = 'Verification Mail From Varinformatics.com';
$link=$link;
$message = '
<html>
<head>
<title>Verification Mail From Varinformatics.com</title>
</head>
<body>

Hello '."$nam".',

<p>'."$mg".'</p>
<p>'."$link".'</p>
<p>Note: Follow the directions in your account page after logging in</p>
<p><i>Regards<i></p>
<p>Varinformatics.com</p>
</body>
</html>
';
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: '."$email \r\n";


$success=mail($to,$subject,$message,$headers);  
}
?>


<?php 
$formactive=0;
if(isset($_POST['email'])){

$email=$_POST['email'];
$vid = md5($email);
$checkexist_check="";
$checkexist = "SELECT * FROM `login` WHERE email='$email'";
$checkexist_query=mysql_query($checkexist);
$checkexist_check=mysql_num_rows($checkexist_query);



if($checkexist_check < 1 ){
?>
<br>
<center>
<h4><p class="notify_red">The email Address is not registered with us. Try a different one.</p></h4></center>
<?php
} else {
while($listdetails_query_fetch=mysql_fetch_array($checkexist_query))
{
$username=$listdetails_query_fetch['username'];

}

$formactive=1;
$link='http://crm.varinformatics.com/crm/forgotpassword.php?vid='.$vid;
$msg="Please click on the below link to reset your password";
$resu=mailfun($username,$email,$msg,$link);
?>
<br>
<center>
<h4><p class="notify_text">An email has been sent to the registered email Id. Please verify your email to reset your password</p></h4></center>

<?php

} 
}

if($formactive !=1){
?>
<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Forgot Password</div>
            </div>     

            <div class="panel-body" >
<form action="forgot.php" name="checkval" id="checkval"  method="post"  onsubmit="return(validate());">
  
   <div class="input-group">

        <input type="text" class="form-control" id="email1" name="email" value="<?php echo @$_POST['email']; ?>" placeholder="Enter Your Registered Email Id" >                                        
    </div>
    <div class="form-group">
    <div class="col-sm-12 controls">
        <button type="submit" size="11" id="register" class="btn btn-primary pull-center">Submit</button>                          
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