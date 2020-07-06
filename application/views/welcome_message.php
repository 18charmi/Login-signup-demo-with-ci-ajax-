<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DEMO Login and Signup Form</title>
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../../css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	// Prevent dropdown menu from closing when click inside the form
	$(document).on("click", ".navbar-right .dropdown-menu", function(e){
		e.stopPropagation();
	});
</script>

</head> 
<body>


<nav class="navbar navbar-default navbar-expand-lg navbar-light">
	<div class="navbar-header">
		<a class="navbar-brand"><b>Login/Signup </b> demo</a>  		
	</div>
	
	<div id="navbarCollapse" class="collapse navbar-collapse">
	
		<div id="before_login">		
		<ul class="nav navbar-nav navbar-right">			
		
			<li>
				<a data-toggle="dropdown" class="dropdown-toggle" href="#" id="getloginform">Login</a>
				<ul class="dropdown-menu form-wrapper" id="form1">					
					<li>
	<!-- LOGIN FORM -->
						<form id="loginform" method="post" >
							<p class="hint-text">Provide Login Details Here </p>
							<div class="or-seperator"><b></b></div>
							<div class="form-group">
								<input type="text" id='contact' class="form-control" 
								oninvalid="this.setCustomValidity('Enter valid contact number')"
								onChange="this.setCustomValidity('')"
								 pattern="[0-9]{10}" placeholder="Contact Number" required="required">
							</div>
							<div class="form-group">
								<input type="password" id='password' minlength="6" maxlength="8" 
								oninvalid="this.setCustomValidity('Enter password more 6 characters or upto characters')"
								onChange="this.setCustomValidity('')"
								class="form-control" placeholder="Password" required="required">
							</div>
							<input type="submit" class="btn btn-primary btn-block" value="Login">
							
						</form>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1" id="getregisterform">Sign up</a>
				<ul class="dropdown-menu form-wrapper" id="form2">					
					<li>
	<!-- REGISTRATION FORM -->
						<form id="signupform" method="post">
							<p class="hint-text">Fill in this form to create your account!</p>
							<div class="form-group">
								<input type="text" class="form-control" maxlength="15" placeholder="First Name" 
								name="sfirstname" 
								oninvalid="this.setCustomValidity('Enter your first name only')"
								onChange="this.setCustomValidity('')"
								required="required">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" 
								oninvalid="this.setCustomValidity('Enter your last name only')"
								onChange="this.setCustomValidity('')"
								maxlength="15" placeholder="Last Name" name="slastname" required="required">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" 
								oninvalid="this.setCustomValidity('Enter valid contact number')"
								onChange="this.setCustomValidity('')"
								 pattern="[0-9]{10}" placeholder="Contact Number" name="scontact" required="required">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" 
								oninvalid="this.setCustomValidity('Enter password more 6 characters or upto characters')"
								onChange="this.setCustomValidity('')"
								minlength="6" maxlength="8" placeholder="Password" name="spassword" required="required">
							</div>
							
							<div class="form-group">
									<input type="radio" id="male" name="gender" value="male">
									<label for="male">Male</label><br>
									<input type="radio" id="female" name="gender" value="female">
									<label for="female">Female</label><br>
									<input type="radio" id="other" name="gender" value="other" checked> 
									<label for="other">Other</label>
							</div>
							<input type="submit" class="btn btn-primary btn-block" value="Sign up">
						</form>
					</li>
				</ul>
			</li>
		
		
		</ul>
		</div>
		
		<div id="after_login" style="display: none;">
		<ul class="nav navbar-nav navbar-right">			
			
			<li>
				<a data-toggle="dropdown" class="dropdown-toggle" href="#" id="logout_btn">LOGOUT</a>
			</li>
		</ul>
		</div>
		
	</div>

</nav>

<!--DISPLAYING ACCOUNT DATA AFTER LOGIN SUCCESS

<div id="profile_data" style="margin : 50px 15% 50px 15%; padding:20px;  border: 2px solid aqua;
  border-radius: 5px; font-size: 10; display:none;">
  <p>PROFILE DETAILS </p><hr>
  
</div>-->

<script>

$(document).ready(function() {
			
	<?php if(isset($values))echo 'tableData('.json_encode($values).')';?>
	
	//login form submission
	$('#loginform').submit(function(e) {
    e.preventDefault();
	var data={
		'contact': $('#contact').val(),
		'password': $('#password').val()
		}
		
	$.ajax({
		method: "POST",
		url: <?php echo '"'.base_url('api/accountlogin').'"'?>,
		data: JSON.stringify(data),
        dataType: 'JSON',
		success: function(data)
		{
			 $("#form1").toggle();
			 
			if(data['logged_in']){
				window.location = "<?php echo base_url('welcome/account_details')?>";
			}
			else{
				alert(data['message']);
			}
		},
		error: function(requestObject, error, errorThrown) {
			alert('Staus : '+requestObject.status+'Error : '+error+'Error Thrown : '+errorThrown);
       }
		
   });
   
	});

	//signup form submission
	$('#signupform').submit(function(e) {
    e.preventDefault();
	
	var data = {
		'firstname':titleCase($('[name=sfirstname]').val()),
		'lastname':titleCase($('[name=slastname]').val()),
		'contact':$('[name=scontact]').val(),
		'password':$('[name=spassword]').val(),
		'gender':titleCase($('input[name="gender"]:checked').val())
	}
	//console.log(data);
		
	$.ajax({
		method: "POST",
		url: <?php echo '"'.base_url('api/accountRegister').'"'?>,
		data: JSON.stringify(data),
        dataType: 'JSON',
		success: function(data)
		{
			 $("#form2").toggle();
			 if(data['status']){
				 alert(data['message']);
			 }
			 else{
				alert(data['message']);	 
			 }
			 
		},
		error: function(requestObject, error, errorThrown) {
			alert('Staus : '+requestObject.status+'Error : '+error+'Error Thrown : '+errorThrown);
       }
		
   });
	});
	
	//logout 
	$('#logout_btn').click(function(e) {
		$.ajax({
		method: "GET",
		url: <?php echo '"'.base_url('api/account_logout').'"'?>,
        dataType: 'JSON',
		success: function(data)
		{
			
			alert(data['message']);
			window.location.replace("<?php echo base_url()?>");
		},
		error: function(requestObject, error, errorThrown) {
			alert('Staus : '+requestObject.status+'Error : '+error+'Error Thrown : '+errorThrown);
       }
		
		});
	});

	//displaying profile details
	function tableData(details){


	console.log(details);
	
	var table = $('<table class="table table-striped"><thead><tr><th scope="col">Contact No: </th><th scope="col" colspan="2">Name</th><th scope="col">Gender</th></tr></thead><tbody>');

	var row = $('<tr>');	
	$.each( details, function( key, value ) {	
		if(key != "password")
		{
			var data2 = $('<td>').text(value);
			row.append(data2);	
		}

	});
	table.append(row);
	
	//setting profile details on details page
	$('#profile_data').append(table);
	$('#profile_data').show();
	
	//replacing login & signup with logout	
		$('#before_login').hide();
		$('#after_login').show();

	}
	
		//toggle forms hide/show
	$("#getloginform").click(function(e){
		$("#form1").slideToggle();
	});
	$("#getregisterform").click(function(e){
		$("#form2").slideToggle();
	});


	//converting text to title case
	function titleCase(str) { 
	return str.toLowerCase().split(' ').map(function(word) { 
		return (word.charAt(0).toUpperCase() + word.slice(1)); 
	}).join(' '); 
	} 
		


});

	</script>

</body>
</html>                                                        