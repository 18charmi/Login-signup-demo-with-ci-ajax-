
<div id="form" style="margin : 50px 15% 50px 15%; padding:20px;  border: 2px solid aqua;
  border-radius: 5px; font-size: 10;">
<ul class="dropdown-menu form-wrapper" id="form1">					
					<li>
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
</div>
				
<div id="profile_data" 
  
  <p>PROFILE DETAILS </p>
  <hr>
</div>