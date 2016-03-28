<?php
include("dbconfig.php");
?>

<html>
	<head>
		<title>Varinformatics</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="css/style.css">
  		<script src="bootstrap/js/Bootstrap.min.js"></script>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script>
		$(document).ready(function(){
		$("#client_new").show();
		$("#existing_client").click(function(){
		$("#client_details").show();
		$("#client_new").hide();
		});	
		$("#new_client").click(function(){
		$("#client_new").show();
		$("#client_details").hide();	
		});
		$(function(){
		$( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#datepicker1" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#datepicker2" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#datepicker3" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#datepicker4" ).datepicker({dateFormat: 'yy-mm-dd'});
		});
		$(function() {
		    $('#failed_options').hide(); 
		    $('#status_options1').change(function(){
		        if($('#status_options1').val() == 'failed') {
		            $('#failed_options').show(); 
		            $('#failed_textarea,#new_notesdata').hide();
		            $("#text_area").hide();
		            $("#display_notes").hide();
		        } else {
		            $('#failed_options').hide(); 
		        } 
		    });
		});
		$(function() {
		    $('#failed_options').hide(); 
		    $('#status_options1').change(function(){
		        if($('#status_options1').val() == 'success') {
		            $('#options').show(); 
		            $('#failed_textarea').hide();
		            $("#text_area").hide();
		            $("#display_notes,#new_notesdata").hide();
		        } else {
		            $('#options').hide(); 
		        } 
		    });
		});
		$(function() {
		    $('#failed_textarea').hide();
		    $('#status_options2').change(function(){
		        if($('#status_options2').val() == 'others') {
		            $('#failed_textarea').show();
		            $("#text_area,#display_notes,#new_notesdata").hide();
		        } else {
		            $('#failed_textarea').hide(); 
		        } 
		    });
		    $("#status_options1").change(function(){
		    	if($("#status_options1").val()== 'processing'){
		    		$("#text_area,#display_notes,#new_notesdata").show();
		    		$('#failed_textarea').hide();
		    	}
		    });
		});
		});
		</script>
		<script  type ="text/javascript" language ="javascript" >
		function showDiv1()
		{
		document.getElementById('display_notes1').innerHTML=document.getElementById('textarea_data').value;
		return false;
		}
		
    	</script>
	</head>	
<body>
	<div class="container" >

		<?php
		
	 	if(@$_SESSION['role']==1){

	 		?> 
		<div class="header">
			<div class="navbar-header">
				
			<a href="list_enquiry.php" class="navbar-brand"><img src="images/logo.png"></a>
		</div>

	 		 <?php
		
		echo "<div class='logout'>
			<a href='logout.php'>LogOut</a>
			</div>
			<div class='logout'>
				<a href='list_enquiry.php'>List Enquiry</a>
			</div>
			<div class='logout'>
				<a href='add_enquiry.php'>Add Enquiry</a>
			</div>";
		 
	}
	else
	{
	?>
			<div class="header">
			<div class="navbar-header">	
			<a href="index.php" class="navbar-brand"><img src="images/logo.png"></a>
		</div>
	
	<?php	
	}

	?>
	
			</div>	
<div class="main_container">