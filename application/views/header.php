<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<title>Register Here</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../../css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript" src="../../js/myStyle.js"></script>

<script>
$(document).ready(function() {
			
	<?php if(isset($values))echo 'tableData('.json_encode($values).');';?>
});
</script>


</head>

<body>


<!-------------------header----------------------->


<nav class="navbar navbar-default navbar-expand-lg navbar-light">
	<div class="navbar-header">
		<a class="navbar-brand"><b>Login/Signup </b> demo</a>  		
	</div>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse">
	
		<div id="before_login">		
		<ul class="nav navbar-nav navbar-right">			
		
			<li>
				<a data-toggle="dropdown" class="dropdown-toggle" href="#" id="getloginform">Login</a>
			</li>
			<li>
				<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1" id="getregisterform">Sign up</a>
				<ul class="dropdown-menu form-wrapper" id="form2">					
					<li>
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
				<a data-toggle="dropdown" class="dropdown-toggle" href=<?php echo base_url('api/account_logout');?> id="logout_btn">LOGOUT</a>
			</li>
		</ul>
		</div>
		
	</div>

</nav>