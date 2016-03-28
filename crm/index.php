<?php 
include("header.php");
?>	
<script type="text/javascript">
function validate()
{
     if(document.form.username.value == "" )
   {
     document.form.username.focus() ;
     return false;
   }
   
    if(document.form.password.value == "" )
   {
     document.form.password.focus() ;
     return false;
   }
 
     return( true );
}

</script>
<div class="main">
    
		 <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">LOGIN</div>
            </div>     

            <div class="panel-body" >

                <form method="POST" action="login_user.php" name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST"  onsubmit="return(validate());">
                   
                   
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="text" class="form-control" name="username"  value="" placeholder="User Name">                                        
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div> 
                    <div class="checkbox">
                    	<label><input type="checkbox" value="">Remember me</label>
                    </div>                                                                 
                    <div class="row" id="forgot_password">
                    	<div class="col-sm-12">
                    	<label><a href="forgot.php">Forgot Password </a></label>
                    </div>
                    </div>	
                    <div class="form-group">
                    
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-primary pull-center"> Log in</button>                          
                        </div>
                    </div>

                </form>     
            </div>
            </div>                     
        </div>  
    </div>
</div>
<?php 
include("footer.php");
?>
	